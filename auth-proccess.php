<?php

function getUuid($data = null)
{
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

if (isset($_POST['register'])) {
    $getUuid    = getUuid();
    $name       = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $password   = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email      = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $cekemail   = "SELECT count(*) from users where email = :email";

    // $cekemail    = "SELECT count(*) FROM users WHERE email = $email";
    $resultMail     = $db->prepare($cekemail);
    $paramCekmail   = array(":email"  => $email);
    $resultMail->execute($paramCekmail);
    $numberResultMail = $resultMail->fetchColumn();
    if ($numberResultMail > 0) :
?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Wops! Register Error </strong> Email has been taken.
        </div>
<?php
    else :
        $sql = "INSERT INTO users (name, uuid, email, password, user_group, user_status, created_at, updated_at) 
            VALUES (:name, :uuid, :email, :password, :user_group, :user_status, :created_at, :updated_at)";
        $stmt = $db->prepare($sql);
        $params = array(
            ":uuid"     => $getUuid,
            ":name"     => $name,
            ":password" => $password,
            ":email"    => $email,
            ":user_group" => 'user',
            ":user_status" => '0',
            ":created_at"  => date('d-m-y H:i:s'),
            ":updated_at"  => date('d-m-y H:i:s')
        );

        $saved = $stmt->execute($params);
        if ($saved) {

            $insertAccounts = "INSERT INTO users_account (uuid) VALUES (:uuid)";
            $stmtAccounts   = $db->prepare($insertAccounts);
            $paramsAccounts = array(":uuid" => $getUuid);
            $savedAccounts  = $stmtAccounts->execute($paramsAccounts);

            if ($savedAccounts) header("Location: index.php");
        }
    endif;
}

if (isset($_POST['login'])) {
    $email      = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password   = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $sql    = "SELECT * FROM users WHERE email=:email";
    $stmt   = $db->prepare($sql);

    $params = array(
        ":email" => $email
    );
    $stmt->execute($params);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION["login_status"] = 1;
            header("Location:index.php?home=dashboard");
        } else {
            echo "<div class='alert alert-danger mx-2'> <strong>Ops !</strong> Youre email or password is not match to our credentials</div>";
        }
    }
}