<!DOCTYPE html>
<html>
<head>
    <title>Add a New Perfume</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 mb-5">
    <h2 class="mb-4 text-center text-primary">Add a New Perfume</h2>

    <!-- Flash Success Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Validation Errors -->
    <?php if (isset($validation)) : ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('perfumes/store') ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
        </div>

        <div class="mb-3">
            <label for="brand" class="form-label">Brand:</label>
            <input type="text" name="brand" class="form-control" value="<?= old('brand') ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control" rows="4" required><?= old('description') ?></textarea>
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL:</label>
            <input type="text" id="image_url" name="image" class="form-control" value="<?= old('image') ?>">
            <img id="preview" src="" alt="Image Preview" class="img-thumbnail mt-2" style="max-height: 200px; display: none;">
        </div>

        <!-- New Rating Input -->
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1 to 5):</label>
            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="<?= old('rating') ?>">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
        <a href="<?= site_url('perfumes') ?>" class="btn btn-secondary ms-2">← Back to All Perfumes</a>
    </form>
</div>

<!-- JS for Live Image Preview -->
<script>
    const imageUrlInput = document.getElementById('image_url');
    const preview = document.getElementById('preview');

    function updatePreview() {
        const url = imageUrlInput.value.trim();
        if (url) {
            preview.src = url;
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    }

    imageUrlInput.addEventListener('input', updatePreview);
    window.addEventListener('load', updatePreview);
</script>

</body>
</html>
