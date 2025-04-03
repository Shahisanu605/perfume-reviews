<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Perfume Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #fceff9;
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
            background-color: #ff8fb1;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #ff629a;
        }
        a {
            color: #ff629a;
        }
        h2 {
            color: #ff4f87;
            font-weight: 600;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5" style="width: 100%; max-width: 450px;">
        <h2 class="text-center mb-4">Create Account</h2>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('register') ?>" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required autocomplete="new-username">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required autocomplete="new-email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
            <p class="text-center mt-3">Already have an account? <a href="<?= site_url('login') ?>">Login here</a></p>
        </form>
    </div>
</div>
</body>
</html>
