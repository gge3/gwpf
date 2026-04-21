<?php
require_once 'auth.php';
require_login();

$form_status = $_GET['status'] ?? '';
$form_msg    = htmlspecialchars($_GET['msg'] ?? '');
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GGE — Product Manager · Barcelona</title>
  <meta name="description" content="Product Manager especialitzat en ecommerce B2C i B2B d'alta facturació. Shopify, Logicommerce, PrestaShop, WordPress.">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="page-wrap">

  <!-- HEADER -->
  <header>
    <a href="index.php" class="logo">GREN<em>.WORKS</em></a>
    <nav>
      <a href="#about">Perfil</a>
      <a href="#projects">Projectes</a>
      <a href="#contact">Contacte</a>
      <a href="dashboard.php" class="nav-cta">Dashboard</a>
      <a href="logout.php" class="nav-danger">Sortir</a>
    </nav>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-inner">
      <div class="hero-eyebrow">GGE · Product Manager · Barcelona</div>
      <h1>
        Construeixo<br>
        <strong>producte digital</strong><br>
        que <em>ven de veritat.</em>
      </h1>
      <p class="hero-desc">
        Més de 8 anys gestionant projectes ecommerce B2C i B2B amb facturacions
        de fins a 500K€ mensuals. Del briefing al go-live, amb visió de negoci,
        tècnica i màrqueting.
      </p>
      <div class="hero-stats">
        <div class="stat">
          <span class="stat-num">500K<sup>€</sup></span>
          <span class="stat-label">Facturació mensual màx.</span>
        </div>
        <div class="stat">
          <span class="stat-num">8<sup>+</sup></span>
          <span class="stat-label">Anys d'experiència</span>
        </div>
        <div class="stat">
          <span class="stat-num">30<sup>+</sup></span>
          <span class="stat-label">Projectes entregats</span>
        </div>
        <div class="stat">
          <span class="stat-num">4</span>
          <span class="stat-label">Plataformes dominades</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section class="section" id="about">
    <div class="section-label">Perfil</div>
    <h2 class="section-title">PM amb visió de<br><strong>negoci i tecnologia.</strong></h2>
    <div class="about-grid">
      <div class="about-text">
        <p>
          Soc un Product Manager format en màrqueting digital, amb un Màster que
          complementa la meva experiència pràctica portant projectes ecommerce complexos
          de principi a fi. Treballo tant amb equips interns com amb agències i
          desenvolupadors externs.
        </p>
        <p>
          El meu valor diferencial és entendre igualment bé el costat de negoci —
          conversió, marge, experiència d'usuari — i el costat tècnic: arquitectura
          de plataformes, integracions, rendiment i escalabilitat.
        </p>
        <p>
          He portat clients grans en sectors de moda, retail, distribució B2B i serveis,
          i entenc que cada projecte té les seves particularitats. M'adapto ràpid
          i executo amb criteri.
        </p>
      </div>
      <div class="skills-block">
        <div class="skill-row">
          <span class="skill-name">Gestió de producte</span>
          <span class="skill-tag">Core</span>
        </div>
        <div class="skill-row">
          <span class="skill-name">Ecommerce B2C · B2B</span>
          <span class="skill-tag">Especialitat</span>
        </div>
        <div class="skill-row">
          <span class="skill-name">Shopify · Logicommerce</span>
          <span class="skill-tag">Plataforma</span>
        </div>
        <div class="skill-row">
          <span class="skill-name">PrestaShop · WordPress</span>
          <span class="skill-tag">Plataforma</span>
        </div>
        <div class="skill-row">
          <span class="skill-name">Màrqueting Digital · SEO</span>
          <span class="skill-tag">Màster</span>
        </div>
        <div class="skill-row">
          <span class="skill-name">Analítica · CRO</span>
          <span class="skill-tag">Data</span>
        </div>
        <div class="skill-row">
          <span class="skill-name">Gestió d'equips i clients</span>
          <span class="skill-tag">Leadership</span>
        </div>
        <div class="skill-row">
          <span class="skill-name">Integracions · APIs · ERPs</span>
          <span class="skill-tag">Tècnic</span>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECTS -->
  <section class="section" id="projects">
    <div class="section-label">Projectes destacats</div>
    <h2 class="section-title">Casos que<br><strong>parlen per si sols.</strong></h2>
    <div class="projects">

      <div class="project-item">
        <div class="project-num">01</div>
        <div class="project-body">
          <div class="project-platform">Shopify Plus</div>
          <div class="project-name">Ecommerce B2C de moda — Mercat internacional</div>
          <p class="project-desc">
            Lideratge complet de migració i replatforming a Shopify Plus per a una marca
            de moda amb presència a 6 mercats europeus. Implementació de multimoneda,
            multiidioma, integració amb ERP i optimització del checkout que va reduir
            l'abandonament un 18%. Facturació superior a 400K€/mes.
          </p>
          <div class="project-tags">
            <span class="tag">Shopify Plus</span>
            <span class="tag">Multimercat</span>
            <span class="tag">ERP Integration</span>
            <span class="tag">CRO</span>
            <span class="tag">B2C</span>
          </div>
        </div>
        <div class="project-arrow">→</div>
      </div>

      <div class="project-item">
        <div class="project-num">02</div>
        <div class="project-body">
          <div class="project-platform">Logicommerce</div>
          <div class="project-name">Portal B2B de distribució — Sector industrial</div>
          <p class="project-desc">
            Definició i gestió d'un portal de comandes B2B per a distribuïdors amb
            catàleg de 12.000 referències, preus per client, gestió de comandes
            recurrents i sincronització en temps real amb l'ERP corporatiu. Reducció
            del 40% en temps de gestió de comandes per part de l'equip comercial.
          </p>
          <div class="project-tags">
            <span class="tag">Logicommerce</span>
            <span class="tag">B2B</span>
            <span class="tag">ERP Sync</span>
            <span class="tag">Catàleg complex</span>
            <span class="tag">Automatització</span>
          </div>
        </div>
        <div class="project-arrow">→</div>
      </div>

      <div class="project-item">
        <div class="project-num">03</div>
        <div class="project-body">
          <div class="project-platform">Logicommerce</div>
          <div class="project-name">Ecommerce B2C retail — Creixement accelerat</div>
          <p class="project-desc">
            Roadmap i execució d'un projecte de creixement per a retailer nacional amb
            temporalitats fortes. Implementació d'estratègia omnicanal, integració amb
            marketplace (Amazon, El Corte Inglés), sistema de fidelització i millora
            de la velocitat de la plataforma. Creixement del 60% en vendes online
            en dos anys.
          </p>
          <div class="project-tags">
            <span class="tag">Logicommerce</span>
            <span class="tag">Omnicanal</span>
            <span class="tag">Marketplaces</span>
            <span class="tag">Fidelització</span>
            <span class="tag">Performance</span>
          </div>
        </div>
        <div class="project-arrow">→</div>
      </div>

      <div class="project-item">
        <div class="project-num">04</div>
        <div class="project-body">
          <div class="project-platform">PrestaShop</div>
          <div class="project-name">Ecommerce especialitzat — Nínxol premium</div>
          <p class="project-desc">
            Creació des de zero d'una botiga online per a un sector de nínxol premium,
            amb experiència de compra diferenciada, configurador de producte a mida,
            passarel·les de pagament especialitzades i integració logística. Ticket
            mitjà superior a 300€ amb tassa de conversió per sobre de la mitjana del sector.
          </p>
          <div class="project-tags">
            <span class="tag">PrestaShop</span>
            <span class="tag">UX Premium</span>
            <span class="tag">Configurador</span>
            <span class="tag">Logística</span>
            <span class="tag">Nínxol</span>
          </div>
        </div>
        <div class="project-arrow">→</div>
      </div>

    </div>
  </section>

  <!-- CONTACT -->
  <section class="section" id="contact">
    <div class="section-label">Contacte</div>
    <div class="contact-grid">
      <div class="contact-info">
        <h3>Parlem del<br><strong>teu projecte.</strong></h3>
        <p>
          Si tens un projecte ecommerce que necessita un PM amb experiència real,
          o estàs buscant algú que conegui les plataformes per dins i sàpiga
          parlar tant amb el CEO com amb el desenvolupador, escriu-me.
        </p>
        <div class="contact-links">
          <a href="mailto:hello@grenworks.com" class="contact-link">
            <span class="contact-link-label">Email</span>
            hello@grenworks.com
          </a>
          <a href="https://linkedin.com/in/gge" target="_blank" class="contact-link">
            <span class="contact-link-label">LinkedIn</span>
            linkedin.com/in/gge
          </a>
          <a href="#" class="contact-link">
            <span class="contact-link-label">Ubicació</span>
            Barcelona, Catalunya
          </a>
        </div>
      </div>
      <div class="contact-form-wrap">
        <?php if ($form_status === 'ok'): ?>
          <div class="alert alert-success">Missatge rebut. Et respondré en menys de 24h.</div>
        <?php elseif ($form_status === 'error'): ?>
          <div class="alert alert-error"><?= $form_msg ?></div>
        <?php endif; ?>
        <form method="POST" action="submit.php">
          <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required maxlength="100" placeholder="El teu nom" />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required maxlength="150" placeholder="email@empresa.com" />
          </div>
          <div class="form-group">
            <label for="message">Missatge</label>
            <textarea id="message" name="message" required maxlength="5000" placeholder="Explica'm el teu projecte..."></textarea>
          </div>
          <button type="submit" class="btn-submit">Enviar missatge →</button>
        </form>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <span>GREN.WORKS · GGE · Barcelona</span>
    <span>© <?= date('Y') ?> · Tots els drets reservats</span>
  </footer>

</div>
<script>
  // Cursor only on desktop
  if (window.matchMedia('(hover: hover)').matches) {
    const lines = [
      'Interface carregada.',
      'Benvingut/da a GREN.WORKS.',
    ];
  }
</script>
</body>
</html>