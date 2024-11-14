<?php
require_once './utils/db.php';

function getProductTypes()
{
    global $conn;

    $query = "SELECT pt.productTypeId, pt.name, pt.createdAt, 
                     (SELECT COUNT(p.productId) FROM Product p WHERE p.productTypeId = pt.productTypeId) AS countProduct 
              FROM ProductType pt 
              ORDER BY pt.createdAt DESC";
    $result = $conn->query($query);
    $productTypes = $result->fetch_all(MYSQLI_ASSOC);

    return $productTypes;
}
?>
