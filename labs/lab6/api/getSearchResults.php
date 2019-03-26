<?php

include "../dbConnection.php";
$conn = getDatabaseConnection("ottermart");
$namedParameters = array();

$sql = "SELECT * FROM om_product WHERE 1";

// if there is something in the product text box
if (!empty($_GET["product"])) {
    $sql .= " AND productName LIKE :productName";
    $namedParameters[":productName"] = "%" . $_GET["product"] . "%";
    // And productName Like '%$product%'", $_GET['product'];
}
// if there is a category selected
if (!empty($_GET["category"])) {
    $sql .= " AND catId = :categoryId";
    $namedParameters[":categoryId"] = $_GET["category"];
}
// if there is a priceFrom
if (!empty($_GET["priceFrom"])) {
    $sql .= " AND price >= :priceFrom";
    $namedParameters[":priceFrom"] = $_GET["priceFrom"];
}
// if there is a priceTo
if (!empty($_GET["priceTo"])) {
    $sql .= " AND price <= :priceTo";
    $namedParameters[":priceTo"] = $_GET["priceTo"];
}
// if there is an orderBy
if(isset($_GET["orderBy"])) {
    if ($_GET["orderBy"] == "price") {
        $sql .= " ORDER BY price";
    }
    else if ($_GET["orderBy"] == "name") {
        $sql .= " ORDER BY productName";
    }
}

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>