<?php
require_once './utils/db.php';

function createProduct(
    string $name,
    string $description,
    string $picture,
    int $productTypeId,
    string $producedBy,
    string $expiredAt
): void {
    global $conn;

    $query = "INSERT INTO Product (name, description, picture, productTypeId, producedBy, expiredAt)
              VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssiss", $name, $description, $picture, $productTypeId, $producedBy, $expiredAt);

    if ($stmt->execute()) {
        echo "Produk berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan produk: " . $stmt->error;
    }

    $stmt->close();
}
