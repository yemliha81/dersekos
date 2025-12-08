@extends('layouts.main')


@section('content')

<!-- HERO / PROFILE HEADER -->
<div class="profile-cover py-5">
  <div class="container">
    <div class="row g-3 align-items-center">
      <div class="col-md-3 text-center text-md-start">
        <img src="" alt="Öğretmen foto" class="avatar">
      </div>

      <div class="col-md-6">
        <h1 class="h3 mb-1">{{$teacher->name}}</h1>
        <p class="mb-1 text-muted">{{ucwords(str_replace('_', ' ', $teacher->branch))}} Eğitmeni | Online ve Yüz yüze</p>

        <div class="d-flex flex-wrap gap-2 align-items-center mt-2">
          <div class="badge-subject">{{ucwords(str_replace('_', ' ', $teacher->branch))}}</div>

          <div class="ms-3 d-flex align-items-center">
            <i class="bi bi-star-fill review-star me-1"></i>
            <span class="fw-bold">4.9</span>
            <small class="text-muted ms-2">(124 değerlendirme)</small>
          </div>
        </div>

        <div class="mt-3 d-flex gap-3">
          <!--<button class="btn book-btn text-white px-4" data-bs-toggle="modal" data-bs-target="#bookModal"><i class="bi bi-calendar-check me-2"></i>Ders Al</button>
          <a href="#contact" class="btn btn-outline-secondary"><i class="bi bi-chat-dots me-2"></i>Mesaj Gönder</a>-->
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-rounded p-3 shadow-sm">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
              <div class="text-muted">Saatlik Ücret</div>
              <div class="h5 fw-bold">₺250</div>
            </div>
            <div class="text-end">
              <small class="text-muted">Deneyim</small>
              <div class="fw-bold">8 yıl</div>
            </div>
          </div>
          <hr>
          <div class="d-flex gap-2 flex-wrap">
            <small class="text-muted"><i class="bi bi-clock"></i> 45dk - 90dk</small>
            <small class="text-muted"><i class="bi bi-globe"></i> Online</small>
            <small class="text-muted"><i class="bi bi-geo-alt"></i> İstanbul, Türkiye</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MAIN -->
