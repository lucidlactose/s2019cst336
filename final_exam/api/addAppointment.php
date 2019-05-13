<?php

include "dbConnection.php";
$conn = getDatabaseConnection("appointments");

$sql = "INSERT INTO `appointment` (date, start_time, minute_duration, booked_by)
        VALUES (:date, :start_time, :duration, :booked_by)";

$np = array();
$np[":date"] = $_POST["date"];
$np[":start_time"] = $_POST["start_time"];
$np[":duration"] = $_POST["duration"];
$np[":booked_by"] = $_POST["booked_by"];

$stmt = $conn->prepare($sql);
$stmt->execute($np);

echo json_encode(array("status"=>"success", $_POST["duration"]));

?>