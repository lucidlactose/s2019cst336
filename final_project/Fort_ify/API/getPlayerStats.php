<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":player_id"] = $_POST["id"];

$sql = "SLECT * FROM player_stats".
        "WHERE player_id LIKE :player_id";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
// echo json_decode(array("status"=>"success"));

?>