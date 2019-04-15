<?php

include "../dbConnection.php";

if (empty($_POST["username"])) {
        echo json_encode(array(
                                "valid" => false, 
                                "reason" => "username is empty"));
        exit;
}
if (empty($_POST["password"])) {
        echo json_encode(array(
                                "valid" => false,
                                "reason" => "password is empty"));
        exit;
}

$conn = getDatabaseConnection("signInPage");

$sql = "SELECT *" .
        " FROM users" .
        " WHERE username LIKE :username";


$np = array();
$np[":username"] = $_POST["username"];

$stmt = $conn -> prepare($sql);
$stmt->execute($np);
$results = $stmt->fetchALL(PDO::FETCH_ASSOC);

if (empty($results)) {
        $results["valid"] = false;
        $results["reason"] = "username not found";
        echo (json_encode($results));
        exit;
}

if ($_POST["password"] !== $results[0]["password"]) {
        $results["valid"] = false;
        $results["reason"] = "wrong password";
        
        echo (json_encode($results));
        exit;
}
$results["valid"] = true;

echo (json_encode($results));

?>