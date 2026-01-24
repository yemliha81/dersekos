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
                                    @if($teacher->image == null)
                                        <img src="{{ asset('assets/img/default-image.png') }}" class="profile-img" width="80" alt="">
                                    @else
                                    <img src="{{ asset($teacher->image) }}" class="profile-img" width="80" alt="">
                                    @endif
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


