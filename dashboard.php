<?php
require 'auth.php';

$conn = new mysqli("localhost", "portfolio_user", "password_forta_123", "portfolio");

$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<h1>Missatges 📩</h1>

<a href="index.php">Tornar</a>

<hr>

<?php while($row = $result->fetch_assoc()): ?>
  <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
    <b><?= htmlspecialchars($row['name']) ?></b> (<?= $row['email'] ?>)<br>
    <small><?= $row['created_at'] ?></small>
    <p><?= nl2br(htmlspecialchars($row['message'])) ?></p>
  </div>
<?php endwhile; ?>