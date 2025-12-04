@extends('layouts.main')


@section('content')

    

    <main>
      
        <section class="hero-card hero" aria-labelledby="hero-title">
            <div class="hero-left">
                <div class="pill">Öğrenci Paneli</div>
                <h1 id="hero-title">Hoşgeldin, {{ auth('student')->user()->name }}!</h1>
                <p class="muted">Burada derslerini yönetebilir, eğitmenlerinle iletişim kurabilir ve öğrenme yolculuğuna devam edebilirsin.</p>
            </div>
        </section>

        <section class="dashboard-cards">
            <div class="feature">
                <h3>Derslerim</h3>
                <p>Aktif ve geçmiş derslerini görüntüle.</p>
            </div>
            <div class="feature">
                <h3>Eğitmenlerim</h3>
                <p>Eğitmen profillerini incele ve iletişim kur.</p>
            </div>
            <div class="feature">
                <h3>Ödeme Geçmişi</h3>
                <p>Tüm ödeme işlemlerini takip et.</p>
            </div>
        </section>

    </main>

@endsection


