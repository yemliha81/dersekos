@extends('layouts.main')


@section('content')

    <main>
        <div class="vip-banner" style="display:none;">
        <a href="https://dersekos.vip"><i>dersekos.vip</i> Açıldı! Hemen incele</a>
        </div>
        <!-- col-3 in pc screen, col-12 in mobile screen -->
        <div class="row mt-3">
            <div class="col-12 col-md-3">
            <section class="mb-3" aria-labelledby="hero-title">
                <section class="hero-card mb-50" aria-labelledby="hero-title">
                    <div class="mb-3">Hoş geldin, <b id="hero-title">{{ auth('student')->user()->name }}!</b></div>
                    <div class="left-student-menu">
                        <a href="{{route('student.dashboard')}}"> <i class="bi bi-person "></i> Öğrenci Sayfam</a>
                    </div>
                    <div class="left-student-menu">
                        <a href="{{route('student.old_lessons')}}"> <i class="bi bi-file-earmark-text"></i> Geçmiş Derslerim</a>
                    </div>
                    <div class="left-student-menu">
                        <a href="{{route('student.dashboard2')}}"> <i class="bi bi-file-earmark-text"></i> Tüm Sınıf Dersleri</a>
                    </div>
                    
                    <div>
                    @if(auth('student')->user()->grade == '1')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/KqnVpHc71dBGHMlPVwa8YM?mode=hqrc">1. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '2')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/BUfeng4quwoIFoC0tXHsQS?mode=hqrc">2. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '3')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/FHb3K0BlY0P01YCJWEawcD?mode=hqrc">3. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '4')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/IQW5Ft9xGZSGgbf1m3D4b9?mode=hqrc">4. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '5')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/IkluolYw7KLIVFHhJyJQyQ?mode=hqrc">5. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '6')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/EfDqyyYWxBW7mtvI5X0kLr?mode=hqrc">6. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '7')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/K2uZXFY2tnHCbQUXqvMi1H?mode=hqrc">7. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '8')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/D1vMb1B7k6N9QY7vX665mV?mode=hqrc">8. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '9')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/FYZDrDOFJxe7aggofVkqiw?mode=hqrc">9. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '10')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/L97vpPBhlqt3dpfV4knbND?mode=hqrc">10. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '11')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/GHZ6XPSC9q1A0K5oeG26Pa?mode=hqrc">11. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '12')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/EeIJrSFzFObFen8WoLOd2Z?mode=hqrc">12. Sınıf WhatsApp Grubu</a>
                    @endif
                    @if(auth('student')->user()->grade == '13')
                        <a class="whatsapp-btn" target="_blank" href="https://chat.whatsapp.com/GmPAYDFFoSOGcxULO9ApGw?mode=hqrc">KPSS WhatsApp Grubu</a>
                    @endif
                    </div>
                    <div class="left-student-menu">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#cancelModal"> <i class="bi bi-x"></i> Üyelik İptali</a>
                    </div>
                </section>
                
            </section>
            
      </div>
        
        <div class="col-12 col-md-9">
            <section class="dashboard-cards">
                <div class="mb-50">
                    <div class="lesson-title-div"><b>Kayıt olduğum dersler</b></div>
                    <div class="free-lessons">
                        @if(count($myLessons) > 0)
                            @foreach($myLessons as $lesson)
                                @if($lesson->end > now())
                                    <div class="free-lesson-card card_{{ $lesson->id }}">
                                        <div class="flex-space-between">
                                            <div >
                                                <div>@if($lesson->grade != null)<b>{{ ($lesson->grade == 13 ) ? 'KPSS' : $lesson->grade }}. Sınıf - {{ ucwords(str_replace('_', ' ', $lesson->teacher->branch) )}}</b> @endif </div>
                                                <div style="font-size:15px;">{{ $lesson->title }}</div>
                                            </div>
                                            <div>
                                                @if($lesson->end > now())
                                                    <a id="start_{{ $lesson->id }}" lesson-id="{{ $lesson->id }}" target="_blank" href="{{ $lesson->meet_url }}" start-time="{{ $lesson->start }}" end-time="{{ $lesson->end }}" style="display:none;"  class="start_lesson rocking-btn">Derse Koş!</a>
                                                @endif
                                                
                                                @if($lesson->start > now())
                                                    <span><i class="bi bi-alarm"></i> <span class="countdown" id="countdown_{{ $lesson->id }}"></span></span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="flex-space-between" style="margin-top:15px;">
                                            <b>{{ $lesson->teacher->name }} </b>
                                            <span style="font-size:15px;">{{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <div class="alert alert-warning">
                                Henüz hiç bir derse kayıt olmadınız.
                            </div>
                        @endif
                                    
                    </div>
                </div>
                <!-- Ücretsiz Dersler --> 
                <div class="mb-50">
                    <div class="free-lesson-title-div" ><b>Ücretsiz Dersler</b></div>
                    <div class="grades">
                        
                        @if(count($groupedLessons) > 0)
                            
                                @foreach($groupedLessons as $grade => $lessons)
                                    
                                        <div class="grade-box">
                                            <div class="lessons">
                                                @foreach($lessons as $lesson)
                                            
                                                    <div class="{{ $lesson->is_free ? 'lesson-card' : 'paid-lesson-card' }}">
                                                        <div class="flex-space-between">
                                                            <div >
                                                                <div>@if($lesson->grade != null)<b>{{ ($lesson->grade == 13 ) ? 'KPSS' : $lesson->grade }}. Sınıf - {{ ucwords(str_replace('_', ' ', $lesson->teacher->branch) )}}</b> @endif </div>
                                                                <div style="font-size:15px;">{{ $lesson->title }}</div>
                                                            </div>
                                                            <a href="javascript:;" class="btnx join-lesson-btn" data-lesson-id="{{ $lesson->id }}">Derse Kayıt ol</a>
                                                        </div>
                                                        
                                                        
                                                        <div class="flex-space-between" style="margin-top:15px;">
                                                            <div>
                                                                <b>{{ $lesson->teacher->name }} </b>
                                                                <span><i class="bi bi-person"></i> {{ $lesson->max_person }} / {{count(array_filter(explode(',', $lesson->attendees)))}} </span>
                                                            </div>
                                                            <span style="font-size:15px;">{{ date('d.m.Y', strtotime($lesson->start)) }} {{ date('H:i', strtotime($lesson->start)) }}</span>
                                                        </div>
                                                        
                                                    </div>
                                            
                                                @endforeach
                                            </div>
                                        </div>
                                @endforeach
                            
                        @else
                            <div class="alert alert-warning">
                                Sınıf seviyenizde aktif ücretsiz ders bulunamadı. Lütfen sayfayı daha sonra tekrar ziyaret ediniz.
                            </div>
                        @endif
                        
                    </div>
                </div>
                
            </section>
        </div>
        </div>

        <!-- İptal Modal -->
        <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelModalLabel">Üyelik İptali</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Üyeliğinizi iptal etmek istediğinizden emin misiniz? Bu işlem geri alınamaz.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <form action="{{ route('student.cancel_membership') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Üyeliği İptal Et</button>
                        </form>
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
                
                //calculate time left
                var timeLeft = Math.floor((Date.parse(start_time) - Date.parse(new Date())) / 1000); 

                var days = Math.floor(timeLeft / 86400); 
                var hours = Math.floor((timeLeft - days * 86400) / 3600); 
                var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60); 
                var seconds = timeLeft - (days * 86400 + hours * 3600 + minutes * 60);

                // Format time left
                var timeLeft = (days > 0 ? days + 'g ' : '') + (hours > 0 ? hours + 's ' : '') + (minutes > 0 ? minutes + 'dk ' : '') + (seconds > 0 ? seconds + 'sn' : '');

                // Set time left
                $('#countdown_' + lessonId).text(timeLeft);

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
                    $('#countdown_' + lessonId).remove();
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

