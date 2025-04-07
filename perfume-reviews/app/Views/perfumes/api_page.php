<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfume Products API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #FF8DA1 0%, #FFF5E6 100%);
            font-family: 'Open Sans', sans-serif;
            padding-bottom: 60px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-8px);
        }
        .product-image {
            height: 220px;
            object-fit: contain;
            padding: 10px;
            border-radius: 10px;
        }
        .page-title {
            font-family: 'Playfair Display', serif;
            color: #fff;
        }
        .price-tag {
            color: #FF4D6D;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <h2 class="text-center page-title mb-4">🌸 Live Perfume Products 🌸</h2>
    <div class="row" id="product-list">
        <!-- Perfumes will load here -->
    </div>
</div>
 
<script>
document.addEventListener("DOMContentLoaded", function () {
    fetch("https://dummyjson.com/products/category/fragrances")
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById("product-list");
            productList.innerHTML = "";

            data.products.forEach(product => {
                const col = document.createElement("div");
                col.className = "col-md-4 mb-4";

                col.innerHTML = `
                    <div class="card h-100">
                        <img src="${product.thumbnail}" class="product-image card-img-top" alt="${product.title}">
                        <div class="card-body">
                            <h5 class="card-title">${product.title}</h5>
                            <p class="card-text">${product.description.substring(0, 100)}...</p>
                            <p class="price-tag">$${product.price}</p>
                        </div>
                    </div>
                `;
                productList.appendChild(col);
            });
        })
        .catch(error => {
            document.getElementById("product-list").innerHTML =
                `<div class="col-12 text-center text-danger">🚫 Failed to load products.</div>`;
            console.error("Fetch error:", error);
        });
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
