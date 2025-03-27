<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($perfume['name']) ?> - Perfume Detail</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #fffafc;
    }

    #quoteBox {
      background-color: #f9f3f5;
      border-left: 4px solid #e0a9b0;
      padding: 10px 20px;
      margin: 20px 0;
      border-radius: 10px;
      font-family: 'Georgia', serif;
    }

    img {
      max-width: 200px;
      margin-top: 10px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #c94c72;
    }

    h3 {
      color: #a93f66;
    }

    .perfume-info {
      margin-bottom: 30px;
    }

    .button-group {
      margin-top: 20px;
    }

    .button-group a,
    .button-group form button {
      display: inline-block;
      margin-right: 10px;
      padding: 8px 12px;
      background-color: #c94c72;
      color: #fff;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .button-group form button {
      background-color: #e74c3c;
    }

    .button-group a:hover {
      background-color: #a93f66;
    }

    .button-group form button:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

  <div class="perfume-info">
    <h1><?= esc($perfume['name']) ?></h1>
    <p><strong>Brand:</strong> <?= esc($perfume['brand']) ?></p>
    <p><strong>Description:</strong> <?= esc($perfume['description']) ?></p>

    <?php if (!empty($perfume['image'])): ?>
      <img src="<?= esc($perfume['image']) ?>" alt="<?= esc($perfume['name']) ?>">
    <?php endif; ?>
  </div>

  <h3>🌸 Perfume Quote of the Day</h3>
  <div id="quoteBox">
    <blockquote style="font-style: italic; color: #444;">
      "<?= esc($quote) ?>"<br>
      — <strong><?= esc($author) ?></strong><br>
      <small>(Default quote shown due to an API issue)</small>
    </blockquote>
  </div>

  <div class="button-group">
    <a href="<?= site_url('perfumes') ?>">← Back to All Perfumes</a>
    <a href="<?= site_url('perfumes/edit/' . esc($perfume['id'])) ?>">✏️ Edit</a>

    <form action="<?= site_url('perfumes/delete/' . esc($perfume['id'])) ?>" method="get" onsubmit="return confirm('Are you sure you want to delete this perfume?');" style="display:inline;">
      <button type="submit">🗑️ Delete</button>
    </form>
  </div>

</body>
</html>
