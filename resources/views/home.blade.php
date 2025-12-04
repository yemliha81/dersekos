@extends('layouts.main')


@section('content')

    <!-- Amaç & Carousel -->
    <section class="carousel" aria-label="Platformun amacı">
      <input type="radio" name="carousel" id="c1" checked>
      <input type="radio" name="carousel" id="c2">
      <input type="radio" name="carousel" id="c3">

      <div class="carousel-wrap">
        <div class="carousel-track">
          <!-- Aynı görsel 3 slaytta kullanıldı. İstersen farklı görseller ekleyebilirsin. -->
          <div class="slide">
            <img src="{{asset('assets/img/dersekos.jpg')}}" alt="Öğrencileri ve eğitmenleri buluşturan DerseKos platformu">
            <div class="slide-caption">
              <h3>Öğrenci & Eğitmeni Buluşturur</h3>
              <p>DerseKos, doğru eğitmeni saniyeler içinde bulmanızı sağlar.</p>
            </div>
          </div>
          <div class="slide">
            <img src="{{asset('assets/img/dersekos.jpg')}}" alt="Online ve yüz yüze ders imkanları">
            <div class="slide-caption">
              <h3>Online & Yüz Yüze Dersler</h3>
              <p>İster evden, ister birebir ders modeliyle öğren.</p>
            </div>
          </div>
          <div class="slide">
            <img src="{{asset('assets/img/dersekos.jpg')}}" alt="Başarıya koşan öğrenciler">
            <div class="slide-caption">
              <h3>Başarıya Giden Yol</h3>
              <p>Hedeflerine ulaşman için sana özel ders planları.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-nav">
        <label for="c1" aria-label="1. slayt"></label>
        <label for="c2" aria-label="2. slayt"></label>
        <label for="c3" aria-label="3. slayt"></label>
      </div>
    </section>

    <main>
      <section class="hero-card" aria-labelledby="hero-title">
        <div class="hero-left grid-20">
          <h2 id="hero-title">Size en uygun eğitmeni bulun. Hızlı, güvenilir, uygun fiyatlı</h2>
          <p class="muted">Matematik, yabancı dil, sınav hazırlık veya hobi dersleri. Dersleri filtrele, eğitmen profillerini incele ve ilk dersini ayarla.</p>
        </div>

        
      </section>

      <!-- Eğitmen kartları -->
      <section id="teachers" class="hero-card" style="margin-top:18px">
        <h2 style="margin:0 0 12px 0">Öne çıkan eğitmenler</h2>
        <div class="cards">
          <article class="teacher" tabindex="0">
            <div class="avatar">AH</div>
            <div class="meta">
              <div style="display:flex; gap:8px; align-items:center"><strong>Ali Hoca</strong><span class="tag">Matematik</span></div>
              <small class="muted">18 yıllık deneyim • Online & yüz yüze</small>
              <div style="margin-top:8px; display:flex; gap:8px; align-items:center">
                <span class="pill">İlk ders %25 indirim</span>
                <button class="btn btn-primary" style="padding:8px 12px; font-weight:700">Randevu Al</button>
              </div>
            </div>
          </article>

          <article class="teacher" tabindex="0">
            <div class="avatar">EM</div>
            <div class="meta">
              <div style="display:flex; gap:8px; align-items:center"><strong>Elif M.</strong><span class="tag">İngilizce</span></div>
              <small class="muted">Yurtdışı deneyimi • Konuşma odaklı</small>
              <div style="margin-top:8px; display:flex; gap:8px; align-items:center">
                <span class="pill">Öğrenci dostu saatler</span>
                <button class="btn btn-primary" style="padding:8px 12px; font-weight:700">Ders Al</button>
              </div>
            </div>
          </article>

          <article class="teacher" tabindex="0">
            <div class="avatar">YK</div>
            <div class="meta">
              <div style="display:flex; gap:8px; align-items:center"><strong>Yusuf K.</strong><span class="tag">YKS Danışmanlığı</span></div>
              <small class="muted">Sınav stratejileri ve bireysel planlama</small>
              <div style="margin-top:8px; display:flex; gap:8px; align-items:center">
                <span class="pill">Paket dersler</span>
                <button class="btn btn-primary" style="padding:8px 12px; font-weight:700">İncele</button>
              </div>
            </div>
          </article>

        </div>
      </section>

      <!-- Özellikler -->
      <section id="features" class="hero-card" style="margin-top:22px">
        <h2 style="margin:0 0 12px 0">Platform özellikleri</h2>
        <div class="features">
          <div class="feature">
            <strong>Güvenli ödeme</strong>
            <p class="muted" style="margin:8px 0 0 0">Kredi kartı, havale ve cüzdan ile hızlı ödeme. Ders sonrası puanlama ve iade politikası.</p>
          </div>
          <div class="feature">
            <strong>Canlı ders arayüzü</strong>
            <p class="muted" style="margin:8px 0 0 0">Ekran paylaşımı, beyaz tahta, kayıt ve ders materyali paylaşımı.</p>
          </div>
          <div class="feature">
            <strong>Özelleştirilebilir program</strong>
            <p class="muted" style="margin:8px 0 0 0">Saatlik, paket veya abonelik tabanlı ders planları.</p>
          </div>
        </div>
      </section>


    </main>

@endsection


