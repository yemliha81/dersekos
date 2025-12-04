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
      <form  action="{{route('teacher.login.submit')}}" method="POST" class="form form-login">
        @csrf
        <h2>Öğretmen Giriş</h2>
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
      <form  action="{{route('teacher.signup.submit')}}" method="POST" class="form form-register">
        @csrf
        <h2>Öğretmen Hesabı Oluştur</h2>
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
          <label>Branşınız</label>
          <select name="branch" required>
            <option value="" disabled selected>Seçiniz</option>
            <option value="ilkogretim_matematik">İlköğretim Matematik</option>
            <option value="lise_matematik">Lise Matematik</option>
            <option value="fen_bilimleri">Fen Bilimleri</option>
            <option value="ingilizce">İngilizce</option>
            <option value="fizik">Fizik</option>
            <option value="kimya">Kimya</option>
            <option value="biyoloji">Biyoloji</option>
            <option value="turkce">Türkçe</option>
            <option value="tarih">Tarih</option>
            <option value="cografya">Coğrafya</option>
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