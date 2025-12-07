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
            <!-- Ücretsiz Dersler --> 
            <div class="feature">
                <h3>Ücretsiz Dersler</h3>
                <p>Ücretsiz derslere katıl ve öğrenmeye başla.</p>
                <div class="lessons">
                    @foreach($freeLessons as $lesson)
                        <div class="lesson-card">
                            <h4>{{ $lesson->title }}</h4>
                            <p>Başlangıç:{{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }}</p>
                            <p>Bitiş:{{ date('d.m.Y', strtotime($lesson->end)) }} {{ date('H:i', strtotime($lesson->end)) }}</p>
                            <p>Eğitmen: {{ $lesson->teacher->name }}</p>
                            <a href="javascript:;" class="btn btn-primary join-lesson-btn" data-lesson-id="{{ $lesson->id }}">Derse Kayıt ol</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="feature">
                <h3>Eğitmenlerim</h3>
                <p>Eğitmen profillerini incele ve iletişim kur.</p>
                <div class="teachers">
                    @foreach($teachers as $teacher)
                        <div class="teacher-card">
                            <h4>{{ $teacher->name }}</h4>
                            <p>Branş: {{ ucfirst($teacher->branch ) }}</p>
                            <a href="{{ route('teacher.profile', ['id' => $teacher->id]) }}" class="btn btn-primary">Profili İncele</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--<div class="feature">
                <h3>Ödeme Geçmişi</h3>
                <p>Tüm ödeme işlemlerini takip et.</p>
            </div>-->
        </section>

    </main>

@endsection


@section('scripts')
<script>
    // Öğrenci paneli için özel JavaScript kodları buraya eklenebilir
    $(document).ready(function() {
        
        $('.join-lesson-btn').on('click', function() {
            var lessonId = $(this).data('lesson-id');
            // Burada derse katılma işlemi gerçekleştirilebilir
            //alert('Derse katılma işlemi için tıklanan ders ID: ' + lessonId);
            $.ajax({
                url: '/student/join-free-lesson/' + lessonId, // Ücretsiz derse katılma için uygun rota
                method: 'POST',
                data: {
                    lesson_id: lessonId,
                    _token: '{{ csrf_token() }}' // CSRF token eklenmeli
                },
                success: function(response) {
                    alert('Derse başarıyla kayıt oldunuz!');
                },
                error: function(xhr) {
                    alert('Derse kayıt olurken bir hata oluştu. Lütfen tekrar deneyin.');
                }
            });
        });



    });
</script>

@endsection

