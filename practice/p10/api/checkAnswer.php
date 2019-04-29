<?php

//receive email and score from the quiz

//1. Get latest score based on email
//2. If record found, first display it in JSON format, then update record
//3. If record not found, insert a new record for that email

require "dbConnection.php";

$conn = getDatabaseConnection("quizLab");

$sql = "SELECT * " .
       "FROM quiz " .
       "WHERE email LIKE :email";

$np = array();
$np[":email"] = $_GET["email"];

// var_dump($np);

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($results);





$np[":score"] = $_GET["score"];
// if it's not empty return the result
if (!empty($results)) {
    echo json_encode($results);
    
    // update the score where the emails match
    $sql = "UPDATE quiz ".
           "SET score = :score, taken = 1+ taken ".
           "WHERE email LIKE :email";
    
    $np[":email"] = $_GET["email"];
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
    exit();
}

// var_dump("is empty");

// if no email is found, create one with the score
$sql = "INSERT INTO quiz (email, score, taken)".
       "VALUES (:email, :score, 1)";

$np = array();
$np[":email"] = $_GET["email"];
$np[":score"] = $_GET["score"];

var_dump($np);
$stmt = $conn->prepare($sql);
$stmt->execute($np);

?>