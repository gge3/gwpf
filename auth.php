<?php
// ── CONFIGURATION ──────────────────────────────────────────────
define('ADMIN_USER',     'operative');
define('ADMIN_PASS',     'changeme123');   // ← canvia-ho!

// ── DB CONFIG ──────────────────────────────────────────────────
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio');
define('DB_USER', 'portfolio_user');
define('DB_PASS', 'PasswordSegur123!');

// ── SESSION ────────────────────────────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Retorna una connexió mysqli o atura l'execució amb error.
 */
function db_connect(): mysqli {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        // En producció, log l'error i mostra missatge genèric
        error_log('DB connect error: ' . $conn->connect_error);
        die('Error de connexió a la base de dades.');
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}

/**
 * Comprova si l'usuari actual està autenticat.
 */
function is_logged_in(): bool {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true;
}

/**
 * Redirigeix a login si no autenticat.
 */
function require_login(): void {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}