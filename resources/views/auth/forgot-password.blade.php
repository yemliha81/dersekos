@extends('layouts.main')


@section('content')

 <!-- Ana İçerik -->
  <main class="auth-wrap">
    <div class="auth-card">
      
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-2">Şifrenizi güncellemek için e-posta adresinizi giriniz.</div>
        <div class="field">
           <input type="email" name="email" placeholder="E-posta" required>
        </div>
       

        <button type="submit" class="btn btn-primary" style="width:100%">
        Şifre sıfırlama linki gönder
        </button>

        </form>
        @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
        @endif
    </div>



  </main>

@endsection