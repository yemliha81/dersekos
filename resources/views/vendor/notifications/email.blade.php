<x-mail::message>
# Merhaba!

{{-- Intro sabit metin --}}
Bu e-postayı, hesabınız için bir şifre sıfırlama isteği aldığımız için alıyorsunuz.

<x-mail::button :url="$actionUrl" :color="'primary'">
Şifreyi Sıfırla
</x-mail::button>

Bu şifre sıfırlama linki 60 dakika içinde geçersiz olacaktır.

Eğer şifre sıfırlama isteğini siz yapmadıysanız, bu e-postayı yok sayabilirsiniz.

Saygılarımızla,<br>
{{ config('app.name') }}

<x-slot:subcopy>
Eğer "Şifreyi Sıfırla" butonuna tıklamakta sorun yaşıyorsanız, aşağıdaki linki kopyalayıp tarayıcınıza yapıştırabilirsiniz: <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>

</x-mail::message>