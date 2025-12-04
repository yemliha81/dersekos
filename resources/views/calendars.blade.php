<h2>Google Takvimlerim</h2>

<ul>
@foreach($calendars as $calendar)
    <li>
        <a href="/google/calendar/{{ urlencode($calendar->id) }}">
            {{ $calendar->summary }}
        </a>
    </li>
@endforeach
</ul>
