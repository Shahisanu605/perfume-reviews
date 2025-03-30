<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Perfume Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #FFDEE9 0%, #B5FFFC 100%);
            font-family: 'Open Sans', sans-serif;
            padding-top: 80px;
        }
        .contact-container {
            max-width: 650px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #FF4D6D;
            color: white;
            border-radius: 30px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #e03b59;
        }
        label {
            font-weight: 600;
            color: #333;
        }
        h2 {
            font-weight: 700;
            color: #FF4D6D;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="contact-container">
        <h2 class="mb-4 text-center">📩 Contact Us</h2>

        <!-- Success Message -->
        <?php if (!empty($success) && !empty($submitted)): ?>
            <div class="alert alert-success">
                <h5><?= $success ?></h5>
            
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success text-center">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Validation Errors -->
        <?php if (!empty($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('contact') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="name">Your Name</label>
                <input type="text" class="form-control rounded-pill" name="name" value="<?= set_value('name') ?>" required>
            </div>

            <div class="mb-3">
                <label for="email">Your Email</label>
                <input type="email" class="form-control rounded-pill" name="email" value="<?= set_value('email') ?>" required>
            </div>

            <div class="mb-3">
                <label for="message">Your Message</label>
                <textarea class="form-control rounded-4" name="message" rows="4" required><?= set_value('message') ?></textarea>
            </div>

            <button type="submit" class="btn btn-custom w-100">Send Message</button>
        </form>
    </div>
</div>

</body>
</html>
