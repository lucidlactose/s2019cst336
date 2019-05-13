<?php

include "dbConnection.php";
$conn = getDatabaseConnection("appointments");

$sql = "SELECT * 
        FROM `appointment` 
        ORDER BY date, start_time";

$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>