<?php
require_once './utils/db.php';

function editProductType(int $productTypeId,string $name)
{
    global $conn;

    $query = "UPDATE ProductType SET name = ? WHERE productTypeId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $name, $productTypeId);

    if ($stmt->execute()) {
        echo "Jenis produk berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui jenis produk: " . $stmt->error;
    }

    $stmt->close();
}
?>
