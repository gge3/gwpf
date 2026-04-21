<?php
require_once 'auth.php';
require_login();

$conn = db_connect();

$total = 0;
$res = $conn->query("SELECT COUNT(*) AS total FROM messages");
if ($res) { $total = (int)$res->fetch_assoc()['total']; $res->free(); }

$latest = '—';
$res2 = $conn->query("SELECT created_at FROM messages ORDER BY created_at DESC LIMIT 1");
if ($res2 && $res2->num_rows > 0) { $latest = $res2->fetch_assoc()['created_at']; $res2->free(); }

$messages = [];
$stmt = $conn->prepare("SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC");
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) { $messages[] = $row; }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard — GREN.WORKS</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="page-wrap">

  <header>
    <a href="index.php" class="logo">GREN<em>.WORKS</em></a>
    <nav>
      <a href="index.php">← Portfolio</a>
      <a href="logout.php" class="nav-danger">Sortir</a>
    </nav>
  </header>

  <div class="dash-wrap">

    <div class="section-label" style="margin-bottom:32px;">Dashboard intern</div>

    <div class="dash-stats">
      <div class="stat-card">
        <span class="label">Missatges totals</span>
        <span class="value"><?= $total ?></span>
      </div>
      <div class="stat-card">
        <span class="label">Últim contacte</span>
        <span class="value" style="font-size:15px;font-weight:400;letter-spacing:0;"><?= htmlspecialchars($latest) ?></span>
      </div>
      <div class="stat-card">
        <span class="label">Sessió activa</span>
        <span class="value" style="font-size:15px;font-weight:500;letter-spacing:0;color:var(--green);"><?= htmlspecialchars($_SESSION['user'] ?? '—') ?></span>
      </div>
    </div>

    <div class="dash-table-wrap">
      <div class="dash-table-header">
        <h3>Missatges rebuts</h3>
      </div>
      <?php if (empty($messages)): ?>
        <div class="empty-msg">Encara no hi ha missatges.</div>
      <?php else: ?>
        <div class="table-wrap">
          <table>
            <thead>
              <tr><th>#</th><th>Nom</th><th>Email</th><th>Missatge</th><th>Data</th></tr>
            </thead>
            <tbody>
              <?php foreach ($messages as $m): ?>
              <tr>
                <td class="id-cell"><?= (int)$m['id'] ?></td>
                <td><?= htmlspecialchars($m['name']) ?></td>
                <td class="email"><?= htmlspecialchars($m['email']) ?></td>
                <td class="msg-cell"><?= nl2br(htmlspecialchars($m['message'])) ?></td>
                <td class="date"><?= htmlspecialchars($m['created_at']) ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

  </div>

  <footer>
    <span>GREN.WORKS · Dashboard</span>
    <span>© <?= date('Y') ?></span>
  </footer>

</div>
</body>
</html>