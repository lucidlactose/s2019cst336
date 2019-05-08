<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":user_id"] = $_GET["id"];

$sql = "SELECT *
        FROM (
            SELECT * 
            FROM `following`
            WHERE user_id = :user_id
        ) following
        INNER JOIN player_stats
        ON following.following_id = player_stats.player_id";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
// echo json_decode(array("status"=>"success"));

?>