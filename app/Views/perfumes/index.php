<!DOCTYPE html>
<html>
<head>
    <title>Perfume List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { margin-bottom: 20px; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 10px; }
        a { text-decoration: none; color: #0066cc; }
        a:hover { text-decoration: underline; }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>All Perfumes</h1>

    <?php if (!empty($success)) : ?>
        <div class="success"><?= esc($success) ?></div>
    <?php endif; ?>

    <p><a href="<?= site_url('perfumes/create') ?>">➕ Add New Perfume</a></p>

    <?php if ($perfumes): ?>
        <ul>
            <?php foreach ($perfumes as $perfume): ?>
                <li>
                    <a href="<?= site_url('perfumes/' . esc($perfume['id'])) ?>">
                        <?= esc($perfume['name']) ?> (<?= esc($perfume['brand']) ?>)
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No perfumes found.</p>
    <?php endif; ?>
</body>
</html>
