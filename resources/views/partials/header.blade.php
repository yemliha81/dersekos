<!doctype html>
<html lang="tr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Derse Kos! — Özel Ders Platformu</title>
  <meta name="description" content="Öğrencileri ve eğitmenleri buluşturan DerseKoş platformuna kayıt olun ve ücretsiz ders fırsatını kaçırmayın! Derse koş! Öğrenci kayıt. Derse koş!" />
  <!-- Google Font (optional) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- favicon --> 
  <link rel="icon" type="image/png" href="{{asset('assets/img/dersekos-favicon.png')}}" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/locales-all.global.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- jquery latest --> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    /* -----------------------------
       Base / Mobile-first
       ----------------------------- */
    :root{
      --bg:#0f1724; /* navy-ish */
      --card:#0b1220;
      --muted:#9aa4b2;
      --accent: #6c7cff; /* primary */
      --accent-2: #4ad6b6;
      --glass: rgba(255,255,255,0.04);
      --radius: 14px;
      color-scheme: dark;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    .grid-20{
      display: grid;
      gap:20px;
    }
    .teacher-profile{
      display: grid;
    grid-template-columns: 300px auto;
    }
    .teacher-card{
      background:linear-gradient(180deg, rgba(255,255,255,0.02), #666666); padding:14px; border-radius:12px; margin-bottom:12px; border:1px  solid #673AB7;
    }
    .lessons{
      display: grid; gap:12px;
      grid-template-columns:1fr 1fr;
    }
    .lesson-card{
    background: linear-gradient(180deg, rgba(201, 244, 61, 0.02), #bee329);
    padding: 14px;
    border-radius: 12px;
    border: 1px solid #78ff22;
    border: 1px solid #3b7515; 
  margin-bottom: 12px;
    }
    .logo-div{
      display:flex; justify-content:center; align-items:center;
    }
    .logo-div img{
      max-width:100%; display:block;
    }
    body{
      margin:0; font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
      background: #FFFFFF; color:#000000;
      -webkit-font-smoothing:antialiased; -moz-osx-font-smoothing:grayscale; line-height:1.45;
      padding:24px;
    }
    section{margin:50px 0}
    a{color:inherit; text-decoration:none}
    img{max-width:100%; display:block}

    /* Container */
    .container{max-width:1180px; margin:0 auto}

    /* Sabit Header */
    header{
      position:fixed; top:0; left:0; right:0; z-index:1000;
      background:rgba(7,16,40,.9); backdrop-filter: blur(8px);
      border-bottom:1px solid rgba(255,255,255,0.04)
    }
    header .inner{display:flex; align-items:center; justify-content:space-between; gap:16px; padding:16px 24px}

    .brand{display:flex; align-items:center; gap:12px; color:#FFFFFF;}
    .logo{width:48px; height:48px; border-radius:10px; background:linear-gradient(135deg,var(--accent),var(--accent-2)); display:flex; align-items:center; justify-content:center; font-weight:800; color:#061025}
    .site-title{font-weight:700; font-size:18px}
    .nav{display:flex; gap:12px; align-items:center}
    .nav a{padding:10px 12px; border-radius:10px; color:var(--muted); font-weight:600}
    .nav a.cta{background:linear-gradient(90deg,var(--accent),var(--accent-2)); color:#061025}

    /* Hero */
    .hero{display:grid; gap:20px; grid-template-columns:1fr; align-items:center; margin-bottom:32px}
    .hero-card{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); padding:22px; border-radius:18px; box-shadow:0 8px 30px rgba(2,6,23,0.6); display:grid; gap:18px}
    .hero-left h1{font-size:28px; margin:0; line-height:1.05}
    .hero-left p{margin:0; color:var(--muted)}
    .search-row{display:flex; gap:10px; align-items:center}
    .search-row input{flex:1; padding:12px 14px; border-radius:12px; border:1px solid rgba(255,255,255,0.04); background:transparent; color:inherit}
    .btn{display:inline-flex; align-items:center; gap:10px; padding:12px 16px; border-radius:12px; font-weight:700}
    .btn-primary{background:linear-gradient(90deg,var(--accent),var(--accent-2)); color:#061025}
    .btn-ghost{border:1px solid rgba(255,255,255,0.04); background:transparent; color:var(--muted)}

    /* Stats */
    .stats{display:flex; gap:12px; flex-wrap:wrap}
    .stat{background:var(--glass); padding:10px 12px; border-radius:12px; min-width:120px; text-align:center}
    .stat b{display:block; font-size:18px}

    /* Cards list */
    .cards{display:grid; gap:12px}
    .teacher{display:flex; gap:12px; padding:14px; align-items:center; background:linear-gradient(180deg, rgba(255,255,255,0.02), transparent); border-radius:12px}
    .avatar{width:64px; height:64px; border-radius:12px; flex-shrink:0; background:linear-gradient(180deg,var(--accent),var(--accent-2)); display:flex; align-items:center; justify-content:center; font-weight:700}
    .teacher .meta small{color:var(--muted)}

    /* Features */
    .features{display:grid; gap:12px}
    .feature{padding:14px;; border-radius:12px}

    /* Footer */
    footer{margin-top:28px; padding-top:18px; border-top:1px dashed rgba(255,255,255,0.03); display:flex; justify-content:space-between; gap:12px; flex-wrap:wrap}

    /* Responsive larger screens */
    @media(min-width:820px){
      header{margin-bottom:40px}
      .hero{grid-template-columns:1fr 420px}
      .hero-left h1{font-size:36px}
      .cards{grid-template-columns:repeat(2, minmax(0,1fr))}
      .features{grid-template-columns:repeat(3,1fr)}
      
    }
    @media(min-width:1100px){
      .container{max-width:1260px}
      .cards{grid-template-columns:repeat(3, minmax(0,1fr))}
    }

    /* small utilities */
    .muted{color:var(--muted)}
    .pill{display:inline-block; padding:6px 10px; border-radius:999px; background:rgba(255,255,255,0.03); font-weight:600}
    .tag{font-size:12px; padding:6px 8px; border-radius:8px; background:rgba(255,255,255,0.02)}

    /* subtle hover */
    a:hover, button:hover{transform:translateY(-1px)}
    .teacher:hover{box-shadow:0 10px 30px rgba(2,6,23,0.6)}

  
    /* Carousel */
    .carousel{
      margin: 10px 0 10px 0;
    position: relative;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 8px 30px rgba(2, 6, 23, 0.6);
    }
    .carousel-wrap{position:relative; overflow:hidden; border-radius:18px; background:var(--card)}
    .carousel-track{display:flex;  transition:transform .5s ease}
    .slide{width:100%; flex:0 0 100%; position:relative}
    .slide img{width:100%; height:260px; object-fit:contain; background:#fff}
    .slide-caption{width:33%; color:#000000; background:#FFFFFF; position:absolute; left:16px; right:16px; bottom:16px;  backdrop-filter: blur(6px); padding:12px 14px; border-radius:12px}
    .slide-caption h3{margin:0 0 4px 0; font-size:18px}
    .slide-caption p{margin:0; font-size:14px; color:var(--muted)}

    .carousel input{display:none}
    #c1:checked ~ .carousel-wrap .carousel-track{transform:translateX(0)}
    #c2:checked ~ .carousel-wrap .carousel-track{transform:translateX(-100%)}
    #c3:checked ~ .carousel-wrap .carousel-track{transform:translateX(-200%)}

    .carousel-nav{display:flex; gap:8px; justify-content:center; margin-top:10px}
    .carousel-nav label{width:10px; height:10px; border-radius:50%; background:#000000; cursor:pointer}
    #c1:checked ~ .carousel-nav label[for="c1"],
    #c2:checked ~ .carousel-nav label[for="c2"],
    #c3:checked ~ .carousel-nav label[for="c3"]{background:linear-gradient(90deg,var(--accent),var(--accent-2))}

    .teacher-card{
      background: #92d4ecff; padding:14px; border-radius:12px; margin-bottom:12px; border:1px solid rgba(255,255,255,0.05);
    }

    @media(min-width:820px){
      .slide img{height:320px}
    }

    /* Auth Box */
    .auth-wrap{min-height:calc(100vh - 160px); display:flex; align-items:center; justify-content:center}
    .auth-card{width:100%; max-width:420px; background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); padding:26px; border-radius:20px; box-shadow:0 10px 40px rgba(2,6,23,.7)}

    .tabs{display:grid; grid-template-columns:1fr 1fr; margin-bottom:18px; background:rgba(255,255,255,0.04); border-radius:12px; overflow:hidden}
    .tabs label{text-align:center; padding:12px; font-weight:700; cursor:pointer; color:var(--muted)}

    input[type="radio"]{display:none}
    #login:checked ~ .tabs label[for="login"],
    #register:checked ~ .tabs label[for="register"]{background:linear-gradient(90deg,var(--accent),var(--accent-2)); color:#061025}

    .form{display:none}
    #login:checked ~ .form-login{display:block}
    #register:checked ~ .form-register{display:block}

    .form h2{margin:0 0 14px 0}
    .field{display:flex; flex-direction:column; gap:6px; margin-bottom:14px}
    .field label{font-size:13px; color:var(--muted)}
    .field input,select{padding:12px 14px; border-radius:12px; border:1px solid rgba(255,255,255,0.05); background:transparent; color:inherit}

    .btn{display:inline-flex; align-items:center; justify-content:center; padding:12px 16px; border-radius:12px; font-weight:700; border:none}
    .btn-primary{background:linear-gradient(90deg,var(--accent),var(--accent-2)); color:#061025}
    .btn-ghost{background:transparent; border:1px solid rgba(255,255,255,0.08); color:var(--muted)}

    .auth-footer{margin-top:12px; font-size:13px; color:var(--muted); text-align:center}

    @media(min-width:820px){
      .auth-card{padding:32px}
    }

    .carousel-wrapper {
      width: min(1000px, 95%);
      max-width: 1000px;
      background: white;
      padding: 18px;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(20,30,60,0.08);
    }

    /* Swiper yüksekliği */
    .swiper {
      width: 100% !important;
      max-width: 100%;
    }

    .swiper-wrapper {
      width: 100%;
    }

    .swiper-slide {
      width: 100% !important;
    }

    .slide-img {
      width: 100%;
      height: auto;
      object-fit: cover;
      display: block;
    }


    /* Başlık katmanı örneği */
    .slide-caption {
      position: absolute;
      left: 18px;
      bottom: 18px;
      background: rgba(0,0,0,0.45);
      color: #fff;
      padding: 10px 14px;
      border-radius: 8px;
      backdrop-filter: blur(4px);
      font-weight: 600;
      font-size: 16px;
    }

    /* Küçük ekran düzeni */
    @media (max-width: 600px) {
      
      .slide-caption { font-size: 14px; padding: 8px 10px; }
      .logo-div img{
        max-width:50%; display:block;
      }
    }

  </style>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">
<!-- Swiper CSS (CDN) -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@10/swiper-bundle.min.css" />

</head>
<body>
  <div class="container">
    <header>
    <div class="inner container">
      <div class="brand">
        <div class="logo">DK</div>
        <a href="{{ route('home') }}">
          <strong>Derse Koş</strong>
        </a>
        
      </div>
      <nav class="nav">
        @if(!auth('student')->check() && !auth('teacher')->check())
        <a href="{{ route('login.choose') }}" class="cta">Üye Ol / Giriş Yap</a>
        @else
          @if(auth('teacher')->check())
          <a href="{{ route('teacher.dashboard') }}">Hesabım</a>
          <a href="{{ route('teacher.logout') }}">Çıkış Yap</a>
          @endif
          @if(auth('student')->check())
          <a href="{{ route('student.dashboard') }}">Hesabım</a>
          <a href="{{ route('student.logout') }}">Çıkış Yap</a>
          @endif
        @endif
        
      </nav>
    </div>
  </header>
    <div style="height:80px"></div>