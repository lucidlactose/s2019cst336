<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":follower"] = $_POST["me"];
$np[":followee"] = $_POST["them"];

$sql = "INSERT INTO following (user_id, following_id) ".
        "VALUES (:follower, :followee)";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($records);
echo json_decode(array("status"=>"success"))

?>