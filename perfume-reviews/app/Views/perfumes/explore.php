<?= $this->include('templates/header'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">🌸 Explore Perfumes 🌸</h2>

    <!-- Search Bar -->
    <form class="d-flex justify-content-center mb-4" method="get" action="<?= site_url('perfumes/explore') ?>">
        <input type="text" name="q" class="form-control w-50 me-2" placeholder="Search perfumes (e.g. Dior, Floral)" value="<?= esc($query ?? '') ?>">
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form>

    <?php if (!empty($results) && is_array($results)): ?>
        <div class="row">
            <?php foreach ($results as $perfume): ?>
                <div class="col-md-4 mb-4">
                    <a href="<?= esc($perfume['url'] ?? '#') ?>" target="_blank" style="text-decoration: none; color: inherit;">
                        <div class="card h-100 shadow">
                            <?php if (!empty($perfume['image'])): ?>
                                <img src="<?= esc($perfume['image']) ?>" class="card-img-top" alt="<?= esc($perfume['perfume'] ?? 'Perfume Image') ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($perfume['perfume'] ?? 'Unnamed') ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= esc($perfume['brand'] ?? 'Unknown Brand') ?></h6>
                                <p class="card-text"><?= esc($perfume['description'] ?? 'No description available.') ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted text-center">No perfumes found for "<strong><?= esc($query) ?></strong>".</p>
    <?php endif; ?>

    <!-- Map section -->
    <h4 class="text-center mt-5 mb-3">🗺️ Explore Nearby Perfume & Beauty Stores</h4>
    <div id="map" style="height: 500px; width: 100%; border-radius: 10px; overflow: hidden;"></div>
</div>
    </br>
    </br>
<!-- Leaflet & Map Script -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<style>
    .emoji-icon {
        font-size: 20px;
        line-height: 24px;
        text-align: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: white;
        color: black;
        border: 1px solid #aaa;
        box-shadow: 0 1px 4px rgba(0,0,0,0.3);
    }
</style>

<script>
    const API_KEY = "fb1fd79b58474790b598aadc871cf57c";

    const map = L.map('map').setView([0, 0], 13);

    L.tileLayer(`https://maps.geoapify.com/v1/tile/osm-bright/{z}/{x}/{y}.png?apiKey=${API_KEY}`, {
        attribution: '© OpenMapTiles © OpenStreetMap contributors'
    }).addTo(map);

    function getCategoryIcon(category) {
        let emoji = "🏬";
        if (category === "commercial.health_and_beauty.cosmetics") emoji = "💄";
        else if (category === "commercial.health_and_beauty") emoji = "🧴";
        else if (category === "commercial.supermarket") emoji = "🛒";

        return L.divIcon({
            html: `<div class="emoji-icon">${emoji}</div>`,
            className: "",
            iconSize: [32, 32],
            iconAnchor: [16, 16],
            popupAnchor: [0, -16]
        });
    }

    navigator.geolocation.getCurrentPosition(position => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        map.setView([lat, lon], 14);
        L.marker([lat, lon]).addTo(map).bindPopup("You are here 📍").openPopup();

        const categories = "commercial.health_and_beauty.cosmetics,commercial.health_and_beauty,commercial.supermarket";
        const url = `https://api.geoapify.com/v2/places?categories=${categories}&filter=circle:${lon},${lat},3000&limit=30&apiKey=${API_KEY}`;

        fetch(url)
            .then(res => res.json())
            .then(data => {
                if (!data.features || data.features.length === 0) {
                    alert("No nearby beauty stores found.");
                    return;
                }

                data.features.forEach(place => {
                    const name = place.properties.name || "Store";
                    const address = place.properties.formatted;
                    const category = place.properties.categories?.[0] || "commercial.supermarket";
                    const [lon, lat] = place.geometry.coordinates;

                    L.marker([lat, lon], {
                        icon: getCategoryIcon(category)
                    }).addTo(map).bindPopup(`<strong>${name}</strong><br>${address}<br><em>${category}</em>`);
                });
            })

            .catch(err => {
                console.error("Error loading map data:", err);
                alert("Could not load nearby store data.");
            });

    }, error => {
        alert("Location access denied.");
        console.error("Geolocation error:", error);
    });
</script>

<?= $this->include('templates/footer'); ?>
