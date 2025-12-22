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
        
        <section class="hero-card hero" aria-labelledby="hero-title">
            
            <div class="hero-left grid-20">
                <strong id="hero-title">Hoşgeldiniz, {{ auth('teacher')->user()->name }}!</strong>
                <p class="muted">Burada derslerinizi yönetebilir, profil bilgilerinizi düzenleyebilirsiniz.</p>
            </div>
            <div class="hero-right">
                <a class="btn btn-success" target="_blank" href="https://chat.whatsapp.com/K0y7N5ZEVc2FE2PHo7HDAk">Öğretmen WhatsApp grubumuza katılın</a>
            </div>
        </section>
        <section>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </section>

        <section class="hero-card dashboard-cards mb-3">
            <div class="row">
                <div class="col-12 col-md-3 ">
                    <div>
                        
                        <div class="profile-info mb-3">
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
                            <a class="btn btn-sm btn-info" style="display: inline-block" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">Profili Güncelle <i class="bi-pencil-fill"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="text-center mb-3 alert alert-info">Aşağıdaki takvmiden hemen ilk dersinizi planlayabilirsiniz!</div>
                    <div>
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
            
            
        </section>

        <section class="hero-card" >
            <div class="text-center mb-3">
                <h2>Tüm Eğitmenlere ait Takvim</h2>
            </div>
            <div id="allCalendar"></div>
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
                        <option value="1" >1. Sınıf</option>
                        <option value="2" >2. Sınıf</option>
                        <option value="3" >3. Sınıf</option>
                        <option value="4" >4. Sınıf</option>
                        <option value="5" >5. Sınıf</option>
                        <option value="6" >6. Sınıf</option>
                        <option value="7" >7. Sınıf</option>
                        <option value="8" >8. Sınıf</option>
                        <option value="9" >9. Sınıf</option>
                        <option value="10" >10. Sınıf</option>
                        <option value="11" >11. Sınıf</option>
                        <option value="12" >12. Sınıf</option>
                        <option value="13" >KPSS</option>
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
                    <label>Ücretsiz mi?</label>
                    <select id="is_free" class="form-select">
                        <option value="1">Ücretsiz</option>
                        <option value="0">Ücretli</option>
                    </select>
                    </div>

                    <div class="mb-3" id="priceArea" style="display:none;">
                    <label>Ücret (₺)</label>
                    <input type="number" id="price" class="form-control" min="0" step="0.01">
                    </div>

                    <div class="mb-3">
                    <label>Minimum Katılımcı</label>
                    <input type="number" id="min_person" min="5"  class="form-control">
                    </div>

                    <div class="mb-3">
                    <label>Maksimum Katılımcı</label>
                    <input type="number" id="max_person" class="form-control" min="1">
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
                        <form method="POST" action="{{route('event.update')}}">
                            @csrf
                            <input type="hidden" id="detailId" name="event_id" value="">
                            <p><strong>Başlık:</strong> <input type="text" id="detailTitle" name="title" class="form-control"></p>
                            <p>
                                <!-- grade level selectbox --> 
                                <label><strong>Sınıf Seviyesi:</strong></label>
                                <select id="detailGradeLevel" name="grade" class="form-select">
                                    <option value="1" >1. Sınıf</option>
                                    <option value="2" >2. Sınıf</option>
                                    <option value="3" >3. Sınıf</option>
                                    <option value="4" >4. Sınıf</option>
                                    <option value="5" >5. Sınıf</option>
                                    <option value="6" >6. Sınıf</option>
                                    <option value="7" >7. Sınıf</option>
                                    <option value="8" >8. Sınıf</option>
                                    <option value="9" >9. Sınıf</option>
                                    <option value="10" >10. Sınıf</option>
                                    <option value="11" >11. Sınıf</option>
                                    <option value="12" >12. Sınıf</option>
                                    <option value="13" >KPSS</option>
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
                                        <label><strong>Ücretsiz mi?</strong></label>
                                        <select id="detailIsFree" name="is_free" class="form-select">
                                            <option value="1" >Ücretsiz</option>
                                            <option value="0" >Ücretli</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-6" id="detailPriceArea">
                                    <p><strong>Ücret:</strong> <input type="text"  name="price" id="detailPrice" class="form-control"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p><strong>Minimum Katılımcı:</strong> <input type="number"  name="min_person" id="detailPersonMin" class="form-control"></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Maksimum Katılımcı:</strong> <input type="number" name="max_person" id="detailPersonMax" class="form-control"></p>
                                </div>
                            </div>
                            
                        
                            <p><strong>Kayıtlı Öğrenci Sayısı:</strong> <span id="detailRegistrationCount"></span></p>

                            <p><strong>Toplantı Linki:</strong> <input type="url" name="meet_url" id="detailMeetUrl" class="form-control"></p>

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
                                    <option value="5" >5. Sınıf</option>
                                    <option value="6" >6. Sınıf</option>
                                    <option value="7" >7. Sınıf</option>
                                    <option value="8" >8. Sınıf</option>
                                    <option value="9" >9. Sınıf</option>
                                    <option value="10" >10. Sınıf</option>
                                    <option value="11" >11. Sınıf</option>
                                    <option value="12" >12. Sınıf</option>
                                    <option value="13" >KPSS</option>
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
                                        <label><strong>Ücretsiz mi?</strong></label>
                                        <select disabled id="AlldetailIsFree" name="is_free" class="form-select">
                                            <option value="1" >Ücretsiz</option>
                                            <option value="0" >Ücretli</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-6" id="detailPriceArea">
                                    <p><strong>Ücret:</strong> <input disabled type="text"  name="price" id="AlldetailPrice" class="form-control"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p><strong>Minimum Katılımcı:</strong> <input disabled type="number"  name="min_person" id="AlldetailPersonMin" class="form-control"></p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Maksimum Katılımcı:</strong> <input disabled type="number" name="max_person" id="AlldetailPersonMax" class="form-control"></p>
                                </div>
                            </div>
                            
                        
                            <p><strong>Kayıtlı Öğrenci Sayısı:</strong> <span id="AlldetailRegistrationCount"></span></p>

                            <p><strong>Toplantı Linki:</strong> <input disabled type="url" name="meet_url" id="AlldetailMeetUrl" class="form-control"></p>

                           

                            
                        
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    </div>

                    </div>
                </div>
            </div>


        <!-- Öğretmen Profil Güncelleme modalı -->
        <div class="modal fade" id="profileModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Öğretmen Profili Güncelle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('teacher.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="teacher_id" value="{{ auth('teacher')->user()->id }}">
                            <div class="mb-3">
                                <label class="form-label">Profil Fotografı</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ad - Soyad</label>
                                <input type="text" name="name" class="form-control" value="{{ auth('teacher')->user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-posta</label>
                                <input type="email" name="email" class="form-control" value="{{ auth('teacher')->user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefon</label>
                                <input type="text" name="phone" class="form-control" value="{{ auth('teacher')->user()->phone }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Şifre</label>
                                <input type="password" name="password" class="form-control" placeholder="Yeni şifre (boş bırakılırsa değişmez)">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Branş</label>
                                <input type="text" name="branch" class="form-control" value="{{ auth('teacher')->user()->branch }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deneyim(Yıl)</label>
                                <input type="number" name="experience" class="form-control" value="{{ auth('teacher')->user()->experience }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Varsa Belge/Sertifikalarınız</label>
                                <input type="text" name="certificates" class="form-control" value="{{ auth('teacher')->user()->certificates }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kendiniz hakkında</label>
                                <textarea name="about" class="form-control" rows="3">{{ auth('teacher')->user()->about }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Etiketler</label>
                                <input type="text" name="tags" class="form-control" placeholder="Örn. LGS, TYT, Matematik" value="{{ auth('teacher')->user()->tags }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

    </main>


<script>
document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');
    var allCalendarEl = document.getElementById('allCalendar');

    var selectedDate = null;

    // isFree selectbox change event
    document.getElementById('is_free').addEventListener('change', function () {
        if (this.value == "0") {
            document.getElementById('detailPriceArea').style.display = 'block';
        } else {
            document.getElementById('detailPriceArea').style.display = 'none';
        }
    });

   var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'tr',
            selectable: true,
            events: '/events',

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

                fetch('/events/' + event.id + '/registrations')
                .then(res => res.json())
                .then(data => {
                    document.getElementById('detailRegistrationCount').innerText = data.count;
                });

                let priceText = event.extendedProps.is_free == 1 
                    ? 'Ücretsiz' 
                    : event.extendedProps.price + ' ₺';

                document.getElementById('detailPrice').innerText = priceText;

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
                document.getElementById('detailPrice').value = event.extendedProps.price

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

        if (!title || !startTime || !endTime) {
            alert("Lütfen tüm zorunlu alanları doldurun.");
            return;
        }

        let startDateTime = selectedDate + "T" + startTime;
        let endDateTime   = selectedDate + "T" + endTime;

        fetch('/events/store', {
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
        .then(res => res.json())
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

    var allCalendar = new FullCalendar.Calendar(allCalendarEl, {
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
                

                fetch('/events/' + event.id + '/registrations')
                .then(res => res.json())
                .then(data => {
                    document.getElementById('AlldetailRegistrationCount').innerText = data.count;
                });

                let priceText = event.extendedProps.is_free == 1 
                    ? 'Ücretsiz' 
                    : event.extendedProps.price + ' ₺';

                document.getElementById('AlldetailPrice').innerText = priceText;
                document.getElementById('AlldetailPrice').innerText = priceText;

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
                document.getElementById('AlldetailPrice').value = event.extendedProps.price

                document.getElementById('detailId').value = event.id;
                document.getElementById('AlldetailTitle').value = event.title;
                document.getElementById('AlldetailStart').value = event.start.toLocaleString('tr-TR');
                document.getElementById('AlldetailEnd').value   = event.end.toLocaleString('tr-TR');

                

                var allDetailModal = new bootstrap.Modal(document.getElementById('allEventDetailModal'));
                allDetailModal.show();
            }
        });

    allCalendar.render();



});


</script>




@endsection

@section('scripts')




@endsection


