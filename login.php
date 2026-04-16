<?php
session_start();

$USER = "admin";
$PASS = password_hash("1234", PASSWORD_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] === $USER && password_verify($_POST['password'], $PASS)) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Credencials incorrectes";
    }
}
?>

<form method="POST">
  <input name="username" placeholder="User" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>

<?php if(isset($error)) echo $error; ?>