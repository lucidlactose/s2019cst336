<?php

include "../dbConnection.php";
$conn = getDatabaseConnection("cinder");

$sql = "SELECT user_id 
        FROM `match` 
        WHERE NOT match_user_id = 1 
        AND NOT user_id = 1";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>