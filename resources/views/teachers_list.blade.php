@extends('layouts.main')


@section('content')
<main>
  <div class="">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-50 mt-50 lead-text">
                        <h1 class="mb-20">Eğitmenlerimiz</h1>
                        
                        <div class="teachers-list">
                            @foreach($teachers as $teacher)
                                <div class="">
                                    <img src="{{ asset('storage/' . $teacher->profile_picture) }}" alt="{{ $teacher->name }}" class="teacher-profile-picture">
                                    <div class="teacher-name">{{ $teacher->name }}</div>
                                    <div class="teacher-bio">{{ $teacher->branch }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</main>

@endsection


