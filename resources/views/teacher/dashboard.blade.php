@extends('layouts.main')


@section('content')

    

    <main>
      
        <section class="hero-card hero" aria-labelledby="hero-title">
            <div class="hero-left grid-20">
                <div class="pill">Öğretmen Paneli</div>
                <h1 id="hero-title">Hoşgeldin, {{ auth('teacher')->user()->name }}!</h1>
                <p class="muted">Burada derslerini yönetebilir, öğrencilerinle iletişim kurabilirsin.</p>
            </div>
        </section>

        <section class="hero-card">
            @if(session('success'))
                <div style="background:#d1fae5;padding:10px;margin-bottom:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('calendar.store') }}" method="POST">
                @csrf

                <!-- TAKVİM SEÇİMİ -->
                <label>Takvim Seç</label>
                <select name="calendar_id" required>
                    @foreach($calendars as $calendar)
                        <option value="{{ $calendar->id }}"
                            {{ $calendar->primary ? 'selected' : '' }}>
                            {{ $calendar->summary }}
                            {{ $calendar->primary ? '(Ana Takvim)' : '' }}
                        </option>
                    @endforeach
                </select>

                <br><br>

                <!-- BAŞLIK -->
                <input type="text" name="title" placeholder="Başlık" required>

                <br><br>

                <!-- AÇIKLAMA -->
                <textarea name="description" placeholder="Açıklama"></textarea>

                <br><br>

                <!-- TARİH SAAT -->
                <label>Başlangıç</label>
                <input type="datetime-local" name="start" required>

                <label>Bitiş</label>
                <input type="datetime-local" name="end" required>

                <br><br>

                <button type="submit">Google Takvim’e Ekle</button>
            </form>


        </section>

        <section class="hero-card dashboard-cards teacher-profile">
            <div>
                <div class="feature">
                    <h3>Ad - Soyad</h3>
                    <p>{{ auth('teacher')->user()->name }}</p>
                </div>
                <div class="feature">
                    <h3>Email</h3>
                    <p>{{ auth('teacher')->user()->email }}</p>
                </div>
                <div class="feature">
                    <h3>Branş</h3>
                    <p>{{ ucfirst(auth('teacher')->user()->branch) }} </p>
                </div>
            </div>
            

            <div>
                <iframe src="https://calendar.google.com/calendar/embed?src=0339fce3a47cb2ae6d1e35dc034bda3bee449b304a23eb85a88e4e86d58ef531%40group.calendar.google.com&ctz=Europe%2FIstanbul" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
            </div>
        </section>

        

    </main>

@endsection


