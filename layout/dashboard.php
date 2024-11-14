<?php
session_start();
require_once './utils/isSession.php';

if (!isSession()) {
  echo "<script>alert('Harap login terlebih dahulu!');</script>";  
  echo "<script>location.href = './login.php';</script>";  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - WareStock</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/style/global.css">
</head>

<body class="bg-gray-100">

  <?php include './layout/sidebar.php'; ?>

  <main class="p-4">
    <div class="">
      <?php
      ob_start();
      ?>