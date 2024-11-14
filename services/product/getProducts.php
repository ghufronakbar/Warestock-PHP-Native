<?php
require_once './utils/db.php';

function getProducts()
{
    global $conn;

    $query = "SELECT p.productId, p.name, p.description, p.picture, p.createdAt, p.producedBy, p.expiredAt, pt.name AS productTypeName, pt.productTypeId
              FROM Product p
              INNER JOIN ProductType pt ON p.productTypeId = pt.productTypeId
              ORDER BY p.createdAt DESC";
    $result = $conn->query($query);
    $products = $result->fetch_all(MYSQLI_ASSOC);

    return $products;
}
