@extends('layouts.main')


@section('content')

 <!-- Ana İçerik -->
  <main class="auth-wrap">
    <div class="auth-card">
      
      <input type="radio" name="tab" id="login" checked>
      <input type="radio" name="tab" id="register">

      <div class="tabs">
        <label for="login">Giriş Yap</label>
        <label for="register">Üye Ol</label>
      </div>

      <!-- Giriş Formu -->
      <form  action="{{route('student.login.submit')}}" method="POST" class="form form-login">
        @csrf
        <h2>Hesabına Giriş Yap</h2>
        <div class="field">
          <label>E‑posta</label>
          <input type="email" name="email" placeholder="ornek@mail.com" required>
        </div>
        <div class="field">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="••••••••" required>
        </div>
        <button class="btn btn-primary" style="width:100%">Giriş Yap</button>
        <div class="auth-footer">Şifreni mi unuttun? <a href="#">Sıfırla</a></div>
      </form>

      <!-- Üyelik Formu -->
      <form  action="{{route('student.signup.submit')}}" method="POST" class="form form-register">
        @csrf
        <h2>Derse Koş'a Üye Ol</h2>
        <div class="field">
          <label>Ad Soyad</label>
          <input type="text" name="name" placeholder="Adınız Soyadınız" required>
        </div>
        <div class="field">
          <label>E‑posta</label>
          <input type="email" name="email" placeholder="ornek@mail.com" required>
        </div>
        <!-- grade selectbox --> 
        <div class="field">
          <label>Sınıf Seviyesi</label>
          <select name="grade" required>
            <option value="" disabled selected>Seçiniz</option>
            <option value="1">1. Sınıf</option>
            <option value="2">2. Sınıf</option>
            <option value="3">3. Sınıf</option>
            <option value="4">4. Sınıf</option>
            <option value="5">5. Sınıf</option>
            <option value="6">6. Sınıf</option>
            <option value="7">7. Sınıf</option>
            <option value="8">8. Sınıf</option>
            <option value="9">9. Sınıf</option>
            <option value="10">10. Sınıf</option>
            <option value="11">11. Sınıf</option>
            <option value="12">12. Sınıf</option>
            <option value="13">KPSS</option>
          </select>
        </div>
        <div class="field">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="En az 6 karakter" required>
        </div>
        <div class="field">
          <label><input type="checkbox" name="terms" required> Kullanım şartlarını kabul ediyorum</label>
        </div>
        <button class="btn btn-primary" style="width:100%">Üye Ol</button>
        <div class="auth-footer">Zaten hesabın var mı? Giriş Yap</div>
      </form>

    </div>
  </main>

@endsection