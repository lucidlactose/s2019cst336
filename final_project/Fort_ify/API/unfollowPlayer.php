<?php

include "dbConnection.php";
$conn = getDatabaseConnection();

$np = array();
$np[":me"] = $_POST["me"];
$np[":them"] = $_POST["them"];

// $me_id = $_POST['me'];
// $them_id = $_POST["them"];


$sql = "DELETE FROM following
        WHERE user_id LIKE :me AND following_id = :them";


$stmt = $conn->prepare($sql);
$stmt->execute($np);
// $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($records);

echo json_decode(array("status"=>"success"))

?>