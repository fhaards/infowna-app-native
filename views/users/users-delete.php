<?php

$uuid = $_GET['uuid'];
$sql1  = "DELETE FROM users WHERE uuid = '$uuid'";
$row1  = $db->prepare($sql1);
$row1->execute();

$sql2  = "DELETE FROM users_account WHERE uuid = '$uuid'";
$row2  = $db->prepare($sql2);
$row2->execute();

echo '<script>alert("Berhasil Hapus Data");window.location="index.php?users=table"</script>';
