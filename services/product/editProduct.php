<?php
require_once './utils/db.php';

function editProduct(
    int $productId,
    string $name,
    string $description,
    ?string $picture,
    int $productTypeId,
    string $producedBy,
    string $expiredAt
) {
    global $conn;

    if ($picture) {
        $query = "UPDATE Product
                  SET name = ?, description = ?, picture = ?, productTypeId = ?, producedBy = ?, expiredAt = ?
                  WHERE productId = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssissi", $name, $description, $picture, $productTypeId, $producedBy, $expiredAt, $productId);
    } else {
        $query = "UPDATE Product
                  SET name = ?, description = ?, productTypeId = ?, producedBy = ?, expiredAt = ?
                  WHERE productId = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssissi", $name, $description, $productTypeId, $producedBy, $expiredAt, $productId);
    }

    if ($stmt->execute()) {
        echo "Produk berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui produk: " . $stmt->error;
    }

    $stmt->close();
}
