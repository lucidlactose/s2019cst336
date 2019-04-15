<?php

session_start();

include "DBConnection.php";

$conn = getDBConnection();

// TODO: Grab all of our paramters from the session
$np = array();
$np[":name"]= $_SESSION["name"];
$np[":email"]= $_SESSION["email"];
$np[":major"]= $_SESSION["major"];
$np[":zip"]= $_SESSION["zip"];

// TODO: Execute SQL to add a row to database table
$sql = "INSERT INTO users (name, email, major, zip) VALUES (:name, :email, :major, :zip)";

$stmt = $conn->prepare($sql);
$stmt->execute($np);

echo (json_encode(array("status" => "success", "some" => "thing")));
// Destory the session once you submit
session_destroy();

// TODO: Return all the rows from the datable table

?>
