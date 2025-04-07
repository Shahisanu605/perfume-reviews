<?= $this->include('templates/header'); ?>

<style>
    .card {
        transition: background-color 0.3s ease, transform 0.3s ease;
        overflow: hidden;

    }

    .card:hover {
        background-color: #ffe6f0;
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-text small,
    .card-text {
        font-size: 16px;
        color: #ffb700;
        letter-spacing: 1px;
    }
</style>

<div class="container py-5">
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="display-6 fw-bold">All Perfumes</h1>

    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= site_url('perfumes/create') ?>" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Add New Perfume
        </a>
    <?php else: ?>
        <a href="<?= site_url('perfumes/explore') ?>" class="btn btn-outline-success">
            <i class="bi bi-globe2"></i> Explore Perfumes
        </a>
    <?php endif; ?>
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
        <div class="row">
            <?php if (!empty($perfumes)): ?>
                <?php foreach ($perfumes as $perfume): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= esc($perfume['image']) ?>" class="card-img-top" alt="<?= esc($perfume['name']) ?>" style="height: 250px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= esc($perfume['name']) ?></h5>
                                <p class="card-text text-muted">Brand: <?= esc($perfume['brand']) ?></p>
                                <p class="card-text">
                                    Rating:
                                    <?php
                                        $rating = intval($perfume['rating'] ?? 0);
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo ($i <= $rating) ? '★' : '☆';
                                        }
                                    ?>
                                </p>
                                <a href="<?= base_url('perfumes/' . esc($perfume['id'])) ?>" class="btn btn-outline-primary mt-auto mb-2">View Details</a>

                                <?php if (session()->get('isLoggedIn') && session()->get('role') === 'admin'): ?>
                                    <a href="<?= base_url('perfumes/edit/' . esc($perfume['id'])) ?>" class="btn btn-outline-warning mb-2">Edit</a>
                                    <a href="<?= base_url('perfumes/delete/' . esc($perfume['id'])) ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this perfume?');">Delete</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">No perfumes found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- AJAX Search Script -->
<script>
    const basePerfumeUrl = "<?= base_url('perfumes/') ?>";

    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value;

        fetch(basePerfumeUrl + "search?q=" + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                let html = '<div class="row">';

                if (data.length > 0) {
                    data.forEach(perfume => {
                        const stars = '★'.repeat(perfume.rating ?? 0) + '☆'.repeat(5 - (perfume.rating ?? 0));
                        const imageUrl = `${perfume.image}`;

                        html += `
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <img src="${imageUrl}" class="card-img-top" alt="${perfume.name}" style="height: 250px; object-fit: cover;">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">${perfume.name}</h5>
                                        <p class="card-text text-muted">Brand: ${perfume.brand}</p>
                                        <p class="card-text">Rating: ${stars}</p>
                                        <a href="${basePerfumeUrl}${perfume.id}" class="btn btn-outline-primary mt-auto mb-2">View Details</a>
                                        <?php if (session()->get('isLoggedIn') && session()->get('role') === 'admin'): ?>
                                            <a href="${basePerfumeUrl}edit/${perfume.id}" class="btn btn-outline-warning mb-2">Edit</a>
                                            <a href="${basePerfumeUrl}delete/${perfume.id}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this perfume?');">Delete</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    html += '</div>';
                } else {
                    html = '<p class="text-muted">No matching perfumes found.</p>';
                }

                document.getElementById('perfumeResults').innerHTML = html;
            });
    });
</script>

<?= $this->include('templates/footer'); ?>
