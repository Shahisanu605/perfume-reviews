<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Perfume Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 2rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            padding: 2rem;
            background-color: #ffffff;
        }
        .welcome {
            font-size: 1.5rem;
            font-weight: 600;
            color: #5a5a5a;
        }
        .email {
            font-size: 1rem;
            color: #888;
        }
        .logout-btn {
            background-color: #ff6f91;
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: bold;
            border-radius: 1rem;
        }
        .logout-btn:hover {
            background-color: #ff4f72;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card text-center">
            <h2 class="welcome">Welcome, <?= esc(session()->get('username')) ?>! 🎉</h2>
            <p class="email">Logged in as <strong><?= esc(session()->get('email')) ?></strong></p>
            <a href="<?= base_url('/logout') ?>" class="btn logout-btn mt-3">Logout</a>
        </div>
    </div>
</body>
</html>
