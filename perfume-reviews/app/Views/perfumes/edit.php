<!DOCTYPE html>
<html>
<head>
    <title>Edit Perfume</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        label { font-weight: bold; }
        input[type="text"], input[type="number"], textarea { width: 300px; padding: 8px; }
        textarea { height: 100px; }
        button { padding: 10px 20px; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Edit Perfume</h1>

    <?php if (isset($validation)) : ?>
        <div class="error"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= site_url('perfumes/update/' . esc($perfume['id'])) ?>" method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= esc($perfume['name']) ?>" required><br><br>

        <label>Brand:</label><br>
        <input type="text" name="brand" value="<?= esc($perfume['brand']) ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required><?= esc($perfume['description']) ?></textarea><br><br>

        <label>Image URL:</label><br>
        <input type="text" name="image" value="<?= esc($perfume['image']) ?>"><br><br>

        <label>Rating (1–5):</label><br>
        <input type="number" name="rating" min="1" max="5" value="<?= esc($perfume['rating'] ?? '') ?>"><br><br>

        <button type="submit">Update</button>
    </form>

    <p><a href="<?= site_url('perfumes/' . esc($perfume['id'])) ?>">← Back to Perfume Details</a></p>
</body>
</html>
