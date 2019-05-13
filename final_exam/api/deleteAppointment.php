<?php

include "dbConnection.php";
$conn = getDatabaseConnection("appointments");

$sql = "DELETE FROM `appointment` 
        WHERE id = :id";

$np = array();
$np[":id"] = $_POST["id"];

$stmt = $conn->prepare($sql);
$stmt->execute($np);

echo json_encode(array("status"=>"success"));

?>