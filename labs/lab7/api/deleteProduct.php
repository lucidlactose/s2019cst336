<?php
// THIS IS A POST
// *********************************
include_once "../dbConnection.php";

$conn = getDatabaseConnection("signInPage");

$sql = "DELETE FROM products " .
        "WHERE name LIKE :name;";

if (empty($_POST["name"])) {
    echo json_encode(array("status" => "failure", "reason" =>"no name provided"));
    exit;
}

$np = array();
$np[":name"] = $_POST["name"];

$stmt = $conn->prepare($sql);
$stmt->execute($np);

echo json_encode(array("status"=>"success", "reason"=>"works"));

?>