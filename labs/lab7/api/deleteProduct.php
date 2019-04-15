<?php
// THIS IS A POST
// *********************************
include_once "../dbConnection.php";

$conn = getDatabaseConnection("signInPage");

$sql = "DELETE products " .
        "WHERE product_id (" .
        "   SELECT product_id" .
        "   FROM products" .
        "   WHERE name = :name" .
        ")";


if (empty($_POST["name"])) {
    json_encode(array("status" => failure,
                        "reason" =>"no name provided"))
    exit;
}

$np = array();
$np[":name"] = $_POST["name"];

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$results = $stmt->fetchALL(PDO::FETCH_ASSOC);
json_encode(array("status"=>"success"));

?>