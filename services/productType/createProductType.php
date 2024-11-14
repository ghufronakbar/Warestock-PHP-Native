<?php
require_once './utils/db.php';

function createProductType(string $name):void
{
    global $conn;

    $query = "INSERT INTO ProductType (name) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        echo "Jenis produk berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan jenis produk: " . $stmt->error;
    }

    $stmt->close();
}
?>
