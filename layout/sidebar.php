<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bold" href="#">Warestock</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./type.php">Daftar Jenis Tipe Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./product.php">Daftar Produk</a>
                </li>
            </ul>
            <span class="navbar-text me-3">
                Halo, <?php echo $_SESSION['username']; ?>!
            </span>
            <a href="./logout.php" class="btn btn-outline-light">Keluar</a>
        </div>
    </div>
</nav>
