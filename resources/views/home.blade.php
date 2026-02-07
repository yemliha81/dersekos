@extends('layouts.main')


@section('content')
<main>
  <div class="">
        <section>
            <div class="row">
                <div class="col-12 text-center mb-50 mt-50 lead-text">
                    <h1 class="mb-20">Derse Koş'a Hoş geldiniz!</h1>
                    <p class="lead">
                      Derse Koş, ilköğretimden KPSS'ye kadar her seviyeden öğrenciye ücretsiz dersler,<br> uygun fiyatlı kamplar ve eğitici oyunlar sunan bir eğitim platformudur.
                    </p>
                </div>
            </div>
        </section>
        <section>
          <div class="row mb-50">
            <div class="top-image-areas">
              <div class="top-image-area ">
                 <img src="{{asset('assets/img/ogrenci-giris.png')}}"  alt="">
                 <div>
                  
                  <p><b>Öğrenci Girişi</b></p>
                  <p>Öğrenci olarak Derse Koş platformuna kayıt olun ve ücretsiz ders fırsatını kaçırmayın!</p>
                  <p class="text-right">
                    <a class="login-new-btn" href="{{ route('student.login') }}">Öğrenci Girişi</a>
                  </p>
                 </div>
              </div>
              <div class="top-image-area ">
                  <img src="{{asset('assets/img/ogretmen-giris.png')}}"  alt="">
                  <div>
                    <p><b>Eğitmen Girişi</b></p>
                    <p> Eğitmen olarak Derse Koş platformuna katılın ve geniş öğrenci kitlesine ulaşın!</p>
                    <p class="text-right">
                      <a class="login-new-btn"  href="{{ route('teacher.login') }}">Eğitmen Girişi</a>
                    </p>
                  </div>
              </div>
            </div>
          </div>
        </section>
        <section>
            <div class="row mb-50">
              
                <div class="top-info-boxes">
                  <div class="top-info-box">
                    <div class="top-info-box-icon">
                      <i class="bi bi-people-fill fs-1"></i>
                    </div>
                    <div class="top-info-box-content">
                      <div class="top-info-box-title"><b>Uzman Eğitmenler</b></div> 
                      <div class="top-info-box-subtitle">200'ün üzerinde eğitmen kadromuzla yanınızdayız.</div>
                    </div>
                  </div>
                  <div class="top-info-box">
                    <div class="top-info-box-icon">
                      <i class="bi bi-play-circle fs-1"></i>
                    </div>
                    <div class="top-info-box-content">
                      <div class="top-info-box-title"><b>Ücretsiz Dersler</b></div> 
                      <div class="top-info-box-subtitle">Her hafta, her sınıf seviyesinden ücretsiz ders fırsatı.</div>
                    </div>
                  </div>
                  <div class="top-info-box">
                    <div class="top-info-box-icon">
                      <i class="bi bi-pencil-square fs-1"></i>
                    </div>
                    <div class="top-info-box-content">
                      <div class="top-info-box-title"><b>Uygun Fiyatlı Kamplar</b></div> 
                      <div class="top-info-box-subtitle">Bütçenize uygun ve hedefe yönelik kamplarımıza kayıt olabilirsiniz.</div>
                    </div>
                  </div>

                  <div class="top-info-box">
                    <div class="top-info-box-icon">
                      <i class="bi bi-controller fs-1"></i>
                    </div>
                    <div class="top-info-box-content">
                      <div class="top-info-box-title"><b>Eğitici Oyunlar</b></div> 
                      <div class="top-info-box-subtitle">Her dersten eğitici oyunlarla eğlenirken öğrenin.</div>
                    </div>
                  </div>
                
          </div>
          
        </section>

        <!--<section>
          <div class="text-center mb-4"><h4><b>Öne Çıkan Kamp ve Etkinlikler</b></h4></div>
        </section>
        <section class="hero-card mb-50 camp-photos">
          
              <a target="_blank" class="" href="{{route('camp.registration')}}">
                <img  src="{{asset('assets/img/fatih-korkmaz-kamp-8-1.jpg?v=123')}}"  alt="Fatih Korkmaz Matematik Kampı" loading="lazy">
              </a>

              <a target="_blank" class="" href="{{route('camp.registration')}}">
                <img  src="{{asset('assets/img/kemal-oltulu-kamp.jpg')}}"  alt="Kemal Oltulu Matematik Kampı" loading="lazy">
              </a>

              <a target="_blank" class="" href="{{route('camp.registration')}}">
                <img  src="{{asset('assets/img/ayse-gul-turkce-kamp.jpg')}}"  alt="Ayşe Gül Türkçe Kampı" loading="lazy">
              </a>

              <a target="_blank" class="" href="{{route('camp.registration')}}">
                <img  src="{{asset('assets/img/guzide-arslanhan-turkce-8-sinif-kamp.jpg')}}"  alt="Güzide Arslanhan Türkçe Kampı 8. Sınıf" loading="lazy">
              </a>

              <a target="_blank" class="" href="{{route('camp.registration')}}">
                <img  src="{{asset('assets/img/8-sinif-lgs-kamp-fen-bilimleri.jpg')}}"  alt="8. Sınıf Fen bilimleri Kampı sınıf" loading="lazy">
              </a>

              
            
        </section>
        <section class="text-center mb-50">
          <a href="{{route('camp.registration')}}" class="btn btn-primary btn-lg">Tüm Kamp ve Etkinliklere Gözat</a>
        </section>-->

        
        <section class="hero-card mb-50 bg-purple text-white">
          <p class="text-center">
            Her gün daha da büyüyen eğitmen ve öğrenci topluluğumuza katılın.<br/> İster sınavlara hazırlanın, ister yeni beceriler öğrenin, 
            size en uygun eğitmeni bulun. 
          </p>
        </section>
    </div>
</main>

@endsection


