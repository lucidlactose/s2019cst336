<?php
// THIS IS A POST
// *********************************
include_once "../dbConnection.php";

$conn = getDatabaseConnection("signInPage");

$sql = "INSERT INTO products (name) VALUE (:name)";


if (empty($_POST["name"])) {
    echo json_encode(array("status" => "success", "reason" =>"no name provided"));
    exit;
}

$np = array();
$np[":name"] = $_POST["name"];

$stmt = $conn->prepare($sql);
$stmt->execute($np);

echo json_encode(array("status"=>"success", "reason" => "works"));

?>