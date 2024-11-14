<?php
require_once './utils/db.php';

function deleteProduct(int $productId): void
{
    global $conn;

    $query = "DELETE FROM Product WHERE productId = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        echo "Produk berhasil dihapus.";
    } else {
        echo "Gagal menghapus produk: " . $stmt->error;
    }

    $stmt->close();
}