<main class="container my-5">
  <div class="row g-4">
    <!-- LEFT: ABOUT / QUALS / COURSES -->
    <div class="col-lg-8">
      <section id="about" class="mb-4">
        <div class="card card-rounded p-4 shadow-sm">
          <h3 class="h5">Hakkında</h3>
          <p class="text-muted">Merhaba! Ben Dr. Ayşe — Boğaziçi Üniversitesi Matematik Bölümü mezunu, yüksek lisans ve doktora sahip.
            Öğrencilerin temelden anlayıp özgüven kazanmasına odaklanan, ölçülebilir ilerleme sağlayan ders planları ile çalışıyorum.
            KPSS, TYT/AYT ve üniversite düzeyi fizik dersleri veriyorum. Dersler hem online (Zoom) hem de yüz yüze yapılabilir.</p>

          <div class="row mt-3">
            <div class="col-6 col-md-3 text-center">
              <div class="stat-num">%92</div>
              <small class="text-muted d-block">Başarı Oranı</small>
            </div>
            <div class="col-6 col-md-3 text-center">
              <div class="stat-num">124</div>
              <small class="text-muted d-block">Ders</small>
            </div>
            <div class="col-6 col-md-3 text-center">
              <div class="stat-num">8</div>
              <small class="text-muted d-block">Yıl Deneyim</small>
            </div>
            <div class="col-6 col-md-3 text-center">
              <div class="stat-num">4.9</div>
              <small class="text-muted d-block">Ortalama Puan</small>
            </div>
          </div>
        </div>
      </section>

      <section id="qualifications" class="mb-4">
        <div class="card card-rounded p-4 shadow-sm">
          <h3 class="h5">Eğitim & Sertifikalar</h3>
          <ul class="list-unstyled mb-0">
            <li>• Doktora, Uygulamalı Matematik — Boğaziçi Üniversitesi</li>
            <li>• Yüksek Lisans, Matematik Eğitimi — İstanbul Üniversitesi</li>
            <li>• Sertifika: Uzaktan Eğitim Tasarımı (2021)</li>
            <li>• TOEFL: 105</li>
          </ul>
        </div>
      </section>

      <section id="courses" class="mb-4">
        <div class="card card-rounded p-4 shadow-sm">
          <h3 class="h5">Verilen Dersler & Paketler</h3>

          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 border rounded">
                <h6 class="mb-1">TYT Matematik - Birebir</h6>
                <p class="mb-1 text-muted small">Saatlik: ₺200 — Paket: 10 ders</p>
                <a class="small" href="#">Detayları gör</a>
              </div>
            </div>

            <div class="col-md-6">
              <div class="p-3 border rounded">
                <h6 class="mb-1">Universite Fizik - Hazırlık</h6>
                <p class="mb-1 text-muted small">Saatlik: ₺300 — Deneme dersi mevcut</p>
                <a class="small" href="#">Detayları gör</a>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- SCHEDULE -->
      <section id="schedule" class="mb-4">
        <div class="card card-rounded p-4 shadow-sm">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="h5 mb-0">Takvim & Uygunluk</h3>
            <small class="text-muted">(Güncellenme: 2 Aralık 2025)</small>
          </div>

          <div class="mt-3 table-responsive">
            <table class="table table-borderless align-middle">
              <thead>
                <tr class="text-muted small"><th>Gün</th><th>09:00 - 12:00</th><th>13:00 - 17:00</th><th>18:00 - 21:00</th></tr>
              </thead>
              <tbody>
                <tr><td>Pazartesi</td><td><span class="badge bg-success">Uygun</span></td><td><span class="badge bg-secondary">Dolu</span></td><td><span class="badge bg-success">Uygun</span></td></tr>
                <tr><td>Salı</td><td><span class="badge bg-secondary">Dolu</span></td><td><span class="badge bg-success">Uygun</span></td><td><span class="badge bg-success">Uygun</span></td></tr>
                <tr><td>Çarşamba</td><td><span class="badge bg-success">Uygun</span></td><td><span class="badge bg-secondary">Dolu</span></td><td><span class="badge bg-success">Uygun</span></td></tr>
                <tr><td>Perşembe</td><td><span class="badge bg-success">Uygun</span></td><td><span class="badge bg-success">Uygun</span></td><td><span class="badge bg-secondary">Dolu</span></td></tr>
                <tr><td>Cuma</td><td><span class="badge bg-success">Uygun</span></td><td><span class="badge bg-success">Uygun</span></td><td><span class="badge bg-secondary">Dolu</span></td></tr>
                <tr><td>Cumartesi</td><td><span class="badge bg-secondary">Dolu</span></td><td><span class="badge bg-secondary">Dolu</span></td><td><span class="badge bg-success">Uygun</span></td></tr>
                <tr><td>Pazar</td><td colspan="3"><span class="badge bg-success">Gün boyu müsait</span></td></tr>
              </tbody>
            </table>
          </div>

        </div>
      </section>

      <!-- REVIEWS -->
      <section id="reviews" class="mb-4">
        <div class="card card-rounded p-4 shadow-sm">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="h5 mb-0">Öğrenci Yorumları</h3>
            <div class="text-end">
              <div class="fw-bold">4.9 <small class="text-muted">/ 5</small></div>
              <small class="text-muted">124 değerlendirme</small>
            </div>
          </div>

          <div class="mb-3">
            <!-- Review 1 -->
            <div class="d-flex gap-3 mb-3">
              <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" alt="" class="rounded-circle" width="48" height="48">
              <div>
                <div class="fw-bold">Mehmet K.</div>
                <div class="small text-muted">"Kısa sürede eksiklerim kapandı, sınavda netlerim arttı."</div>
                <div class="small mt-1"> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-fill review-star"></i></div>
              </div>
            </div>

            <!-- Review 2 -->
            <div class="d-flex gap-3">
              <img src="https://images.unsplash.com/photo-1545996124-1f5f2d9d3b2e?q=80&w=200&auto=format&fit=crop&ixlib=rb-4.0.3&s=placeholder" alt="" class="rounded-circle" width="48" height="48">
              <div>
                <div class="fw-bold">Elif A.</div>
                <div class="small text-muted">"Dersler interaktif geçiyor; hızlı geri dönüş sağlıyor."</div>
                <div class="small mt-1"> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-fill review-star"></i> <i class="bi bi-star-half review-star"></i></div>
              </div>
            </div>

          </div>

          <a href="#" class="small">Tüm yorumları gör</a>

        </div>
      </section>

    </div>

    <!-- RIGHT: CONTACT CARD / VIDEO / SOCIAL -->
    <aside class="col-lg-4">
      <div class="card card-rounded p-3 shadow-sm mb-3">
        <h5 class="mb-2">Hızlı İletişim</h5>
        <p class="small text-muted mb-3">Ders almak veya deneme dersi ayarlamak için mesaj gönderin.</p>

        <form id="contact" class="mb-2">
          <div class="mb-2">
            <input class="form-control" placeholder="Adınız" required>
          </div>
          <div class="mb-2">
            <input class="form-control" placeholder="E-posta veya telefon" required>
          </div>
          <div class="mb-2">
            <textarea class="form-control" rows="3" placeholder="Mesajınız"></textarea>
          </div>
          <button class="btn btn-primary w-100">Mesaj Gönder</button>
        </form>

        <div class="d-flex justify-content-between small text-muted">
          <div><i class="bi bi-telephone"></i> +90 5xx xxx xx xx</div>
          <div><i class="bi bi-geo-alt"></i> İstanbul</div>
        </div>
      </div>

      <div class="card card-rounded p-3 shadow-sm mb-3">
        <h6 class="mb-2">Tanıtım Videosu</h6>
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Tanıtım" allowfullscreen></iframe>
        </div>
      </div>

      <div class="card card-rounded p-3 shadow-sm mb-3">
        <h6 class="mb-2">Sosyal</h6>
        <div class="d-flex gap-2">
          <a class="btn btn-outline-secondary btn-sm" href="#"><i class="bi bi-instagram"></i></a>
          <a class="btn btn-outline-secondary btn-sm" href="#"><i class="bi bi-linkedin"></i></a>
          <a class="btn btn-outline-secondary btn-sm" href="#"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

      <div class="card card-rounded p-3 shadow-sm">
        <h6 class="mb-2">Hızlı Paketler</h6>
        <div class="d-flex flex-column gap-2">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-semibold">10 Ders Paket</div>
              <small class="text-muted">+ 1 ücretsiz analiz</small>
            </div>
            <div class="fw-bold">₺1.800</div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="fw-semibold">5 Ders Paket</div>
              <small class="text-muted">Yoğun program</small>
            </div>
            <div class="fw-bold">₺950</div>
          </div>
        </div>
      </div>

    </aside>
  </div>
</main>

<!-- BOOKING MODAL -->
<div class="modal fade" id="bookModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ders Rezervasyonu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Tarih</label>
            <input type="date" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Saat</label>
            <input type="time" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Not (özellikler, hedefler...)</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
        <button class="btn book-btn text-white">Rezervasyonu Gönder</button>
      </div>
    </div>
  </div>
</div>

@endsection
