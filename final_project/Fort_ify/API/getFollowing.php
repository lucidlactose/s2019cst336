<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":follower"] = $_POST["userId"];

$sql = "SELECT * ".
        "FROM following " . 
        "WHERE user_id LIKE :follower";


$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
?>