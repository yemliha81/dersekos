@extends('layouts.main')


@section('content')

 <!-- Ana İçerik -->
  <main class="auth-wrap">
    <div class="auth-form">
      <div class="auth-form__container">
        <h1 class="auth-form__title">Hoşgeldiniz</h1>
        <p class="auth-form__subtitle">Lütfen giriş yapmak istediğiniz kullanıcı tipini seçiniz.</p>
        <div class="auth-form__options">
            <a href="{{ route('student.login') }}" class="btn btn-info auth-form__option-btn">Öğrenci Girişi</a>
            <a href="{{ route('teacher.login') }}" class="btn btn-success auth-form__option-btn">Öğretmen Girişi</a>
        </div>
      </div>
    </div>
  </main>

@endsection