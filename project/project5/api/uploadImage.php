<?php

//insert.php
include "../dbConnection.php";

$dbConn = getDatabaseConnection("project5");

if($_FILES["image"]["tmp_name"] > 0) {
    // for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++) {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][0]));
        $sql = "INSERT INTO media (email_address, caption, media) VALUES ('changeMe', NULL, :file)";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array(":file"=>$file));
    // }
}

?>