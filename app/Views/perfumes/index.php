<?= $this->include('templates/header'); ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold">All Perfumes</h1>
        <a href="<?= base_url('perfumes/create') ?>" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Add New Perfume
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($perfumes)): ?>
        <div class="list-group">
            <?php foreach ($perfumes as $perfume): ?>
                <a href="<?= base_url('perfumes/' . esc($perfume['id'])) ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong><?= esc($perfume['name']) ?></strong><br>
                            <small class="text-muted">Brand: <?= esc($perfume['brand']) ?></small>
                        </div>
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">No perfumes found.</p>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer'); ?>
