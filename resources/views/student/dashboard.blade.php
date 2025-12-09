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

        <section class="hero-card mb-50 grid-3">
            <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/IkluolYw7KLIVFHhJyJQyQ?mode=hqrc">5. Sınıf WhatsApp Grubuna Katıl</a>
            <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/EfDqyyYWxBW7mtvI5X0kLr?mode=hqrc">6. Sınıf WhatsApp Grubuna Katıl</a>
            <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/K2uZXFY2tnHCbQUXqvMi1H?mode=hqrc">7. Sınıf WhatsApp Grubuna Katıl</a>
            <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/D1vMb1B7k6N9QY7vX665mV?mode=hqrc">8. Sınıf WhatsApp Grubuna Katıl</a>
            <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/FYZDrDOFJxe7aggofVkqiw?mode=hqrc">9. Sınıf WhatsApp Grubuna Katıl</a>
        </section>

        <section class="dashboard-cards">
            <div class="feature">
                <h3>Derslerim</h3>
                <p>Aktif ve kayıtlı derslerini görüntüle.</p>
                @foreach($myLessons as $lesson)
                    @if($lesson->end > now())
                        <div class="lesson-card">
                            <b>{{ $lesson->title }}</b>
                            <p><b>Tarih - Saat:</b> {{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }} - {{ date('H:i', strtotime($lesson->end)) }}</p>
                            
                            <p><b>Eğitmen:</b> Eğitmen: {{ $lesson->teacher->name }} </p>
                            @if($lesson->meet_url != null)
                                @if($lesson->start <= now() && $lesson->end >= now())
                                    <a target="_blank" href="{{ $lesson->meet_url }}" target="_blank" class="btn btn-success">Derse Katıl</a>
                                @else
                                    <div class="alert alert-info">Ders saati: {{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }}</div>
                                @endif
                            @else
                                <div class="alert alert-warning">Ders bağlantısı henüz oluşturulmamış.</div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
            <!-- Ücretsiz Dersler --> 
            <div class="feature">
                <h3>Ücretsiz Dersler</h3>
                <p>Ücretsiz derslere katıl ve öğrenmeye başla.</p>
                <div class="lessons">
                    @foreach($lessons as $lesson)
                    @if($lesson->end > now())
                        <div class="{{ $lesson->is_free ? 'lesson-card' : 'paid-lesson-card' }}">
                            <b>{{ $lesson->title }}</b>
                            <p>Başlangıç:{{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }}</p>
                            <p>Bitiş:{{ date('d.m.Y', strtotime($lesson->end)) }} {{ date('H:i', strtotime($lesson->end)) }}</p>
                            <p>Eğitmen: {{ $lesson->teacher->name }}</p>
                            @if(!$lesson->is_free)
                            <div>
                                <p>Ücret: <span class="price">250</span> ₺</p>
                                <a href="javascript:;" class="btn btn-primary join-paid-lesson-btn" data-lesson-title="{{ $lesson->title }}" data-lesson-price="250" data-lesson-id="{{ $lesson->id }}">Derse Kayıt ol</a>
                            </div>
                            @else
                            <div>
                                <a href="javascript:;" class="btn btn-primary join-lesson-btn" data-lesson-id="{{ $lesson->id }}">Derse Kayıt ol</a>
                                <div>
                                    {{count(array_filter(explode(',', $lesson->attendees)))}} öğrenci kayıtlı
                                </div>
                            </div>
                            @endif
                            
                        </div>
                    @endif
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

        <!-- paid lesson modal -->
        <div class="modal" tabindex="-1" role="dialog" id="paidLessonModal" style="display:none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ücretli Derse Kayıt Ol</h5>
                
              </div>
              <div class="modal-body">
                <p class="lessonTitle"></p>
                <p>Bu derse kayıt olmak için <span id="lessonPrice"></span> ₺ ödemeniz gerekmektedir.</p>
                <p>Ödemeyi aşağıdaki IBAN hesabına yaptıktan sonra ders kaydınız tamamlanacaktır.</p>
                <p class="alert alert-info">Lütfen ödemeyi yaparken açıklama kısmına, öğrenci Adı - Soyadı ve Ders kodu olarak "00<span id="lessonId"></span>" yazmayı unutmayınız.</p>
                <p>IBAN: TR620006701000000098498893 </p>
                <p>Banka Adı: Yapı Kredi Bankası</p>
                <p>Alıcı: Evren Demirdelen</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('.modal').hide();">Kapat</button>
                
              </div>
            </div>
          </div>
        </div>

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

        $('.join-paid-lesson-btn').on('click', function() {
            var lessonId = $(this).data('lesson-id');
            // Burada ücretli derse kayıt işlemi gerçekleştirilebilir
            
            // Ücretli derse kayıt işlemi için gerekli AJAX çağrısı veya yönlendirme yapılabilir
            $('.lessonTitle').text($(this).data('lesson-title'));
            $('#lessonPrice').text($(this).data('lesson-price'));
            $('#lessonId').text($(this).data('lesson-id'));
            $('#payButton').data('lesson-id', lessonId);
            $('#paidLessonModal').show();
        });



    });
</script>

@endsection

