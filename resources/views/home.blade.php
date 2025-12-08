@extends('layouts.main')


@section('content')
    <!-- logo area --> 
    <section class="hero-card logo-area mb-50" >
      <div class="container text-center" style="display:flex; flex-direction:column; justify-content:center; align-items:center; padding:0">
        <div class="row">
          <div class="col-12 col-md-3 logo-div">
            <img src="{{asset('assets/img/dersekos.jpg')}}" alt="DerseKos Logo" >
          </div>
          <div class="col-12 col-md-9">
             <!-- Swiper -->
            <div class="carousel-wrapper no-overflow"  style="width:100% !important">
              <div class="swiper swiperA">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <a href="https://ankarayayincilik.com.tr/">
                        <img class="slide-img" src="{{asset('assets/img/tammat-1.png')}}" alt="Ankara Yayınları 1" loading="lazy">
                      </a>
                    </div>
                    <div class="swiper-slide">
                    <a href="https://ankarayayincilik.com.tr/">
                      <img class="slide-img" src="{{asset('assets/img/ankara-1.jpg')}}" alt="Ankara Yayınları 1" loading="lazy">
                    </a>
                  </div>
                  
                  <div class="swiper-slide">
                    <a href="https://www.isemdijital.com/">
                      <img class="slide-img" src="{{asset('assets/img/isem-1.png')}}" alt="Online ve yüz yüze ders imkanları" loading="lazy">
                    </a>
                  </div>

                  <div class="swiper-slide">
                    <a href="https://www.matsevyayincilik.com/">
                      <img class="slide-img" src="{{asset('assets/img/matsev-1.png')}}" alt="Başarıya koşan öğrenciler" loading="lazy">
                    </a>
                  </div>

                  <div class="swiper-slide">
                    <a href="https://www.modelegitim.com/">
                      <img class="slide-img" src="{{asset('assets/img/model-1.png')}}" alt="Başarıya koşan öğrenciler" loading="lazy">
                    </a>
                  </div>
                  <div class="swiper-slide">
                      <a href="https://ankarayayincilik.com.tr/">
                        <img class="slide-img" src="{{asset('assets/img/tammat-2.png')}}" alt="Ankara Yayınları 1" loading="lazy">
                      </a>
                    </div>
                  </div>

                  <!-- pagination + navigation (her slider için benzersiz class) -->
                  <div class="swiper-pagination pagerA"></div>
                  <div class="swiper-button-prev prevA" aria-label="Önceki"></div>
                  <div class="swiper-button-next nextA" aria-label="Sonraki"></div>
                </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>

    <section class="hero-card mb-50">
      <!-- 2. Carousel -->
       <div class="text-center"><b>Eğitmenlerimiz</b></div>
      <div class="carousel-wrapper no-overflow" style="width:100% !important; max-width:3000px">
      <div class="swiper swiperB">
        <div class="swiper-wrapper">
          @foreach($teachers as $teacher)
            <div class="swiper-slide">
              <div class="teacher-box" tabindex="0">
                  <div style=""><strong>{{ $teacher->name }} {{ $teacher->surname }}</strong></div>
                  <small class="muted">{{ ucwords(str_replace('_', ' ',   $teacher->branch)) }} </small>
                  <div style="margin-top:8px; display:flex; gap:8px; align-items:center">
                    <!--<a href="{{route('teacher.public.profile', ['id' => $teacher->id])}}" class="btn btn-primary" style="padding:8px 12px; font-weight:700">Profili İncele</a>-->
                  </div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="swiper-pagination pagerB"></div>
        <div class="swiper-button-prev prevB" aria-label="Önceki"></div>
        <div class="swiper-button-next nextB" aria-label="Sonraki"></div>
      </div>
      </div>
    </section>

    <main>
      <div style="margin:44px 0; text-align:center"><h3>Haydi sen de derse koş!</h3>
      <p>Ücretsiz derslere kayıt fırsatını kaçırma.</p>
      </div>
       @if(!auth('student')->user())
        <section class="hero-card mb-50">
        
          <a class="btn btn-success" href="{{ route('student.login') }}">Öğrenci WhatsApp Grubuna Katıl</a>
          
        </section>
      @endif
      <section class="hero-card mb-50" aria-labelledby="hero-title">
        <div class="hero-left grid-20">
          <h3 id="hero-title" class="text-center">Size en uygun eğitmeni bulun. Hızlı, güvenilir, uygun fiyatlı</h3>
          <p class="muted text-center">Matematik, yabancı dil, sınav hazırlık veya hobi dersleri. Dersleri filtrele, eğitmen profillerini incele ve ilk dersini ayarla.</p>
        </div>
      </section>

     

      

      <!-- Özellikler -->
      <section id="features" class="hero-card text-center mb-50" style="margin-top:22px">
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
     const swiperA = new Swiper('.swiperA', {
      loop: true,
      spaceBetween: 12,
      spaceAround: true,
      slidesPerView: 1,          // default (geniş ekran için)
      centeredSlides: false,
      observer: true,
      observeParents: true,
      preloadImages: false,
      lazy: { loadPrevNext: true },

     

      navigation: {
        nextEl: '.nextA',
        prevEl: '.prevA',
      },

      pagination: {
        el: '.pagerA',
        clickable: true,
      },

      a11y: { enabled: true },
    });


    
    const swiperB = new Swiper('.swiperB', {
      loop: true,
      spaceBetween: 16,
      spaceAround: 16,
      slidesPerView: 4,
      observer: true,
      observeParents: true,
      preloadImages: false,
      lazy: { loadPrevNext: true },

      // responsive breakpoints (mobilde 1 göster)
      breakpoints: {
        0:   { slidesPerView: 1, spaceBetween: 8 },
        576: { slidesPerView: 1, spaceBetween: 10 },
        768: { slidesPerView: 2, spaceBetween: 12 },
        1200:{ slidesPerView: 4, spaceBetween: 16 }
      },

      navigation: {
        nextEl: '.nextB',
        prevEl: '.prevB',
      },

      pagination: {
        el: '.pagerB',
        clickable: true,
      },

      a11y: { enabled: true },
    });
  </script>

@endsection


