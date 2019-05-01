<?php

//insert.php
include('database_connection.php');

$dbConn = getDatabaseConnection("testing");

if($_FILES["image"]["tmp_name"] > 0) {
    // for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++) {
        $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][0]));
        $query = "INSERT INTO tbl_images(images) VALUES ('$image_file')";
        $statement = $dbConn->prepare($query);
        $statement->execute();
    // }
}
// if ($_FILES["fileName"]["error"] > 0) {
//     $file = addslashes(file_get_contents($_FILES["fileName"]["tmp_name"]));
//     $sql = "INSERT INTO media (email_address, caption, media ) " . // maybe add timestamp
//                 "  VALUES ('changeMe', NULL, :media) ";
//     $stmt = $dbConn->prepare($sql);
//     $stmt -> execute();
    
//     echo "<br />File saved into database <br /><br />";                     
// }

?>