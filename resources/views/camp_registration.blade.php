@extends('layouts.main')


@section('content')
<style>
  .camps{
    display: flex;
    flex-direction: column;
    gap: 40px;
  }
  .camp-detail {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    border: 1px solid #dddddd;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 10px 10px 10px #ddd;
  }
  .camp-detail img {
    width: 240px;
    height: auto;
    max-width:unset
  }
  .grids-2{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 15px;
  }
</style>
 <!-- Ana İçerik -->
  <main class="auth-wrap">
   


    <div class="camps">
      <div class="camp-detail">
        <div>
          <img src="{{asset('assets/img/fatih-korkmaz-kamp-8-1.jpg?v=123')}}"  width="200" alt="">
        </div>
        <div>
          
          <div class="grids-2">
            
            <div>
              <b>Fatih Korkmaz, 8. Sınıf Ara Tatil Matematik Kampı</b> <br><br><br>
              1. Gün 23 Ocak: Çarpanlar ve Katlar, EBOB-EKOK <br>

              2. Gün 25 Ocak: Üslü İfadeler 1, Üslü ifadeler 2 <br>

              3. Gün 26 Ocak: Ondalık Gösterimleri Çözümleme- Bilimsel Gösterim, Kareköklü İfadeler 1 <br>

              4. Gün 27 Ocak: Kareköklü İfadeler 2, Çizgi- Sütun- Daire Grafiği <br>

              5. Gün 29 Ocak, Olasılık, 2025 LGS Çıkmış Soru Çözümü <br>
              
              Kamp süresi 5 gün, her gün 2 ders olmak üzere toplam 10 ders yapılacaktır. <br>
              10 ders için Kamp ücreti 2000 TL’dir. <br>
              

            </div>
            <div>
              <div>
                <b>Kamp Kayıt Formu</b>
              </div>
              <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdQZewZHcRseUM9vOaCsOvuxADXmhMm07cv4UPICZGOQIWiRg/viewform?embedded=true" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>
            </div>
          </div>
        </div>
      </div>

      <div class="camp-detail">
        <div>
          <img src="{{asset('assets/img/kemal-oltulu-kamp.jpg')}}" alt="">
        </div>
        <div>
          
         <div class="grids-2">
            
            <div>
              <b>Kemal Oltulu, 8. Sınıf Ara Tatil Matematik Kampı</b> <br><br>
                28 Saat yoğun ders programı <br><br>
                Konu Tekrarı + Soru Çözümü <br><br>
                Her öğrenciye mentörlük desteği <br><br>
                Tüm Kamp Sadece 3000 TL
            </div>
            <div>
              <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdgyxC-icz91qqvHQV8hzS4zdsl8A6otHqjhfd_Y-YMRg0h_A/viewform?embedded=true" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>
            </div>
          </div>
        </div>
      </div>

      <div class="camp-detail">
        <div>
          <img src="{{asset('assets/img/ayse-gul-turkce-kamp.jpg')}}" alt="">
        </div>
        <div class="grids-2">
            
            <div>
              <b>Ayşe Gül, 8. Sınıf Ara Tatil Türkçe Paragraf ve Dilbilgisi Kampı</b>
                <div><br><br>
                  21 Ocak - Cümlede, Paragrafta, Sözcükte anlam <br>
                  22 Ocak - Metin Türleri ve sanatlar, Fiilimsiler <br>
                  23 Ocak - Fiilde Çatı, Cümle Ögeleri, Pekiştirme<br>
                  24 Ocak - Cümle Türleri, Yazım kuralları, Uygulama <br>
                  25 Ocak - Noktalama, Noktalama (Uygulama)i Anlatım Bozukluğu<br>
                  15 Dersten oluşan kamp programı <br>
                  Kamp Ücreti: 1500 TL
                </div>
            </div>
            <div>
              <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSerJJN6EJmyYQrA-Cp0grqWCbhXmO_TX6PONYChPc-PpFzSQA/viewform?embedded=true" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>
            </div>
          </div>
      </div>

      <div class="camp-detail">
        <div>
          <img src="{{asset('assets/img/guzide-arslanhan-turkce-8-sinif-kamp.jpg')}}" alt="">
        </div>
        <div class="grids-2">
            
            <div>
              <b>Güzide Arslanhan, 8. Sınıf Ara Tatil Türkçe Kampı</b> <br><br>
                 <div>
                  21 OCAK - 29 OCAK tarihleri arasında <br>

                  8. SINIFLAR İÇİN LGS HAZIRLIK KAMPI <br>
                  LGS KONULARININ YARISINI BİTİRİYORUZ <br>

                  YENİ NESİL SORULAR VE  <br>
                  SORU ÇÖZÜM TAKTİKLERİYLE BİRLİKTE <br>

                  TOPLAM 10 DERS SAATİ <br>

                  KAMP ÜCRETİ 1500 TL <br>

                </div>
            </div>
            <div>
              <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdKvvBcMKGp7vlHuyT0wKET1FMJRYStUyIjyOrtXNhsJQfMfQ/viewform?embedded=true" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Yükleniyor…</iframe>
            </div>
          
        </div>
      </div>

      <!--<div class="camp-detail">
        <div>
          <img src="{{asset('assets/img/guzide-arslanhan-turkce-5-6-7-sinif-kamp.jpg')}}" alt="">
        </div>
        <div>
          <h3>Güzide Arslanhan, 5-6-7. Sınıf Ara Tatil Türkçe Kampı</h3>
          <p></p>
          <div class="camp-register-btn">
            <a href="" class="btn btn-primary btn-lg">Kampa Kayıt Ol</a>
          </div>
        </div>
      </div>-->
    </div>



  </main>

@endsection