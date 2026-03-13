@extends('layouts.main')


@section('content')

 <!-- Ana İçerik -->
  <main class="auth-wrap">
    <div class="auth-card">
      
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="field text-center mb-2">
            Yeni şifrenizi belirleyin.
        </div>
        <div class="field">
            <input type="hidden" name="token" value="{{ $token }}">
        </div>
        <div class="field">
                <input type="email" name="email" placeholder="Email">
        </div>
        <div class="field">
                <input type="password" name="password" placeholder="Yeni şifre">
        </div>
        <div class="field">
                <input type="password" name="password_confirmation" placeholder="Şifre tekrar">
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%">
        Şifreyi sıfırla
        </button>

        </form>
        
        @if (session('errors'))
        <div class="alert alert-danger">
            {{ session('errors')->first() }}
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-info">
            {{ session('status') }}
            </div>
        @endif
    </div>



  </main>

@endsection