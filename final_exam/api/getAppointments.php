<?php

include "dbConnection.php";
$conn = getDatabaseConnection("appointments");

$sql = "SELECT * 
        FROM `appointment` 
        WHERE 1";

$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>