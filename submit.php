<?php
require_once 'auth.php';

// Només accepta POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// ── Recollida i saneig bàsic ───────────────────────────────────
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$message = trim($_POST['message'] ?? '');

// ── Validació ─────────────────────────────────────────────────
$errors = [];

if ($name === '' || mb_strlen($name) > 100) {
    $errors[] = 'El nom és obligatori (màx. 100 caràcters).';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150) {
    $errors[] = 'Adreça de correu no vàlida.';
}
if ($message === '' || mb_strlen($message) > 5000) {
    $errors[] = 'El missatge és obligatori (màx. 5000 caràcters).';
}

if (!empty($errors)) {
    // Torna a index amb errors (simple: paràmetre GET)
    $msg = urlencode(implode(' | ', $errors));
    header("Location: index.php?status=error&msg={$msg}#contact");
    exit;
}

// ── Inserció a BD ─────────────────────────────────────────────
$conn = db_connect();

$stmt = $conn->prepare(
    "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)"
);

if (!$stmt) {
    error_log('Prepare error: ' . $conn->error);
    header('Location: index.php?status=error&msg=' . urlencode('Error intern. Torna-ho a intentar.') . '#contact');
    exit;
}

$stmt->bind_param('sss', $name, $email, $message);

if ($stmt->execute()) {
    header('Location: index.php?status=ok#contact');
} else {
    error_log('Execute error: ' . $stmt->error);
    header('Location: index.php?status=error&msg=' . urlencode('Error intern. Torna-ho a intentar.') . '#contact');
}

$stmt->close();
$conn->close();
exit;