<?php
require_once 'layout/dashboard.php';
require_once 'services/product/getProducts.php';
require_once 'services/product/createProduct.php';
require_once 'services/product/deleteProduct.php';
require_once 'services/product/editProduct.php';
require_once 'services/productType/getProductTypes.php';
require_once 'utils/formatDate.php';

$products = getProducts();
$productTypes = getProductTypes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !isset($_POST['edit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $productTypeId = $_POST['productTypeId'];
        $producedBy = $_POST['producedBy'] ?? null;
        $expiredAt = $_POST['expiredAt'] ?? null;

        $picture = $_FILES['picture']['name'] ? $_FILES['picture']['name'] : null;

        if ($picture) {
            $uploadPath = './src/uploads/' . $picture;
            move_uploaded_file($_FILES['picture']['tmp_name'], $uploadPath);
        }

        createProduct($name, $description, $picture, $productTypeId, $producedBy, $expiredAt);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['delete'])) {
        $productId = (int)$_POST['delete'];
        deleteProduct($productId);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['edit'])) {
        $productId = (int)$_POST['edit'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $productTypeId = $_POST['productTypeId'];
        $producedBy = $_POST['producedBy'] ?? null;
        $expiredAt = $_POST['expiredAt'] ?? null;

        $picture = $_FILES['picture']['name'] ? $_FILES['picture']['name'] : null;

        if ($picture) {
            $uploadPath = './src/uploads/' . $picture;
            move_uploaded_file($_FILES['picture']['tmp_name'], $uploadPath);
        } else {
            $picture = null;
        }

        editProduct($productId, $name, $description, $picture, $productTypeId, $producedBy, $expiredAt);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<div class="my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Data Produk</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Tambah Produk</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr class="text-center align-middle">
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Diproduksi Oleh</th>
                    <th scope="col">Tanggal Kadaluarsa</th>
                    <th scope="col">Ditambahkan Pada</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $index => $product): ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td>
                            <img src="<?php echo $product['picture'] ? './src/uploads/' . $product['picture'] : './src/images/placeholder.png'; ?>" alt="Gambar Produk" class="img-thumbnail object-cover" style="width: 100px; height: 100px; object-fit: cover">
                        </td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['productTypeName']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['producedBy'] ?: 'Tidak tersedia'; ?></td>
                        <td><?php echo formatDate($product['expiredAt']); ?></td>
                        <td><?php echo formatDate($product['createdAt']); ?></td>
                        <td>
                            <div class="d-flex">
                                <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    <input type="hidden" name="delete" value="<?php echo $product['productId']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Hapus</button>
                                </form>
                                <button class="btn btn-primary btn-sm" onclick="openEditProductModal('<?php echo $product['productId']; ?>', '<?php echo $product['name']; ?>', '<?php echo $product['description']; ?>', '<?php echo $product['productTypeId']; ?>', '<?php echo $product['producedBy']; ?>', '<?php echo $product['expiredAt']; ?>')" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="name" placeholder="Nama Produk" class="form-control mb-3" required>
                    <textarea name="description" placeholder="Deskripsi" class="form-control mb-3" required></textarea>
                    <input type="file" name="picture" accept="image/*" class="form-control mb-3">

                    <label class="form-label">Pilih Jenis Produk</label>
                    <?php foreach ($productTypes as $productType): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="productTypeId" value="<?php echo $productType['productTypeId']; ?>" required>
                            <label class="form-check-label"><?php echo $productType['name']; ?></label>
                        </div>
                    <?php endforeach; ?>

                    <input type="text" name="producedBy" placeholder="Diproduksi Oleh" class="form-control mb-3">
                    <label class="form-label">Tanggal Kadaluarsa</label>
                    <input type="date" name="expiredAt" class="form-control mb-3">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="edit" id="editProductId">
                    <input type="text" name="name" id="editProductName" placeholder="Nama Produk" class="form-control mb-3" required>
                    <textarea name="description" id="editProductDescription" placeholder="Deskripsi" class="form-control mb-3" required></textarea>
                    <input type="file" name="picture" accept="image/*" class="form-control mb-3">

                    <label class="form-label">Pilih Jenis Produk</label>
                    <?php foreach ($productTypes as $productType): ?>
                        <div class="form-check">
                            <input class="form-check-input editProductTypeId" type="radio" name="productTypeId" value="<?php echo $productType['productTypeId']; ?>">
                            <label class="form-check-label"><?php echo $productType['name']; ?></label>
                        </div>
                    <?php endforeach; ?>

                    <input type="text" name="producedBy" id="editProductProducedBy" placeholder="Diproduksi Oleh" class="form-control mb-3">
                    <label class="form-label">Tanggal Kadaluarsa</label>
                    <input type="date" name="expiredAt" id="editProductExpiredAt" class="form-control mb-3">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./src/script/product.js"></script>

<?php include 'layout/endDashboard.php'; ?>