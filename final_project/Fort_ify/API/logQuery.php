<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":player_id"] = $_POST["id"];
$np[":search_query"] = $_POST["search"];

$sql = "INSERT INTO search_query (user_id, search) 
        VALUES (:player_id, :search_query)";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($records);
echo json_decode(array("status"=>"success"))

?>