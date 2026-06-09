<?php
session_start();

?>  
  
  
  <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>
<link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  :root{
    --cream:#FDF8F0;--deep:#1A1208;--amber:#D4820A;--amber-light:#FFF0CC;
    --teal:#0D6B55;--teal-light:#E0F4EE;--coral:#C85A2A;
    --paw1:#F5E6C8;--paw2:#EBD4A5;
    --ff:'Fraunces',serif;--fb:'DM Sans',sans-serif;
  }
  body{background:var(--cream);color:var(--deep);font-family:var(--fb);overflow-x:hidden}

  /* NAV */

  /* HERO */
  .hero{display:grid;grid-template-columns:1fr 1fr;gap:2rem;padding:5% 5% 4%;align-items:center;min-height:88vh;position:relative;overflow:hidden}
  .hero::before{content:'';position:absolute;right:-120px;top:-80px;width:600px;height:600px;background:radial-gradient(circle,var(--amber-light) 0%,transparent 70%);pointer-events:none;z-index:0}
  .hero-text{position:relative;z-index:1}
  .badge{display:inline-flex;align-items:center;gap:6px;background:var(--teal-light);color:var(--teal);font-size:.8rem;font-weight:500;padding:.35rem .9rem;border-radius:50px;margin-bottom:1.5rem;border:1px solid #9FE1CB}
  h1{font-family:var(--ff);font-size:4rem;font-weight:900;line-height:1.05;letter-spacing:-2px;margin-bottom:1.2rem;color:var(--deep)}
  h1 em{font-style:italic;color:var(--amber)}
  .hero-sub{font-size:1.05rem;opacity:.7;line-height:1.7;max-width:440px;margin-bottom:2.5rem}
  .hero-btns{display:flex;gap:1rem;flex-wrap:wrap}
  .btn-primary{background:var(--deep);color:var(--cream);padding:.85rem 2rem;border-radius:50px;text-decoration:none;font-weight:500;font-size:.95rem;transition:transform .2s,background .2s;display:inline-flex;align-items:center;gap:8px}
  .btn-primary:hover{background:var(--amber);transform:translateY(-2px)}
  .btn-secondary{background:transparent;color:var(--deep);padding:.85rem 2rem;border-radius:50px;text-decoration:none;font-weight:500;font-size:.95rem;border:1.5px solid var(--paw2);transition:border-color .2s,transform .2s;display:inline-flex;align-items:center;gap:8px}
  .btn-secondary:hover{border-color:var(--amber);transform:translateY(-2px)}

  /* QR CARD */
  .hero-visual{position:relative;z-index:1;display:flex;justify-content:center;align-items:center}
  .qr-scene{position:relative;width:320px;height:380px}
  .qr-card-main{background:#fff;border-radius:24px;padding:1.5rem;box-shadow:0 20px 60px rgba(26,18,8,.12);position:absolute;top:20px;left:20px;width:280px;z-index:2;border:1.5px solid var(--paw2);animation:float 4s ease-in-out infinite}
  .pet-avatar{width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,var(--amber-light),var(--paw2));margin-bottom:.8rem;display:flex;align-items:center;justify-content:center;font-size:1.8rem;border:2px solid var(--paw2)}
  .pet-name{font-family:var(--ff);font-size:1.2rem;font-weight:700;margin-bottom:2px}
  .pet-breed{font-size:.78rem;opacity:.55;margin-bottom:1rem}
  .qr-box{width:100%;aspect-ratio:1;background:var(--cream);border-radius:12px;display:flex;align-items:center;justify-content:center;border:1px solid var(--paw2)}
  .qr-svg{width:80%;height:80%}
  .qr-card-back{background:var(--teal);border-radius:20px;padding:1.2rem;position:absolute;bottom:0;right:0;width:200px;z-index:1;color:#fff;animation:float2 4s ease-in-out infinite}
  .qr-back-label{font-size:.7rem;opacity:.7;margin-bottom:.3rem}
  .qr-back-val{font-family:var(--ff);font-size:1rem;font-weight:700}
  .paw-float{position:absolute;font-size:1.8rem;opacity:.15;animation:spin 8s linear infinite}
  .pf1{top:0;right:0}
  .pf2{bottom:60px;left:0;animation-direction:reverse;font-size:1.2rem}

  @keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
  @keyframes float2{0%,100%{transform:translateY(0) rotate(-3deg)}50%{transform:translateY(-6px) rotate(-3deg)}}
  @keyframes spin{from{transform:rotate(0)}to{transform:rotate(360deg)}}

  /* STATS */
  .stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--paw2);margin:0 5%;border-radius:16px;overflow:hidden}
  .stat-box{background:var(--cream);padding:1.8rem;text-align:center}
  .stat-num{font-family:var(--ff);font-size:2.2rem;font-weight:900;color:var(--amber)}
  .stat-lbl{font-size:.82rem;opacity:.6;margin-top:4px}

  /* FEATURES */
  .features{padding:5% 5%;display:grid;grid-template-columns:repeat(3,1fr);gap:1.5rem;margin-top:3rem}
  .feat-card{background:#fff;border-radius:20px;padding:1.8rem;border:1.5px solid var(--paw2);position:relative;overflow:hidden;transition:transform .25s,border-color .25s}
  .feat-card:hover{transform:translateY(-4px);border-color:var(--amber)}
  .feat-card::after{content:'';position:absolute;bottom:-30px;right:-20px;width:80px;height:80px;background:var(--amber-light);border-radius:50%;opacity:.5}
  .feat-icon{font-size:1.6rem;margin-bottom:.8rem}
  .feat-title{font-family:var(--ff);font-size:1.1rem;font-weight:700;margin-bottom:.5rem}
  .feat-desc{font-size:.85rem;opacity:.65;line-height:1.65}

  /* HOW IT WORKS */
  .how{padding:5% 5%;background:var(--deep);color:var(--cream);border-radius:32px;margin:2rem 5%}
  .how h2{font-family:var(--ff);font-size:2.5rem;font-weight:900;text-align:center;margin-bottom:.5rem}
  .how-sub{text-align:center;opacity:.6;font-size:.95rem;margin-bottom:3rem}
  .steps{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;position:relative}
  .steps::before{content:'';position:absolute;top:32px;left:16%;right:16%;height:1px;background:rgba(253,248,240,.15)}
  .step{text-align:center}
  .step-num{width:64px;height:64px;background:var(--amber);border-radius:50%;font-family:var(--ff);font-size:1.4rem;font-weight:900;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;color:var(--deep)}
  .step-title{font-family:var(--ff);font-size:1rem;font-weight:700;margin-bottom:.4rem}
  .step-desc{font-size:.82rem;opacity:.55;line-height:1.6}

  /* CTA */
  .cta-section{text-align:center;padding:6% 5%;position:relative}
  .cta-section h2{font-family:var(--ff);font-size:3rem;font-weight:900;letter-spacing:-1px;line-height:1.1;margin-bottom:1rem}
  .cta-section h2 em{font-style:italic;color:var(--amber)}
  .cta-section p{opacity:.65;max-width:420px;margin:0 auto 2.5rem;line-height:1.7}
  .paw-bg{position:absolute;font-size:8rem;opacity:.04;top:10%;left:5%;pointer-events:none}
  .paw-bg2{position:absolute;font-size:6rem;opacity:.04;bottom:10%;right:8%;pointer-events:none}

  /* FOOTER */
  footer{border-top:1px solid var(--paw2);padding:2rem 5%;display:flex;justify-content:space-between;align-items:center}
  .footer-logo{font-family:var(--ff);font-weight:900;font-size:1.1rem}
  footer small{opacity:.4;font-size:.78rem}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./cards.html">cards</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./formulario.php">formulario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./registrarmascotas.php">registrar mascotas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="hero">
  <div class="hero-text">
    <div class="badge">✦ Sistema de identificación inteligente</div>
    <h1>Tu mascota,<br>siempre <em>identificada</em><br>y segura</h1>
    <p class="hero-sub">Registrá a tu mascota y generá un código QR único. Cualquier persona que lo escanee verá sus datos y podrá contactarte al instante.</p>
    <div class="hero-btns">
      <a href="#" class="btn-primary">🐾 Registrar ahora</a>
      <a href="./neri-main/index.php" class="btn-secondary">Ver demo →</a>
      <a href="nombre.php" class="btn-secondary">nombre</a>
    </div>
  </div>

  <div class="hero-visual">
    <div class="qr-scene">
      <span class="paw-float pf1">🐾</span>
      <span class="paw-float pf2">🐾</span>
      <div class="qr-card-main">
        <div class="pet-avatar">🐕</div>
        <div class="pet-name">Milo García</div>
        <div class="pet-breed">Golden Retriever · 3 años</div>
        <div class="qr-box">
          <svg class="qr-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <!-- QR simulado -->
            <rect width="100" height="100" fill="white"/>
            <rect x="5" y="5" width="35" height="35" rx="3" fill="#1A1208"/>
            <rect x="10" y="10" width="25" height="25" rx="2" fill="white"/>
            <rect x="15" y="15" width="15" height="15" rx="1" fill="#1A1208"/>
            <rect x="60" y="5" width="35" height="35" rx="3" fill="#1A1208"/>
            <rect x="65" y="10" width="25" height="25" rx="2" fill="white"/>
            <rect x="70" y="15" width="15" height="15" rx="1" fill="#1A1208"/>
            <rect x="5" y="60" width="35" height="35" rx="3" fill="#1A1208"/>
            <rect x="10" y="65" width="25" height="25" rx="2" fill="white"/>
            <rect x="15" y="70" width="15" height="15" rx="1" fill="#1A1208"/>
            <rect x="45" y="5" width="8" height="8" fill="#1A1208"/>
            <rect x="55" y="5" width="5" height="5" fill="#1A1208"/>
            <rect x="45" y="15" width="5" height="8" fill="#1A1208"/>
            <rect x="52" y="12" width="6" height="6" fill="#1A1208"/>
            <rect x="45" y="25" width="8" height="5" fill="#1A1208"/>
            <rect x="55" y="22" width="5" height="8" fill="#1A1208"/>
            <rect x="45" y="45" width="8" height="5" fill="#1A1208"/>
            <rect x="55" y="42" width="5" height="8" fill="#1A1208"/>
            <rect x="65" y="45" width="8" height="5" fill="#1A1208"/>
            <rect x="75" y="42" width="8" height="8" fill="#1A1208"/>
            <rect x="85" y="45" width="8" height="5" fill="#D4820A"/>
            <rect x="45" y="55" width="5" height="8" fill="#1A1208"/>
            <rect x="52" y="52" width="8" height="5" fill="#1A1208"/>
            <rect x="62" y="55" width="5" height="8" fill="#1A1208"/>
            <rect x="70" y="52" width="8" height="8" fill="#1A1208"/>
            <rect x="80" y="55" width="5" height="5" fill="#1A1208"/>
            <rect x="87" y="52" width="6" height="6" fill="#1A1208"/>
            <rect x="45" y="65" width="8" height="8" fill="#1A1208"/>
            <rect x="55" y="65" width="5" height="5" fill="#D4820A"/>
            <rect x="62" y="68" width="6" height="5" fill="#1A1208"/>
            <rect x="70" y="65" width="5" height="8" fill="#1A1208"/>
            <rect x="78" y="65" width="8" height="5" fill="#1A1208"/>
            <rect x="87" y="65" width="6" height="8" fill="#1A1208"/>
            <rect x="45" y="75" width="5" height="8" fill="#1A1208"/>
            <rect x="52" y="78" width="8" height="5" fill="#1A1208"/>
            <rect x="62" y="75" width="8" height="8" fill="#1A1208"/>
            <rect x="72" y="78" width="5" height="5" fill="#1A1208"/>
            <rect x="80" y="75" width="8" height="8" fill="#D4820A"/>
            <rect x="45" y="85" width="8" height="8" fill="#1A1208"/>
            <rect x="55" y="88" width="5" height="5" fill="#1A1208"/>
            <rect x="62" y="85" width="6" height="8" fill="#1A1208"/>
            <rect x="70" y="88" width="8" height="5" fill="#1A1208"/>
            <rect x="80" y="85" width="6" height="5" fill="#1A1208"/>
            <rect x="88" y="82" width="5" height="8" fill="#1A1208"/>
          </svg>
        </div>
      </div>
      <div class="qr-card-back">
        <div class="qr-back-label">Último escaneo</div>
        <div class="qr-back-val">Hace 2 minutos</div>
        <div style="margin-top:.8rem;font-size:.72rem;opacity:.6">📍 Buenos Aires, AR</div>
      </div>
    </div>
  </div>
</section>

<div class="stats">
  <div class="stat-box"><div class="stat-num">12.400+</div><div class="stat-lbl">Mascotas registradas</div></div>
  <div class="stat-box"><div class="stat-num">98%</div><div class="stat-lbl">Tasa de reencuentro</div></div>
  <div class="stat-box"><div class="stat-num">3 seg</div><div class="stat-lbl">Para escanear el QR</div></div>
</div>

<section class="features">
  <div class="feat-card">
    <div class="feat-icon">🔖</div>
    <div class="feat-title">QR único por mascota</div>
    <div class="feat-desc">Cada mascota recibe un código QR irrepetible. Se puede imprimir, plastificar y colocar en el collar.</div>
  </div>
  <div class="feat-card">
    <div class="feat-icon">📋</div>
    <div class="feat-title">Perfil completo</div>
    <div class="feat-desc">Nombre, raza, edad, vacunas, alergias y contacto de emergencia. Todo en un solo lugar.</div>
  </div>
  <div class="feat-card">
    <div class="feat-icon">🔔</div>
    <div class="feat-title">Alertas de escaneo</div>
    <div class="feat-desc">Recibís una notificación cada vez que alguien escanea el QR de tu mascota, con ubicación aproximada.</div>
  </div>
  <div class="feat-card">
    <div class="feat-icon">🏥</div>
    <div class="feat-title">Historial médico</div>
    <div class="feat-desc">Cargá el historial veterinario, turnos y medicamentos. Acceso inmediato en cualquier emergencia.</div>
  </div>
  <div class="feat-card">
    <div class="feat-icon">📸</div>
    <div class="feat-title">Fotos y descripción</div>
    <div class="feat-desc">Agregá fotos y una descripción física para facilitar la identificación si tu mascota se pierde.</div>
  </div>
  <div class="feat-card">
    <div class="feat-icon">🌍</div>
    <div class="feat-title">Sin app necesaria</div>
    <div class="feat-desc">El QR abre directamente en el navegador. Quien lo escanee no necesita instalarse nada.</div>
  </div>
</section>

<section class="how">
  <h2>¿Cómo funciona?</h2>
  <p class="how-sub">Tres pasos simples para mantener a tu mascota protegida</p>
  <div class="steps">
    <div class="step">
      <div class="step-num">1</div>
      <div class="step-title">Registrá tu mascota</div>
      <div class="step-desc">Completá el perfil con sus datos, foto y tus datos de contacto</div>
    </div>
    <div class="step">
      <div class="step-num">2</div>
      <div class="step-title">Imprimí el QR</div>
      <div class="step-desc">Descargá el código QR único y colócalo en el collar o plaquita</div>
    </div>
    <div class="step">
      <div class="step-num">3</div>
      <div class="step-title">¡Listo y protegido!</div>
      <div class="step-desc">Cualquier persona puede escanear el QR y contactarte al instante</div>
    </div>
  </div>
</section>

<section class="cta-section">
  <span class="paw-bg">🐾</span>
  <span class="paw-bg2">🐾</span>
  <h2>¿Tu mascota ya tiene<br>su <em>QR propio</em>?</h2>
  <p>Registrala gratis en menos de 2 minutos y tené la tranquilidad de saber que siempre puede volver a casa.</p>
  <a href="#" class="btn-primary" style="font-size:1rem;padding:1rem 2.5rem">🐾 Registrar mi mascota gratis</a>
</section>

<footer>
  <div class="footer-logo">🐾 PetControl</div>
  <small>© 2026 PetControl · Todos los derechos reservados</small>
  <small>Hecho con ❤️ para los que aman a sus mascotas</small>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
