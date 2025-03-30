<?= $this->include('templates/header'); ?>

<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold">About Perfume Reviews</h1>
        <p class="lead text-muted">A place where fragrance meets honesty.</p>
    </div>

    <!-- 🌸 Animated Perfume Image -->
    <div class="text-center mb-5">
        <img src="<?= base_url('assets/images/about.png') ?>" alt="Loving Scent" class="img-fluid rounded shadow" style="max-width: 500px;">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="fs-5">
                Perfume Reviews was created with one simple goal — to help perfume lovers make confident fragrance choices.
                We understand how personal scent is, and we believe that reliable, heartfelt reviews can help you find the fragrance that truly suits your style and spirit.
            </p>
            <p class="fs-5">
                Whether you love floral, woody, fresh, or spicy scents, our community shares real experiences to guide your journey.
            </p>
            <p class="fs-5">
                Thank you for being a part of this beautiful, fragrant journey.
            </p>
        </div>
    </div>
</div>

<?= $this->include('templates/footer'); ?>
