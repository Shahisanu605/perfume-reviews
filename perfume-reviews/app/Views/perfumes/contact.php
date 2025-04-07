<?= $this->include('templates/header'); ?>

<style>
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

<br>
<div class="container d-flex justify-content-center">
    <div class="contact-container">
        <h2 class="mb-4 text-center">📩 Contact Us</h2>

        <!-- ✅ Flash Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success text-center">
                <?= session()->getFlashdata('success') ?>
            </div>

            <!-- ✅ Reset the form if success -->
            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    document.getElementById('contactForm').reset();
                });
            </script>
        <?php endif; ?>

        <!-- ❌ Show Validation Errors -->
        <?php if (!empty($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- 📬 Contact Form -->
        <form id="contactForm" action="<?= site_url('contact') ?>" method="post">
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
<br>

<?= $this->include('templates/footer'); ?>
