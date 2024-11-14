<?php
require_once './utils/db.php';

function deleteProductType(string $productTypeId):void
{
    global $conn;

    $query = "DELETE FROM ProductType WHERE productTypeId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productTypeId);

    if ($stmt->execute()) {
        echo "Jenis produk berhasil dihapus.";
    } else {
        echo "Gagal menghapus jenis produk: " . $stmt->error;
    }

    $stmt->close();
}
?>
