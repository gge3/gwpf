<?php
require_once 'auth.php';

// Si ja autenticat, redirigeix al portfolio
if (is_logged_in()) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username'] ?? '');
    $pass = trim($_POST['password'] ?? '');

    if ($user === ADMIN_USER && $pass === ADMIN_PASS) {
        $_SESSION['authenticated'] = true;
        $_SESSION['user']          = $user;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Credencials incorrectes. Accés denegat.';
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LOGIN // OPERATIVE_01</title>
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Rajdhani:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="world-map"></div>
  <div class="cursor" id="cursor"></div>

  <div class="login-wrap z1">
    <div class="login-box">
      <span class="logo-lg">OPERATIVE_01</span>
      <span class="sub">// SECURE ACCESS PORTAL</span>
      <h2>AUTENTICACIÓ REQUERIDA</h2>

      <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="POST" action="login.php">
        <div class="form-group">
          <label for="username">IDENTIFICADOR</label>
          <input
            type="text"
            id="username"
            name="username"
            autocomplete="username"
            required
            value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
          />
        </div>
        <div class="form-group">
          <label for="password">CLAU D'ACCÉS</label>
          <input
            type="password"
            id="password"
            name="password"
            autocomplete="current-password"
            required
          />
        </div>
        <button type="submit" class="btn-submit">▸ INICIAR SESSIÓ</button>
      </form>
    </div>
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