<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Messages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #FFDEE9, #B5FFFC);
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #FF4D6D;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <h2 class="text-center mb-4">📬 Contact Messages</h2>

    <?php if (empty($messages)): ?>
        <div class="alert alert-info text-center">No messages received yet.</div>
    <?php else: ?>
        <?php foreach ($messages as $msg): ?>
            <div class="card">
                <div class="card-header">
                    <?= esc($msg['name']) ?> (<?= esc($msg['email']) ?>)
                    <span class="float-end"><?= date('F j, Y H:i', strtotime($msg['created_at'])) ?></span>
                </div>
                <div class="card-body">
                    <p><?= esc($msg['message']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>
