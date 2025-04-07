<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Perfume Detail</title>

  <!-- 💄 Styling for the quote box -->
  <style>
    #quoteBox {
      background-color: #f9f3f5;
      border-left: 4px solid #e0a9b0;
      padding: 10px 20px;
      margin: 20px 0;
      border-radius: 10px;
      font-family: 'Georgia', serif;
    }
  </style>
</head>
<body>

  <!-- 💐 Perfume Info Section -->
  <h1><?= esc($perfume['name']) ?></h1>
  <p><?= esc($perfume['description']) ?></p>

  <!-- 🌸 Quote of the Day Section -->
  <h3>🌸 Perfume Quote of the Day</h3>
  <div id="quoteBox">Loading a beautiful quote...</div>

  <script>
    fetch('https://api.quotable.io/random?tags=wisdom|inspirational')
      .then(res => res.json())
      .then(data => {
        document.getElementById('quoteBox').innerHTML = `
          <blockquote style="font-style: italic; color: #444;">
            "${data.content}"<br>
            — <strong>${data.author}</strong>
          </blockquote>`;
      })
      .catch(err => {
        document.getElementById('quoteBox').innerHTML = "Could not load quote 😢";
      });
  </script>

  <!-- 👇 You can add your reviews, AJAX form, etc. below this -->

</body>
</html>
