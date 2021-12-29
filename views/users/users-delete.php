<?php
include "../../config/connection.php";
$uuid  = $_GET['uuid'];
$sql1  = "DELETE FROM users WHERE uuid = '$uuid'";
$row1  = $db->prepare($sql1);
$deleteTableUser = $row1->execute();
if ($deleteTableUser) {
    $sql2  = "DELETE FROM users_account WHERE uuid = '$uuid'";
    $row2  = $db->prepare($sql2);
    $deleteTableAccounts = $row2->execute();
    if ($deleteTableAccounts) {
        $response = array(
            'status' => 200,
            'message' => 'Success'
        );
    } else {
        $response = array(
            'status' => 210,
            'message' => 'Gagal'
        );
    }
    echo json_encode($response);
}

// echo '<script>alert("Berhasil Hapus Data");window.location="index.php?users=table"</script>';
