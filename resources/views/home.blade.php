@extends('layouts.main')


@section('content')
    <!-- logo area --> 
    <section class="hero-card logo-area" style="margin:0;">
      <div class="container text-center" style="display:flex; flex-direction:column; justify-content:center; align-items:center; padding:0">
        <div class="row">
          <div class="col-12 col-md-3 logo-div">
            <img src="{{asset('assets/img/dersekos.jpg')}}" alt="DerseKos Logo" >
          </div>
          <div class="col-12 col-md-9">
             <!-- Swiper -->
            <div class="carousel-wrapper">

              <!-- Swiper -->
              <div class="swiper">
                <div class="swiper-wrapper">
                  <!-- slide 1 -->
                  <div class="swiper-slide">
                    <a href="https://ankarayayincilik.com.tr/">
                      <img class="slide-img" src="{{asset('assets/img/ankara-1.jpg')}}" alt="Ankara Yayınları 1" loading="lazy">
                    </a>
                  </div>

                  <!-- slide 3 -->
                  <div class="swiper-slide">
                    <a href="https://www.isemdijital.com/">
                      <img class="slide-img" src="{{asset('assets/img/isem-1.png')}}" alt="Online ve yüz yüze ders imkanları" loading="lazy">
                    </a>
                  </div>

                  <!-- slide 5 -->
                  <div class="swiper-slide">
                    <a href="https://www.matsevyayincilik.com/">
                      <img class="slide-img" src="{{asset('assets/img/matsev-1.png')}}" alt="Başarıya koşan öğrenciler" loading="lazy">
                    </a>
                  </div>
                  <!-- slide 6 -->
                  <div class="swiper-slide">
                    <a href="https://www.modelegitim.com/">
                      <img class="slide-img" src="{{asset('assets/img/model-1.png')}}" alt="Başarıya koşan öğrenciler" loading="lazy">
                    </a>
                  </div>
                </div>

                <!-- Pagination (nokta) -->
                <div class="swiper-pagination"></div>

                <!-- Navigation -->
                <div class="swiper-button-prev" aria-label="Önceki"></div>
                <div class="swiper-button-next" aria-label="Sonraki"></div>

                <!-- Scrollbar (isteğe bağlı) -->
                <div class="swiper-scrollbar"></div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>

    <main>
      <div style="margin:44px 0; text-align:center"><h3>Haydi sen de derse koş!</h3>
      <p>Ücretsiz derslere kayıt fırsatını kaçırma.</p>
      </div>
       <section class="hero-card">
        <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/IkluolYw7KLIVFHhJyJQyQ?mode=hqrc">5. Sınıf WhatsApp Grubuna Katıl</a>
        <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/EfDqyyYWxBW7mtvI5X0kLr?mode=hqrc">6. Sınıf WhatsApp Grubuna Katıl</a>
        <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/K2uZXFY2tnHCbQUXqvMi1H?mode=hqrc">7. Sınıf WhatsApp Grubuna Katıl</a>
        <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/D1vMb1B7k6N9QY7vX665mV?mode=hqrc">8. Sınıf WhatsApp Grubuna Katıl</a>
        <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/FYZDrDOFJxe7aggofVkqiw?mode=hqrc">9. Sınıf WhatsApp Grubuna Katıl</a>
      </section>
      <section class="hero-card" aria-labelledby="hero-title">
        <div class="hero-left grid-20">
          <h3 id="hero-title" class="text-center">Size en uygun eğitmeni bulun. Hızlı, güvenilir, uygun fiyatlı</h3>
          <p class="muted text-center">Matematik, yabancı dil, sınav hazırlık veya hobi dersleri. Dersleri filtrele, eğitmen profillerini incele ve ilk dersini ayarla.</p>
        </div>
      </section>

     

      <!-- Eğitmen kartları -->
      <section id="teachers" class="hero-card" style="margin-top:18px; display:none">
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
      <section id="features" class="hero-card text-center" style="margin-top:22px">
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


    <script src="https://unpkg.com/swiper@10/swiper-bundle.min.js"></script>

    <script>
    // Swiper başlatma
    const swiper = new Swiper('.swiper', {
      // Genel ayarlar
      loop: true,                // sonsuz döngü
      slidesPerView: 1,          // aynı anda görünen slayt sayısı
      spaceBetween: 12,          // slaytlar arası boşluk (px)
      grabCursor: true,          // fareyle çekme imleci
      centeredSlides: true,      // kaydırma ortalansın
      preloadImages: false,      // lazy kullanmak için false
      lazy: {
        loadOnTransitionStart: true,
        loadPrevNext: true,
      },

      // Dokunmatik duyarlılığı (opsiyonel)
      touchRatio: 1,
      touchAngle: 45,
      simulateTouch: true,

      // Erişilebilirlik & klavye
      keyboard: { enabled: true, onlyInViewport: true },
      a11y: { enabled: true },

      // Otomatik oynatma
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },

      // Pagination (nokta)
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },

      // Navigation (oklar)
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      // Scrollbar (isteğe bağlı)
      scrollbar: {
        el: '.swiper-scrollbar',
        hide: false,
      },

      // Responsive davranış (örnek)
      breakpoints: {
        800: {
          slidesPerView: 1,
          spaceBetween: 16
        },
        1200: {
          slidesPerView: 1,
          spaceBetween: 18
        }
      },
    });
  </script>

@endsection


