<style>
  body {
  margin: 0;
  font-family: system-ui, sans-serif;
  background: #0f172a;
  color: #e2e8f0;
}

.hero {
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 10%;
}

h1 {
  font-size: 4rem;
  margin: 0;
}

h2 {
  color: #38bdf8;
  margin: 10px 0;
}

.btn {
  margin-top: 20px;
  padding: 12px 20px;
  background: #38bdf8;
  color: black;
  width: fit-content;
  border-radius: 8px;
  text-decoration: none;
}
</style>
<?php require 'auth.php'; ?>
<section class="hero">
  <h1>You're in.</h1>
  <h2>GREN.WORKS</h2>
  <p>No compromise.</p>

  <a href="#projects" class="btn">Veure projectes</a>
</section>
<h1>You're in.</h1>

<form action="submit.php" method="POST">
  <input name="name" placeholder="Nom" required><br><br>
  <input name="email" placeholder="Email" required><br><br>
  <textarea name="message" placeholder="Missatge" required></textarea><br><br>
  <button type="submit">Enviar</button>
</form>

<hr>
<a href="dashboard.php">Veure missatges</a>