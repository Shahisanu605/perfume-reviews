<!DOCTYPE html>
<html>
<head>
    <title>Create Perfume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 300px;
            padding: 8px;
        }

        textarea {
            height: 100px;
        }

        button {
            padding: 10px 20px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Add a New Perfume</h1>

    <?php if (isset($validation)) : ?>
        <div class="error">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('perfumes/store') ?>" method="post">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= old('name') ?>" required><br><br>

        <label>Brand:</label><br>
        <input type="text" name="brand" value="<?= old('brand') ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required><?= old('description') ?></textarea><br><br>

        <label>Image URL:</label><br>
        <input type="text" name="image" value="<?= old('image') ?>"><br><br>

        <button type="submit">Submit</button>
    </form>

    <p><a href="<?= site_url('perfumes') ?>">← Back to All Perfumes</a></p>
</body>
</html>
