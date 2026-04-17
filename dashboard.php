<?php
require_once 'auth.php';
require_login();

$conn = db_connect();

// Comptador total
$total = 0;
$res   = $conn->query("SELECT COUNT(*) AS total FROM messages");
if ($res) {
    $total = (int)$res->fetch_assoc()['total'];
    $res->free();
}

// Missatge més recent
$latest = '—';
$res2 = $conn->query("SELECT created_at FROM messages ORDER BY created_at DESC LIMIT 1");
if ($res2 && $res2->num_rows > 0) {
    $latest = $res2->fetch_assoc()['created_at'];
    $res2->free();
}

// Tots els missatges, ordenats per data desc
$messages = [];
$stmt = $conn->prepare(
    "SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC"
);
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DASHBOARD // OPERATIVE_01</title>
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Rajdhani:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="world-map"></div>
  <div class="cursor" id="cursor"></div>

  <div class="page-wrap">

    <header>
      <a href="index.php" class="logo">OPERATIVE<span>_01</span></a>
      <nav>
        <a href="index.php">◂ PORTFOLIO</a>
        <a href="logout.php" style="color:var(--danger);font-size:12px;">LOGOUT</a>
      </nav>
    </header>

    <div class="dash-wrap z1">

      <div class="section-header" style="margin-bottom:28px;">
        <h3>// DASHBOARD INTERN</h3>
      </div>

      <!-- STATS -->
      <div class="dash-stats">
        <div class="stat-card">
          <span class="label">MISSATGES TOTALS</span>
          <span class="value"><?= $total ?></span>
        </div>
        <div class="stat-card">
          <span class="label">ÚLTIM MISSATGE</span>
          <span class="value" style="font-size:14px;padding-top:4px;display:block;">
            <?= htmlspecialchars($latest) ?>
          </span>
        </div>
        <div class="stat-card">
          <span class="label">SESSIÓ ACTIVA</span>
          <span class="value" style="font-size:16px;padding-top:4px;display:block;color:var(--accent2);">
            <?= htmlspecialchars($_SESSION['user'] ?? '—') ?>
          </span>
        </div>
      </div>

      <!-- TABLE -->
      <div class="section" style="padding:28px;margin-bottom:0;">
        <div class="section-header"><h3>// MISSATGES REBUTS</h3></div>

        <?php if (empty($messages)): ?>
          <p style="color:var(--muted);font-size:13px;">No hi ha missatges registrats encara.</p>
        <?php else: ?>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>NOM</th>
                  <th>EMAIL</th>
                  <th>MISSATGE</th>
                  <th>DATA</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($messages as $m): ?>
                <tr>
                  <td style="color:var(--muted);font-size:11px;"><?= (int)$m['id'] ?></td>
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

    </div><!-- /dash-wrap -->

    <footer>© 2004–2026 OPERATIVE_01 // Panell intern restringit</footer>
  </div>

  <script>
    const cursor = document.getElementById('cursor');
    document.addEventListener('mousemove', e => {
      cursor.style.top  = e.clientY + 'px';
      cursor.style.left = e.clientX + 'px';
    });
  </script>
</body>
</html>