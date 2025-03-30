<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfume Reviews</title>

    <!-- Bootstrap & Google Fonts -->
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
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            color: #555;
            transition: color 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #FF4D6D !important;
        }

        .hero-section {
            padding: 80px 0;
            animation: fadeIn 1.2s ease-in;
        }

        .hero-title {
            font-size: 3.2rem;
            color: #fff;
            font-family: 'Playfair Display', serif;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: #fbe7db;
            margin-top: 15px;
        }

        .btn-custom {
            background-color: #fff;
            color: #FF4D6D;
            border-radius: 30px;
            padding: 12px 30px;
            border: none;
            font-weight: bold;
            margin-top: 25px;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            background-color: #FF4D6D;
            color: #fff;
        }

        .carousel-item img {
            height: 420px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #FF4D6D;
            border-radius: 50%;
            padding: 10px;
        }

        .footer {
            margin-top: auto;
            text-align: center;
            padding: 15px;
            background-color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
            color: #666;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .carousel-item img {
                height: 280px;
            }
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link active" href="<?= base_url('index.php') ?>">Home</a>
                <a class="nav-link" href="<?= base_url('index.php/perfumes') ?>">Reviews</a>
                <a class="nav-link" href="<?= base_url('index.php/about') ?>">About</a>
                <a class="nav-link" href="<?= base_url('index.php/contact') ?>">Contact</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container hero-section">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <h1 class="hero-title">Discover Your Perfect Scent</h1>
            <p class="hero-subtitle">Reliable and heartfelt perfume reviews at your fingertips.</p>
            <a href="<?= base_url('index.php/perfumes') ?>" class="btn btn-custom">Browse Reviews</a>
        </div>
        <div class="col-md-6">
            <div id="perfumeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/images/felipepelaquim-ywE0IlojSI8-unsplash.jpg'); ?>" class="d-block w-100" alt="Perfume 1">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/images/laura-chouette-4sKdeIMiFEI-unsplash.jpg'); ?>" class="d-block w-100" alt="Perfume 2">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/images/laura-chouette-gbT2KAq1V5c-unsplash.jpg'); ?>" class="d-block w-100" alt="Perfume 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#perfumeCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#perfumeCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    Made with <i class="bi bi-heart-fill text-danger"></i> &copy; <?= date('Y') ?> Perfume Reviews. All rights reserved.
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
