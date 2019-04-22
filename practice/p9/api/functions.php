<?php

// let's not to db atm
// session_start();

// include "../dbConnections.php";
// $conn = getDatabaseConnection("poll");

// if (empty($_POST)) {
//     exit;
// }

// $sql =  "UPDATE poll_response 
//         SET option2 = :value
//         WHERE option LIKE :option";

// $_SESSION[$_POST["option"]] += 1;

// $np = array();
// // $np[":option"] = $_POST["option"];
// $np[":value"] = 5;

// $stmt = $conn->prepare($sql);
// $stmt->execute($np);

// $records = array();
// $records["option1"] = $_SESSION["option1"];
// $records["option2"] = $_SESSION["option2"];
// $records["option3"] = $_SESSION["option3"];
// $records["option4"] = $_SESSION["option4"];
// $records["option5"] = $_SESSION["option5"];

// echo json_encode($records);

session_start();

$_SESSION[$_POST["option"]] += 1;

$records = array();
$records["option1"] = $_SESSION["option1"];
$records["option2"] = $_SESSION["option2"];
$records["option3"] = $_SESSION["option3"];
$records["option4"] = $_SESSION["option4"];
$records["option5"] = $_SESSION["option5"];

echo json_encode($records);


?>