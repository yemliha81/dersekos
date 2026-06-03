@extends('layouts.main')

@section('content')

    <div class="container mt-5 mb-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2>{{ $exam->title }} Başvuru Formu </h2>
        <form action="{{ route('exam.apply.store', $exam->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="full_name" class="form-label">Öğrenci Ad - Soyad</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="mb-3">
                <label for="parent_full_name" class="form-label">Veli Ad - Soyad</label>
                <input type="text" class="form-control" id="parent_full_name" name="parent_full_name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Veli Telefon</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <!-- Greade 5,6,7,8 -->
            <div class="mb-3">
                <label for="grade" class="form-label">Sınıf</label>
                <select class="form-select" id="grade" name="grade" required>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Başvuru Yap</button>
        </form>
    </div>

@endsection