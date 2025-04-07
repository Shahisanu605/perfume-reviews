<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Perfume Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #fff0f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .form-control {
            border-radius: 12px;
        }
        .btn-primary {
            background-color: #f48fb1;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #f06292;
        }
        a {
            color: #f06292;
        }
        h2 {
            color: #e91e63;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5" style="width: 100%; max-width: 450px;">
        <h2 class="text-center mb-4">Welcome Back!</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="text-center mt-3">Don't have an account? <a href="<?= site_url('register') ?>">Register here</a></p>
        </form>
    </div>
</div>
</body>
</html>
