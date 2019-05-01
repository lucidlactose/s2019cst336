<?php

include('database_connection.php');

$connect = getDatabaseConnection("testing");
// $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

$sql = "SELECT * " .
       "FROM `tbl_images` " .
       "WHERE 1";
    //   "WHERE email_address LIKE :email_address";

$np = array();
$np[":email_address"] = $_GET["email_address"];

$stmt = $connect->prepare($sql);
$stmt->execute($np);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

$img = "<div>";
foreach($result as $row)
{
    $img .= '
        <div class="col-md-2" style="margin-bottom:16px;">
        <img src="data:image/jpeg;base64,'.base64_encode($row['images'] ).'" class="img-thumbnail" />
        </div>
    ';
}

$img .= "</div>";

echo $img;
// echo array("status"=>"success","data"=>$img);

?>
