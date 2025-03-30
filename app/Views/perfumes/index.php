<?= $this->include('templates/header'); ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold">All Perfumes</h1>
        <a href="<?= base_url('perfumes/create') ?>" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Add New Perfume
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="searchInput" class="form-control" placeholder="Search perfumes...">
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Results Container -->
    <div id="perfumeResults">
        <?php if (!empty($perfumes)): ?>
            <div class="list-group">
                <?php foreach ($perfumes as $perfume): ?>
                    <a href="<?= base_url('perfumes/' . esc($perfume['id'])) ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <strong><?= esc($perfume['name']) ?></strong><br>
                                <small class="text-muted">Brand: <?= esc($perfume['brand']) ?></small><br>
                                <small>
                                    Rating:
                                    <?php
                                        $rating = intval($perfume['rating'] ?? 0);
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo ($i <= $rating) ? '★' : '☆';
                                        }
                                    ?>
                                </small>
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
</div>

<!-- Star Styling (Optional) -->
<style>
    small {
        font-size: 16px;
        color: #ffb700;
        letter-spacing: 1px;
    }
</style>

<!-- AJAX for Live Search -->
<script>

    const basePerfumeUrl = "<?= base_url('perfumes/') ?>";

    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value;

        fetch(basePerfumeUrl + "search?q=" + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                let html = '';

                if (data.length > 0) {
                    html += `<div class="list-group">`;
                    data.forEach(perfume => {
                        const stars = '★'.repeat(perfume.rating ?? 0) + '☆'.repeat(5 - (perfume.rating ?? 0));

                        html += `
                            <a href="${basePerfumeUrl}${perfume.id}" class="list-group-item list-group-item-action">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>${perfume.name}</strong><br>
                                        <small class="text-muted">Brand: ${perfume.brand}</small><br>
                                        <small>Rating: ${stars}</small>
                                    </div>
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                            </a>
                        `;
                    });
                    html += `</div>`;
                } else {
                    html = '<p class="text-muted">No matching perfumes found.</p>';
                }

                document.getElementById('perfumeResults').innerHTML = html;
            });
    });
</script>



<?= $this->include('templates/footer'); ?>
