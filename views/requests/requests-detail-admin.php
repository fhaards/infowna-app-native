<?php
include "../../config/connection.php";
$reqId = $_GET['reqid'];
$statement = $db->prepare("SELECT * FROM `requests` where req_id = ? ");
$statement->execute(array($reqId));
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);
