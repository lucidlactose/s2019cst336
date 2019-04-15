<?php

include "../dbConnection.php";
$conn = getDatabaseConnection("cinder");

$profileName = $_GET["profile_name"];
$sql = "SELECT * 
        FROM `user` 
        WHERE Id = :Id";

$np = array();
$np[":Id"] = $_GET["id"];

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>