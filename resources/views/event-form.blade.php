<!DOCTYPE html>
<html>
<head>
    <title>Google Takvim Etkinlik Ekle</title>
</head>
<body>

<h2>Google Takvim Etkinliği Oluştur</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="/google/event">
    @csrf

    <input type="text" name="title" placeholder="Etkinlik Başlığı" required><br><br>

    <textarea name="description" placeholder="Açıklama"></textarea><br><br>

    <label>Başlangıç</label><br>
    <input type="datetime-local" name="start" required><br><br>

    <label>Bitiş</label><br>
    <input type="datetime-local" name="end" required><br><br>

    <button type="submit">Google Takvime Kaydet</button>
</form>

</body>
</html>
