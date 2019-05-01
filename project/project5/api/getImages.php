<?php

include "../dbConnection.php";

$connect = getDatabaseConnection("project5");

$sql = "SELECT media " .
       "FROM `media` " .
       "WHERE 1";
    //   "WHERE email_address LIKE :email_address";

$np = array();
$np[":email_address"] = $_GET["email_address"];

$stmt = $connect->prepare($sql);
$stmt->execute($np);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

$img = "<div>";
foreach($result as $row) {
        // <div class="col-md-2" style="margin-bottom:16px;">
    $img .= '
        <img src="data:image/jpeg;base64,'.base64_encode($row['media'] ).'" class="img-thumbnail" />
    ';
        // </div>
}

$img .= "</div>";

echo $img;





// $connect = getDatabaseConnection("testing");

// $sql = "SELECT * " .
//       "FROM `media` " .
//       "WHERE 1";
//     //   "WHERE email_address LIKE :email_address";

// $np = array();
// $np[":email_address"] = $_GET["email_address"];

// $stmt = $connect->prepare($sql);
// $stmt->execute($np);
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// // var_dump($result);

// $img_html = "<div>";
// foreach($result as $row) {
//     // <div class="col-md-2" style="margin-bottom:16px;">
//     $img_html .= '<img src="data:image/jpeg;base64,'.base64_encode($row['images'] ).'" class="img-thumbnail" />';
//     // </div>
// }

// $img_html .= "</div>";

// echo $img_html;

?>
