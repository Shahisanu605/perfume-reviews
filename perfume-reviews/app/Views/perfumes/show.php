<?= $this->include('templates/header'); ?>

<div class="container py-5 d-flex justify-content-center">
    <div class="card p-4 shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="text-center">
            <h1 class="display-6 fw-bold mb-3"><?= esc($perfume['name']) ?></h1>
            <p><strong>Brand:</strong> <?= esc($perfume['brand']) ?></p>
            <p><strong>Description:</strong> <?= esc($perfume['description']) ?></p>

            <?php if (!empty($perfume['image'])): ?>
                <img src="<?= $perfume['image'] ?>" alt="Image of <?= esc($perfume['name']) ?>" class="img-fluid rounded" style="max-width: 300px; height: auto;">
            <?php else: ?>
                <div class="img-placeholder text-muted border rounded p-3 my-3">
                    <span>No image provided</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-5">
            <h5 class="text-center mb-3">🌸 Perfume Quote of the Day</h5>
            <div class="quote-box border-start border-4 ps-3">
                <blockquote class="mb-0">
                    "<?= esc($quote) ?>"<br>
                    — <strong><?= esc($author) ?></strong><br>
                    <small class="text-muted">(Where every scent tells a story.)</small>
                </blockquote>
            </div>
        </div>
        <?php if (session()->get('role') == 'admin'): ?>
        <div class="button-group mt-4 d-flex justify-content-between flex-wrap gap-2">
            <a href="<?= site_url('perfumes') ?>" class="btn btn-outline-primary">← Back to All Perfumes</a>
            <a href="<?= site_url('perfumes/edit/' . esc($perfume['id'])) ?>" class="btn btn-outline-dark">✏️ Edit</a>
            <form action="<?= site_url('perfumes/delete/' . esc($perfume['id'])) ?>" method="get" onsubmit="return confirm('Are you sure you want to delete this perfume?');">
                <button type="submit" class="btn btn-outline-danger">🗑️ Delete</button>
            </form>
        </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->include('templates/footer'); ?>
