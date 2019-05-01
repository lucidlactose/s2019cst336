<?php

include "../dbConnection.php";

$connect = getDatabaseConnection("project5");

$sql = "UPDATE `media` " .
       "SET email_address = :email_address, caption = :caption " .
       "WHERE email_address LIKE 'changeMe'";
    //   "WHERE email_address LIKE :email_address";

$np = array();
$np[":email_address"] = $_POST["email_address"];
$np[":caption"] = $_POST["caption"];

$stmt = $connect->prepare($sql);
$stmt->execute($np);

echo array("status"=>"success");

?>
