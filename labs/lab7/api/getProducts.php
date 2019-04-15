<?php

include "../dbConnection.php";

$conn = getDatabaseConnection("signInPage");

$sql = "SELECT *" .
        " FROM products" .
        " WHERE 1";

$stmt = $conn -> prepare($sql);
$stmt->execute();
$results = $stmt->fetchALL(PDO::FETCH_ASSOC);

echo (json_encode($results));

?>