<?php 
$teacher = auth('teacher')->user();

if($teacher->is_vip == 0){
    die('Bu sayfaya erişim yetkiniz yoktur.');
} ?>
@extends('layouts.main')


@section('content')
<style>
    @media (max-width: 768px) {
        body {
            padding: 0 !important;
        }
    }
</style>
    <main>
        
        <section class="hero-card mt-3 mb-3" aria-labelledby="hero-title" style="background:#000000; color:#FFFFFF;">
            
            <div class="text-center">
                <strong id="hero-title">Hoş geldiniz, {{ auth('teacher')->user()->name }}!</strong>
                <p class="muted">Burada VIP derslerinizi yönetebilir, profil bilgilerinizi düzenleyebilirsiniz.</p>
            </div>
            
        </section>
        <section>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </section>

        <section class="hero-card dashboard-cards mb-3" style="background:#666666; color:#FFFFFF;">
            <div class="row">
                <div class="col-12 col-md-3 ">
                    <div>
                        
                        <div class="profile-info mb-3" >
                            <div class="mb-3 teacher-img">
                                @if(auth('teacher')->user()->image == null)
                                    <img src="{{ asset('assets/img/default-profile.png') }}" class="profile-img" width="100" alt="">
                                @else
                                <img src="{{ asset( auth('teacher')->user()->image) }}" class="profile-img" width="100" alt="">
                                @endif
                            </div>
                            <div class="">
                                <b>Ad - Soyad</b>
                                <p>{{ auth('teacher')->user()->name }}</p>
                            </div>
                            <div class="">
                                <b>Email</b>
                                <p>{{ auth('teacher')->user()->email }}</p>
                            </div>
                            <div class="">
                                <b>Branş</b>
                                <p>{{ ucfirst(auth('teacher')->user()->branch) }} </p>
                            </div>
                        </div>
                        <div class="text-right mb-2" style="text-align:right;">
                            @if(auth('teacher')->user()->status == '1')
                            
                           <a href="{{route('teacher.dashboard')}}" class="btn btn-info btn-sm form-control" >DERSE KOŞ PANELE GEÇ </a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    @if(auth('teacher')->user()->status == '1')
                        <div>
                            <div id="calendar"></div>
                        </div>
                    @else 
                        <div class="text-center mb-3 alert alert-danger">
                            Öğretmen hesabınız henüz onaylanmamıştır. <br> Onay işlemi için bize 
                            <a href="https://wa.me/905067790414" target="_blank">05067790414
                            </a> nolu telefondan whatsapp ile ulaşabilirsiniz.
                        </div>
                    @endif
                </div>
            </div>
            
            
        </section>
        
        <!-- Event Ekleme Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Yeni Ders oluştur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="eventDate">

                <div class="mb-3">
                <label>Başlık</label>
                <input type="text" id="title" class="form-control">
                </div>

                <div class="mb-3">
                <p>
                    <!-- grade level selectbox --> 
                    <label><strong>Sınıf Seviyesi:</strong></label>
                    <select id="grade" name="grade" class="form-select">
                        <!--<option value="1" >1. Sınıf</option>
                        <option value="2" >2. Sınıf</option>
                        <option value="3" >3. Sınıf</option>
                        <option value="4" >4. Sınıf</option>-->
                        <option value="5" >5. Sınıf</option>
                        <option value="6" >6. Sınıf</option>
                        <option value="7" >7. Sınıf</option>
                        <option value="8" >8. Sınıf</option>
                        <!--<option value="9" >9. Sınıf</option>
                        <option value="10" >10. Sınıf</option>
                        <option value="11" >11. Sınıf</option>
                        <option value="12" >12. Sınıf</option>
                        <option value="13" >KPSS</option>-->
                    </select>
                </p>
                </div>

                <div class="mb-3">
                <label>Başlangıç Saati</label>
                <input type="time" id="start_time" class="form-control">
                </div>

                <div class="mb-3">
                <label>Bitiş Saati</label>
                <input type="time" id="end_time" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Ders Türü</label>
                    <select id="is_free" class="form-select">
                        <option value="1">VIP</option>
                    </select>
                    </div>

                    <div class="mb-3" id="priceArea" style="display:none;">
                    <label></label>
                    <div>
                    <a
                        type="button"
                        class="btn btn-primary btn-sm"
                        data-bs-toggle="tooltip"
                        title="Öğrencilerimiz ders başına 250 ₺ öderler. Öğrenci sayısını bu tutarla çarptıktan sonra size toplam tutarın %80'i kadar ödeme yapılır.">
                        Ne kadar ödeme alacağım?
                    </a>
                    </div>
                    <input type="number" id="price" class="form-control" min="0" step="0.01" style="display:none;">
                    </div>

                    <div class="mb-3" style="display:none;">
                    <label>Minimum Katılımcı</label>
                    <input type="number" id="min_person" min="5"  class="form-control" value="5">
                    </div>

                    <div class="mb-3" style="display:none;">
                    <label>Maksimum Katılımcı</label>
                    <input type="number" id="max_person" class="form-control" min="1" value="10">
                    </div>


                <div class="mb-3" >
                    <label>Toplantı Linki (Zoom veya Google Meet)</label>
                    <input type="url" id="meet_url" class="form-control" >
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                <button type="button" id="saveEvent" class="btn btn-primary">Kaydet</button>
            </div>

            </div>
        </div>
        </div>

        <!-- Event Detay Modal -->
            <div class="modal fade" id="eventDetailModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Etkinlik Detayı</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="{{route('vip_event.update')}}">
                            @csrf
                            <input type="hidden" id="detailId" name="event_id" value="">
                            <p><strong>Başlık:</strong> <input type="text" id="detailTitle" name="title" class="form-control"></p>
                            <p>
                                <!-- grade level selectbox --> 
                                <label><strong>Sınıf Seviyesi:</strong></label>
                                <select id="detailGradeLevel" name="grade" class="form-select">
                                    <!--<option value="1" >1. Sınıf</option>
                                    <option value="2" >2. Sınıf</option>
                                    <option value="3" >3. Sınıf</option>
                                    <option value="4" >4. Sınıf</option>-->
                                    <option value="5" >5. Sınıf</option>
                                    <option value="6" >6. Sınıf</option>
                                    <option value="7" >7. Sınıf</option>
                                    <option value="8" >8. Sınıf</option>
                                    <!--<option value="9" >9. Sınıf</option>
                                    <option value="10" >10. Sınıf</option>
                                    <option value="11" >11. Sınıf</option>
                                    <option value="12" >12. Sınıf</option>
                                    <option value="13" >KPSS</option>-->
                                </select>
                            </p>
                            <div class="row">
                                <div class="col-6">
                                    <p><strong>Başlangıç:</strong> <input type="text" id="detailStart" name="start"  class="form-control"></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Bitiş:</strong> <input type="text" id="detailEnd" name="end"  class="form-control"></p>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        <!-- is_free selectbox --> 
                                        <label><strong>Ders Türü</strong></label>
                                        <select id="detailIsFree" name="is_free" class="form-select" disabled>
                                            <option value="1" >VIP</option>
                                            <!--<option value="0" >Ücretli</option>-->
                                        </select>
                                    </p>
                                </div>
                                <div class="col-6" id="detailPriceArea" style="display: none;">
                                    
                                </div>
                            </div>
                            <div style="display:none;">
                                <div class="col-6">
                                    <p><strong>Minimum Katılımcı:</strong> <input type="number"  name="min_person" id="detailPersonMin" class="form-control"></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Maksimum Katılımcı:</strong> <input type="number" name="max_person" id="detailPersonMax" class="form-control"></p>
                                </div>
                            </div>
                            

                            <p><strong>Toplantı Linki:</strong> <input type="url" name="meet_url" id="detailMeetUrl" class="form-control" ></p>

                            <p>
                                <input type="submit" class="btn btn-info" value="Bilgileri Güncelle">
                            </p>

                            <div id="meetArea" class="d-none">
                                <hr>
                                <a href="#" target="_blank" id="meetLink" class="btn btn-success w-100">
                                    Derse Başla
                                </a>
                            </div>
                            <div class="lessonInfo"></div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="allEventDetailModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Ders Detayı</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                            <p><strong>Eğitmen:</strong> <span id="AlldetailTeacherName"></span></p>
                            <p><strong>Başlık:</strong> <input disabled type="text" id="AlldetailTitle" name="title" class="form-control"></p>
                            <p>
                                <!-- grade level selectbox --> 
                                <label><strong>Sınıf Seviyesi:</strong></label>
                                <select disabled id="AlldetailGradeLevel" name="grade" class="form-select">
                                    <!--<option value="1" >1. Sınıf</option>
                                    <option value="2" >2. Sınıf</option>
                                    <option value="3" >3. Sınıf</option>
                                    <option value="4" >4. Sınıf</option>-->
                                    <option value="5" >5. Sınıf</option>
                                    <option value="6" >6. Sınıf</option>
                                    <option value="7" >7. Sınıf</option>
                                    <option value="8" >8. Sınıf</option>
                                    <!--<option value="9" >9. Sınıf</option>
                                    <option value="10" >10. Sınıf</option>
                                    <option value="11" >11. Sınıf</option>
                                    <option value="12" >12. Sınıf</option>
                                    <option value="13" >KPSS</option>-->
                                </select>
                            </p>
                            <div class="row">
                                <div class="col-6">
                                    <p><strong>Başlangıç:</strong> <input disabled type="text" id="AlldetailStart" name="start"  class="form-control"></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Bitiş:</strong> <input disabled type="text" id="AlldetailEnd" name="end"  class="form-control"></p>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-6">
                                    <p>
                                        <!-- is_free selectbox --> 
                                        <label><strong>Ders Türü</strong></label>
                                        <select disabled id="AlldetailIsFree" name="is_free" class="form-select">
                                            <option value="1" >VIP</option>
                                            
                                        </select>
                                    </p>
                                </div>
                                <div class="col-6" id="detailPriceArea2">
                                    <p></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="diplay:none;">
                                    <p><strong>Minimum Katılımcı:</strong> <input disabled type="number"  name="min_person" id="AlldetailPersonMin" class="form-control"></p>
                                </div>
                                <div class="col-6" style="diplay:none;">
                                    <p><strong>Maksimum Katılımcı:</strong> <input disabled type="number" name="max_person" id="AlldetailPersonMax" class="form-control"></p>
                                </div>
                            </div>
                            <p><strong>Toplantı Linki:</strong> <input disabled type="url" name="meet_url" id="AlldetailMeetUrl" class="form-control"></p>  
                        
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    </div>

                    </div>
                </div>
            </div>
        

    </main>

