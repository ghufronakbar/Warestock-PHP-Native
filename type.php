<?php
require_once 'layout/dashboard.php';
require_once 'services/productType/getProductTypes.php';
require_once 'services/productType/createProductType.php';
require_once 'services/productType/deleteProductType.php';
require_once 'services/productType/editProductType.php';
require_once 'utils/formatDate.php';

$productTypes = getProductTypes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !isset($_POST['edit'])) {
        $name = $_POST['name'];
        createProductType($name);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['delete'])) {
        $productTypeId = (int)$_POST['delete'];
        deleteProductType($productTypeId);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['edit'])) {
        $productTypeId = (int)$_POST['edit'];
        $name = $_POST['name'];
        editProductType($productTypeId, $name);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<div class="my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Data Jenis Produk</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Jenis Produk</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr class="text-center align-middle">
                    <th scope="col">No</th>
                    <th scope="col">Nama Jenis Produk</th>
                    <th scope="col">Total Produk</th>
                    <th scope="col">Ditambahkan Pada</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productTypes as $index => $productType): ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td><?php echo $productType['name']; ?></td>
                        <td><?php echo $productType['countProduct']; ?></td>
                        <td><?php echo formatDate($productType['createdAt']); ?></td>
                        <td>
                            <div class="d-flex">
                                <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <input type="hidden" name="delete" value="<?php echo $productType['productTypeId']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm me-2">Hapus</button>
                                </form>
                                <button class="btn btn-primary btn-sm" onclick="openEditModal('<?php echo $productType['productTypeId']; ?>', '<?php echo $productType['name']; ?>')" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Jenis Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="text" name="name" placeholder="Nama Jenis Produk" class="form-control mb-3" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jenis Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="edit" id="editProductTypeId">
                    <input type="text" name="name" id="editProductTypeName" placeholder="Nama Jenis Produk" class="form-control mb-3" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="./src/script/productType.js"></script>

<?php include 'layout/endDashboard.php'; ?>