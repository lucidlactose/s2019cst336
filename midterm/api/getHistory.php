<?php

include "../dbConnection.php";
$conn = getDatabaseConnection("cinder");

$sql = "SELECT user_id 
        FROM `match` 
        INNER JOIN `user` 
        ON `user_id` = `id`";

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>