<script>
    
document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');
    var allCalendarEl = document.getElementById('allCalendar');
    var paidCalendarEl = document.getElementById('paidCalendar');

    var selectedDate = null;

   var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            firstDay: 1,
            locale: 'tr',
            selectable: true,
            events: '/vip-events',

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },

            buttonText: {
                today: 'Bugün',
                month: 'Ay',
                week: 'Hafta',
                day: 'Gün'
            },

            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },

            dateClick: function(info) {
                
                // split date and time
                var date = info.dateStr.split('T')[0];
                var time = info.dateStr.split('T')[1] ?? '';
                selectedDate = date;


                document.getElementById('title').value = '';
                document.getElementById('start_time').value = '';
                document.getElementById('end_time').value = '';
                document.getElementById('meet_url').value = '';

                var modal = new bootstrap.Modal(document.getElementById('eventModal'));
                modal.show();
            },

            eventClick: function(info) {
                let event = info.event;

                let priceText = event.extendedProps.is_free == 1 
                    ? 'Ücretsiz' 
                    : event.extendedProps.price + ' ₺';

                //document.getElementById('detailPrice').innerText = priceText;

                document.getElementById('detailPersonMin').value =
                    event.extendedProps.min_person;

                // detailGradeLevel selectbox
                document.getElementById('detailGradeLevel').value =
                    event.extendedProps.grade;

                document.getElementById('detailPersonMax').value =
                    event.extendedProps.max_person;

                    document.getElementById('detailMeetUrl').value =
                    event.extendedProps.meet_url;

                // is_free selectbox
                document.getElementById('detailIsFree').value = event.extendedProps.is_free

                // price input
                //document.getElementById('detailPrice').value = event.extendedProps.price

                document.getElementById('detailId').value = event.id;
                document.getElementById('detailTitle').value = event.title;
                document.getElementById('detailStart').value = event.start.toLocaleString('tr-TR');
                document.getElementById('detailEnd').value   = event.end.toLocaleString('tr-TR');

                if (event.extendedProps.meet_url) {
                    document.getElementById('meetArea').classList.remove('d-none');
                    document.querySelector('.lessonInfo').classList.add('d-none');
                    // if event.start <= now and event.end >= now
                    // then meet link will be openable
                    let now = new Date(); // plus 5 minutes
                    //now.setMinutes(now.getMinutes());
                    console.log(event.start, now, event.end);
                    if (event.start <= now && event.end >= now) {
                        document.getElementById('meetLink').setAttribute('href', event.extendedProps.meet_url);
                        document.getElementById('meetLink').classList.remove('disabled');
                    } else {
                        document.getElementById('meetLink').setAttribute('href', '#');
                        document.getElementById('meetLink').classList.add('disabled');
                    }
                } else {
                    // Ders linki henüz oluşturulmamıştır. Ders saatinde oluşturulacaktır.
                    document.getElementById('meetArea').classList.add('d-none');
                    document.querySelector('.lessonInfo').classList.remove('d-none');
                    let lessonInfo = document.querySelector('.lessonInfo');
                    lessonInfo.innerHTML = '<div class="alert alert-warning">Ders bağlantısı henüz oluşturulmamış. Ders saati geldiğinde bağlantı oluşturulacaktır.</div>'; 
                }

                var detailModal = new bootstrap.Modal(document.getElementById('eventDetailModal'));
                detailModal.show();
            }
    });


    calendar.render();

    document.getElementById('saveEvent').addEventListener('click', function () {

        let title = document.getElementById('title').value;
        let grade = document.getElementById('grade').value;
        let startTime = document.getElementById('start_time').value;
        let endTime = document.getElementById('end_time').value;
        let meetUrl = document.getElementById('meet_url').value;
        let isFree     = document.getElementById('is_free').value;
        let price     = document.getElementById('price').value;
        let minPerson = document.getElementById('min_person').value;
        let maxPerson = document.getElementById('max_person').value;

        if (minPerson < 5) {
            alert("Minimum katılımcı sayısı en az 5 olmalıdır.");
            return;
        }

        if (!title || !startTime || !endTime || !minPerson || !maxPerson || !meetUrl ) {
            alert("Lütfen tüm zorunlu alanları doldurun.");
            return;
        }

        //meet url must contain https:// , meet.google.com or zoom.us   
        if (!meetUrl.startsWith('https://') || 
            (meetUrl.indexOf('meet.google.com') === -1 && meetUrl.indexOf('zoom.us') === -1)) {
            alert("Lütfen geçerli bir toplantı linki girin.");
            return;
        }

        //meet Url shouldn't contain spaces
        if (meetUrl.indexOf(' ') >= 0) {
            alert("Lütfen geçerli bir toplantı linki girin.");
            return;
        }

        // check if meetUrl is a valid url
        try {
            new URL(meetUrl);
        } catch (e) {
            alert("Lütfen geçerli bir toplantı linki girin.");
            return;
        }

        let startDateTime = selectedDate + "T" + startTime;
        let endDateTime   = selectedDate + "T" + endTime;

        fetch('/vip-events/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                title: title,
                grade: grade,
                start: startDateTime,
                end: endDateTime,
                meet_url: meetUrl,
                is_free: isFree,
                price: price,
                min_person: minPerson,
                max_person: maxPerson,
            })
        })
        // console.log response as json
        .then(async res => {
            const data = await res.json();

            if (!res.ok) {
                // backend sent an error
                alert(data.error);
                throw new Error(data.error);
            }

            return data;
        })
        //console.log data
        .then(data => {
            calendar.addEvent({
            id: data.id,
            title: data.title,
            start: data.start,
            end: data.end,
            extendedProps: {
                meet_url: data.meet_url,
                grade: data.grade,
                is_free: data.is_free,
                price: data.price,
                min_person: data.min_person,
                max_person: data.max_person
            }
        });


            bootstrap.Modal.getInstance(document.getElementById('eventModal')).hide();
        });
    });

    document.getElementById('is_free').addEventListener('change', function () {
        if (this.value == "0") {
            document.getElementById('priceArea').style.display = 'block';
        } else {
            document.getElementById('priceArea').style.display = 'none';
            document.getElementById('price').value = '';
        }
    });

    /*var allCalendar = new FullCalendar.Calendar(allCalendarEl, {
            initialView: 'dayGridMonth',
            locale: 'tr',
            selectable: true,
            events: '/all-events',

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },

            buttonText: {
                today: 'Bugün',
                month: 'Ay',
                week: 'Hafta',
                day: 'Gün'
            },

            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },

            

            eventClick: function(info) {
                let event = info.event;

                let priceText = event.extendedProps.is_free == 1 
                    ? 'Ücretsiz' 
                    : event.extendedProps.price + ' ₺';

                //document.getElementById('AlldetailPrice').innerText = priceText;

                document.getElementById('AlldetailPersonMin').value =
                    event.extendedProps.min_person;

                // detailGradeLevel selectbox
                document.getElementById('AlldetailGradeLevel').value =
                    event.extendedProps.grade;

                // AlldetailTeacherName
                document.getElementById('AlldetailTeacherName').innerText =
                    event.extendedProps.teacher.name;

                document.getElementById('AlldetailPersonMax').value =
                    event.extendedProps.max_person;

                    document.getElementById('AlldetailMeetUrl').value =
                    event.extendedProps.meet_url;

                // is_free selectbox
                document.getElementById('AlldetailIsFree').value = event.extendedProps.is_free

                // price input
                //document.getElementById('AlldetailPrice').value = event.extendedProps.price

                document.getElementById('detailId').value = event.id;
                document.getElementById('AlldetailTitle').value = event.title;
                document.getElementById('AlldetailStart').value = event.start.toLocaleString('tr-TR');
                document.getElementById('AlldetailEnd').value   = event.end.toLocaleString('tr-TR');

                

                var allDetailModal = new bootstrap.Modal(document.getElementById('allEventDetailModal'));
                allDetailModal.show();
            }
        });

    allCalendar.render();*/



});


</script>




@endsection

@section('scripts')




@endsection


