<?php
session_start();
//TODO: Save incoming data into session
$_SESSION["input"] = "";

if(!isset($_SESSION["progress"])){
    $_SESSION["progress"] = 0;
}
else {
    if (!isset($_SESSION["name"])) {
        if (empty($_POST["name"]) || empty($_POST["email"])) {
            echo json_encode(array("status" => "success", "input" => "invalid"));
            exit;
        }
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["email"] = $_POST["email"];
    }
    if (!isset($_SESSION["major"]) && $_SESSION["progress"] == 1) {
        if (empty($_POST["major"]) || empty($_POST["zip"])) {
            echo json_encode(array("status" => "success", "input" => "invalid"));
            exit;
        }
        $_SESSION["major"] = $_POST["major"];
        $_SESSION["zip"] = $_POST["zip"];
    }
    
    $_SESSION["progress"] = $_POST["progress"];
}


echo json_encode($_SESSION);
?>