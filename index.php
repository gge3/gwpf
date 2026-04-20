<?php
require_once 'auth.php';
require_login();   // Redirigeix a login si no autenticat

// Missatge de confirmació/error del formulari
$form_status = $_GET['status'] ?? '';
$form_msg    = htmlspecialchars($_GET['msg'] ?? '');
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GREN.WORKS</title>
  <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Rajdhani:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="world-map"></div>
  <div class="cursor" id="cursor"></div>

  <div class="page-wrap">

    <!-- ── HEADER ── -->
    <header>
      <a href="index.php" class="logo">GREN<span>.WORKSs</span></a>
      <nav>
        <a href="#about">DOSSIER</a>
        <a href="#projects">ARXIUS</a>
        <a href="#contact">COMMS</a>
        <a href="dashboard.php" class="btn-nav">▸ DASHBOARD</a>
        <a href="logout.php" style="color:var(--danger);font-size:12px;">LOGOUT</a>
      </nav>
    </header>

    <!-- ── HERO ── -->
    <section class="hero">
      <div class="hero-inner">
        <span class="hero-tag">// Powered by GREN.WORKS</span>
        <h2>Disseny. <em>Codi.</em> Execució.</h2>
        <p>
          Un portfoli de projectes, processos i resultats.<br>
          Aquest espai recull projectes d’art, música i el codi i gestió.
        </p>
        <div class="boot-line" id="boot"></div>
      </div>
    </section>

    <!-- ── ABOUT ── -->
    <section class="section" id="about">
      <div class="section-header"><h3>// DOSSIER</h3></div>
      <div class="about-grid">
        <div>
          <p>
            Més de 5 anys construint sistemes d'alta disponibilitat.
            Especialitzat en microserveis, pipelines de dades i infraestructura
            com a codi. Treballo millor en entorns on la complexitat exigeix claredat.
          </p>
          <br/>
          <p>
            Disponible per a projectes freelance i col·laboracions tècniques.
            Enfocament pragmàtic: el millor codi és el que resol el problema
            amb la mínima complexitat necessària.
          </p>
        </div>
        <ul class="skills-list">
          <li>Node.js · Express · FastAPI</li>
          <li>Docker · Kubernetes · Terraform</li>
          <li>PostgreSQL · MySQL · Redis</li>
          <li>D3.js · WebSockets · REST · gRPC</li>
          <li>GitHub Actions · CI/CD Pipelines</li>
          <li>Linux · Apache · Nginx</li>
          <li>PHP · Python · TypeScript</li>
        </ul>
      </div>
    </section>

    <!-- ── PROJECTS ── -->
    <section class="section" id="projects">
      <div class="section-header"><h3>// ARXIUS DE PROJECTE</h3></div>
      <div class="projects">
        <div class="card">
          <h4>FILE_01 // BACKEND ARCHITECTURE</h4>
          <div class="status">● STATUS: DEPLOYED</div>
          <p>Arquitectura de microserveis amb Node.js i balanceig de càrrega. Alta disponibilitat, zero downtime deployments.</p>
          <div class="tech">TECH: Node.js · Docker · Nginx · PM2</div>
        </div>
        <div class="card">
          <h4>FILE_02 // DATA VISUALIZATION</h4>
          <div class="status">● STATUS: ACTIVE</div>
          <p>Dashboard en temps real amb D3.js i WebSockets. Processat de més de 10.000 events/segon sense bloqueig del fil principal.</p>
          <div class="tech">TECH: D3.js · WebSockets · Redis Pub/Sub</div>
        </div>
        <div class="card">
          <h4>FILE_03 // AUTOMATION PIPELINE</h4>
          <div class="status">● STATUS: STABLE</div>
          <p>Pipeline CI/CD complet amb tests automatitzats, anàlisi estàtica i desplegament progressiu. Reducció del 60% en temps de release.</p>
          <div class="tech">TECH: GitHub Actions · Docker · Terraform</div>
        </div>
        <div class="card">
          <h4>FILE_04 // API GATEWAY</h4>
          <div class="status">● STATUS: PRODUCTION</div>
          <p>Gateway unificat per a múltiples serveis interns. Rate limiting, autenticació JWT i logging centralitzat.</p>
          <div class="tech">TECH: FastAPI · PostgreSQL · JWT · Prometheus</div>
        </div>
        <div class="card">
          <h4>FILE_05 // ETL SYSTEM</h4>
          <div class="status">● STATUS: RUNNING</div>
          <p>Sistema d'extracció i transformació de dades de fonts heterogènies cap a un data warehouse centralitzat.</p>
          <div class="tech">TECH: Python · Apache Airflow · BigQuery</div>
        </div>
        <div class="card">
          <h4>FILE_06 // MONITORING STACK</h4>
          <div class="status">● STATUS: LIVE</div>
          <p>Stack d'observabilitat amb mètriques, traces i logs. Alertes automàtiques i dashboards operacionals 24/7.</p>
          <div class="tech">TECH: Prometheus · Grafana · Loki · Alertmanager</div>
        </div>
      </div>
    </section>

    <!-- ── CONTACT ── -->
    <section class="section" id="contact">
      <div class="section-header"><h3>// CANAL DE COMUNICACIÓ</h3></div>
      <div class="contact-grid">
        <div class="contact-info">
          <p>
            Per a col·laboracions, consultes tècniques o oportunitats
            professionals, utilitza el formulari o contacta directament.
          </p>
          <p>
            Email: <a href="mailto:your@email.com">your@email.com</a><br>
            GitHub: <a href="#" target="_blank">github.com/operative01</a><br>
            LinkedIn: <a href="#" target="_blank">linkedin.com/in/operative01</a>
          </p>
          <p style="font-size:11px;color:var(--muted);margin-top:20px;">
            Temps de resposta habitual: &lt; 24h en dies laborables.
          </p>
        </div>

        <div>
          <?php if ($form_status === 'ok'): ?>
            <div class="alert alert-success">▸ Missatge transmès correctament. Gràcies per contactar.</div>
          <?php elseif ($form_status === 'error'): ?>
            <div class="alert alert-error">▸ Error: <?= $form_msg ?></div>
          <?php endif; ?>

          <form method="POST" action="submit.php">
            <div class="form-group">
              <label for="name">NOM</label>
              <input type="text" id="name" name="name" required maxlength="100" />
            </div>
            <div class="form-group">
              <label for="email">CORREU ELECTRÒNIC</label>
              <input type="email" id="email" name="email" required maxlength="150" />
            </div>
            <div class="form-group">
              <label for="message">MISSATGE</label>
              <textarea id="message" name="message" required maxlength="5000"></textarea>
            </div>
            <button type="submit" class="btn-submit">▸ TRANSMETRE MISSATGE</button>
          </form>
        </div>
      </div>
    </section>

    <!-- ── FOOTER ── -->
    <footer>© 2004–2026 OPERATIVE_01 // Interfície segura activa</footer>

  </div><!-- /page-wrap -->

  <script>
    // Cursor
    const cursor = document.getElementById('cursor');
    document.addEventListener('mousemove', e => {
      cursor.style.top  = e.clientY + 'px';
      cursor.style.left = e.clientX + 'px';
    });

    // Boot typewriter
    const lines = [
      'Initializing secure interface...',
      'Auth layer: OK',
      'Systems nominal. Welcome back, <?= htmlspecialchars($_SESSION['user'] ?? 'OPERATIVE') ?>.'
    ];
    const boot = document.getElementById('boot');
    let li = 0, ci = 0;
    function type() {
      if (li >= lines.length) return;
      if (ci < lines[li].length) {
        boot.textContent += lines[li][ci++];
        setTimeout(type, 35);
      } else {
        setTimeout(() => {
          boot.textContent = '';
          ci = 0; li++;
          type();
        }, 900);
      }
    }
    type();
  </script>
</body>
</html>