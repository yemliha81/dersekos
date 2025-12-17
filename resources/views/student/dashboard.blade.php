@extends('layouts.main')


@section('content')

    

    <main>
      
        <section class="hero-card hero" aria-labelledby="hero-title">
            <div class="hero-left">
                <div class="pill"></div>
                <h3 id="hero-title">Hoşgeldin, {{ auth('student')->user()->name }}!</h3>
                <p class="muted">Burada derslerini yönetebilir, eğitmenlerinle iletişim kurabilir ve öğrenme yolculuğuna devam edebilirsin.</p>
            </div>
        </section>
         <section class="hero-card mb-50 grid-3">
            
            @if(auth('student')->user()->grade == '5')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/IkluolYw7KLIVFHhJyJQyQ?mode=hqrc">5. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '6')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/EfDqyyYWxBW7mtvI5X0kLr?mode=hqrc">6. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '7')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/K2uZXFY2tnHCbQUXqvMi1H?mode=hqrc">7. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '8')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/D1vMb1B7k6N9QY7vX665mV?mode=hqrc">8. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '9')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/FYZDrDOFJxe7aggofVkqiw?mode=hqrc">9. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '10')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/L97vpPBhlqt3dpfV4knbND?mode=hqrc">10. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '11')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/GHZ6XPSC9q1A0K5oeG26Pa?mode=hqrc">11. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '12')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/EeIJrSFzFObFen8WoLOd2Z?mode=hqrc">12. Sınıf WhatsApp Grubuna Katıl</a>
            @endif
            @if(auth('student')->user()->grade == '13')
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/EeIJrSFzFObFen8WoLOd2Z?mode=hqrc">KPSS WhatsApp Grubuna Katıl</a>
            @endif
        </section>
        <section class="dashboard-cards">
            <div class="feature">
                <h3>Kayıt olduğum dersler</h3>
                <p>Aktif ve kayıtlı derslerini görüntüle.</p>
                <div class="lessons">
                    @foreach($myLessons as $lesson)
                        @if($lesson->end > now())
                            <div class="free-lesson-card card_{{ $lesson->id }}">
                                @if($lesson->grade != null)<b>{{ $lesson->grade }}. Sınıf - {{ ucwords(str_replace('_', ' ', $lesson->teacher->branch) )}}</b> @endif

                                <b>{{ $lesson->title }}</b>
                                <p><b>Tarih - Saat:</b> <br/>{{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }} - {{ date('H:i', strtotime($lesson->end)) }}</p>
                                
                                <p><b>Eğitmen:</b> <br/>{{ $lesson->teacher->name }} </p>
                                @if($lesson->meet_url != null)
                                    @if($lesson->end > now())
                                        <a id="start_{{ $lesson->id }}" lesson-id="{{ $lesson->id }}" target="_blank" href="{{ $lesson->meet_url }}" start-time="{{ $lesson->start }}" end-time="{{ $lesson->end }}" style="display:none;"  class="start_lesson rocking-btn">Derse Koş!</a>
                                    @endif
                                
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Ücretsiz Dersler --> 
            <div class="feature">
                <h3>Ücretsiz Dersler</h3>
                <p>Ücretsiz derslere katıl ve öğrenmeye başla.</p>
                <div class="grades">
                    @foreach($groupedLessons as $grade => $lessons)

                        <div class="grade-box">
                            <h4>{{ $grade }}. Sınıf</h4>
                            <div class="lessons">
                                @foreach($lessons as $lesson)
                            
                                    <div class="{{ $lesson->is_free ? 'lesson-card' : 'paid-lesson-card' }}">
                                        @if($lesson->grade != null)
                                            @if($lesson->grade == '13')
                                                <b>KPSS - {{ ucwords(str_replace('_', ' ', $lesson->teacher->branch) )}}</b> 
                                            @else 
                                                <b>{{ $lesson->grade }}. Sınıf - {{ ucwords(str_replace('_', ' ', $lesson->teacher->branch) )}}</b> 
                                            @endif
                                        @endif
                                        <b>{{ $lesson->title }}</b>
                                        <p><b>Tarih - Saat:</b> <br/> {{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }} - {{ date('H:i', strtotime($lesson->end)) }}</p>
                                        <div style="display:flex; align-items:center; justify-content:space-between;width:100%;">
                                            <div>
                                                <b>Eğitmen:</b> <br/>{{ $lesson->teacher->name }}
                                            </div>
                                            <div>
                                                <b>Kontenjan:</b> {{ $lesson->max_person }} Kişi
                                            </div>
                                        </div>
                                        @if(!$lesson->is_free)
                                        <div>
                                            <p>Ücret: <span class="price">250</span> ₺</p>
                                            <a href="javascript:;" class="btn btn-primary join-paid-lesson-btn" data-lesson-title="{{ $lesson->title }}" data-lesson-price="250" data-lesson-id="{{ $lesson->id }}">Derse Kayıt ol</a>
                                        </div>
                                        @else
                                            
                                            <div style="display:flex; align-items:center; justify-content:space-between;width:100%;">
                                                <div>
                                                    <a href="javascript:;" class="btn btn-primary join-lesson-btn" data-lesson-id="{{ $lesson->id }}">Derse Kayıt ol</a>
                                                </div>
                                                <div>
                                                    <i class="bi bi-person"></i> {{count(array_filter(explode(',', $lesson->attendees)))}} 
                                                </div>
                                            </div>
                                        @endif
                                        
                                    </div>
                            
                                @endforeach
                            </div>
                        </div>
                    
                    @endforeach
                </div>
            </div>
            <!-- Ücretli Dersler --> 
            <div class="feature">
                <h3>Ücretli Dersler</h3>
                <p>Ücretli derslere katıl ve öğrenmeye başla.</p>
                <div class="lessons">
                    @foreach($paidLessons as $lesson)
                    @if($lesson->end > now())
                        <div class="{{ $lesson->is_free ? 'lesson-card' : 'paid-lesson-card' }}">
                            @if($lesson->grade != null)<b>{{ $lesson->grade }}. Sınıf - {{ ucwords(str_replace('_', ' ', $lesson->teacher->branch) )}}</b> @endif
                            <b>{{ $lesson->title }}</b>
                            <p><b>Tarih - Saat:</b> <br/> {{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }} - {{ date('H:i', strtotime($lesson->end)) }}</p>
                            <p><b>Eğitmen:</b> <br/>{{ $lesson->teacher->name }}</p>
                            @if(!$lesson->is_free)
                                <div>
                                    <p>Ücret: <span class="price">250</span> ₺</p>
                                    <a href="javascript:;" class="btn btn-primary join-paid-lesson-btn" data-lesson-title="{{ $lesson->title }}" data-lesson-price="250" data-lesson-id="{{ $lesson->id }}">Derse Kayıt ol</a>
                                </div>
                            @endif
                            
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>

       

        <section>
            <div class="teachers-section mb-50">
                <div class="text-center mb-4"><h4><b>Eğitmenlerimiz</b></h4></div>
                <div class="teachers-grid">
                    @foreach($teachers as $teacher)
                        <div class="">
                        <div class="teacher-box" tabindex="0">
                            <div class="mb-3 teacher-avatar">
                                @if($teacher->image == null)
                                    <img src="{{ asset('assets/img/default-image.png') }}" class="profile-img" width="80" alt="">
                                @else
                                <img src="{{ asset($teacher->image) }}" class="profile-img" width="80" alt="">
                                @endif
                            </div>
                            <div style=""><strong>{{ $teacher->name }} {{ $teacher->surname }}</strong></div>
                            <small class="teacher-branch">{{ ucwords(str_replace('_', ' ',   $teacher->branch)) }} </small>
                            <div style="margin-top:8px; display:flex; gap:8px; align-items:center">
                                <a href="{{route('teacher.public.profile', ['id' => $teacher->id])}}" class="btn btn-primary" style="padding:8px 12px; font-weight:700">Profili İncele</a>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
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

        // start_lesson each function
        $('.start_lesson').each(function() {
            var lessonId = $(this).attr('lesson-id');
            const start_time = $(this).attr('start-time');
            const end_time   = $(this).attr('end-time');
            
            // set interval every second
            setInterval(function() {
                

                // Convert to Date objects
                const start = new Date(start_time.replace(' ', 'T'));
                const end   = new Date(end_time.replace(' ', 'T'));
                const now   = new Date();

                // Check if current time is between start and end
                const isBetween = now >= start && now <= end;

                const isFinished = now > end;

                if (isFinished == true) {
                    $(".card_" + lessonId).remove();
                }

                if (isBetween == true) {
                    $("#start_" + lessonId).show();
                    $(".time_info_" + lessonId).hide();
                }else{
                    
                }
            }, 1000)


        });
        
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
                      //jsonparse data
                    var data = JSON.parse(response);

                    if(data.status == 'success') {
                        alert('Derse başarıyla kayıt oldunuz!');
                        location.reload();
                    }
                    if(data.status == 'full') {
                        alert('Ders kontenjanı dolmuştur!');
                    }
                    if(data.status == 'already_joined') {
                        alert('Bu derse daha önce kayıt oldunuz!');
                    }
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

