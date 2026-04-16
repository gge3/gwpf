<?php require 'auth.php'; ?>

<h1>You're in.</h1>

<form action="submit.php" method="POST">
  <input name="name" placeholder="Nom" required><br><br>
  <input name="email" placeholder="Email" required><br><br>
  <textarea name="message" placeholder="Missatge" required></textarea><br><br>
  <button type="submit">Enviar</button>
</form>

<hr>
<a href="dashboard.php">Veure missatges</a>