<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: ./product.php');
    exit();
}

$error = isset($_GET['error']) ? "Gagal Login" : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WareStock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg w-75 p-5">
            <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="./src/images/market.png" alt="Login" class="img-fluid rounded-start">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center p-4">
                    <h2 class="text-primary fw-bold">Login</h2>
                    <h4 class="text-primary mb-4">WareStock</h4>
                    <?php if ($error) : ?>
                        <p class="text-danger small mb-2"><?= $error ?></p>
                    <?php endif; ?>
                    <form action="./services/auth/login.php" method="POST" class="w-100">
                        <div class="mb-3">
                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
