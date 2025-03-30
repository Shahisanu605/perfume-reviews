<?= $this->include('templates/header'); ?>

<div class="container py-5">
    <div class="perfume-info">
        <h1 class="display-5 fw-bold"><?= esc($perfume['name']) ?></h1>
        <p><strong>Brand:</strong> <?= esc($perfume['brand']) ?></p>
        <p><strong>Description:</strong> <?= esc($perfume['description']) ?></p>

        <?php if (!empty($perfume['image'])): ?>
            <img src="<?= $perfume['image'] ?>" alt="Image of <?= esc($perfume['name']) ?>" class="img-fluid" style="max-width: 300px;">
        <?php else: ?>
            <div class="img-placeholder">
                <span>No image provided</span>
            </div>
        <?php endif; ?>
    </div>

    <h3 class="mt-5">🌸 Perfume Quote of the Day</h3>
    <div class="quote-box">
        <blockquote class="mb-0">
            "<?= esc($quote) ?>"<br>
            — <strong><?= esc($author) ?></strong><br>
            <small class="text-muted">(Default quote shown due to an API issue)</small>
        </blockquote>
    </div>

    <div class="button-group mt-4">
        <a href="<?= site_url('perfumes') ?>" class="btn btn-outline-primary">← Back to All Perfumes</a>
        <a href="<?= site_url('perfumes/edit/' . esc($perfume['id'])) ?>" class="btn btn-outline-warning">✏️ Edit</a>

        <form action="<?= site_url('perfumes/delete/' . esc($perfume['id'])) ?>" method="get" onsubmit="return confirm('Are you sure you want to delete this perfume?');" style="display:inline;">
            <button type="submit" class="btn btn-outline-danger">🗑️ Delete</button>
        </form>
    </div>
</div>

<?= $this->include('templates/footer'); ?>
