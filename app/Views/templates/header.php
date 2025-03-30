<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Perfume Reviews') ?></title>

    <!-- Bootstrap CSS & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #FF8DA1 0%, #FFF5E6 100%);
            font-family: 'Open Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: #FF4D6D !important;
        }
        .nav-link {
            color: #555;
        }
        .nav-link:hover,
        .nav-link.active {
            color: #FF4D6D !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('index.php') ?>">
            <i class="bi bi-flower1"></i> Perfume Reviews
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <div class="navbar-nav">
                <a class="nav-link active" href="<?= base_url('index.php') ?>">Home</a>
                <a class="nav-link" href="<?= base_url('index.php/perfumes') ?>">Reviews</a>
                <a class="nav-link" href="<?= base_url('index.php/about') ?>">About</a>
                <a class="nav-link" href="<?= base_url('index.php/contact') ?>">Contact</a>
            </div>
        </div>
    </div>
</nav>
