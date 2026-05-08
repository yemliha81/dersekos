@extends('admin.layouts.main')
@section('title', 'Öğrenci Detay')

@section('content')
<!--begin::App Content Header-->

        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Öğrenci Detay</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Öğrenci Yönetimi</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif  
                <div class="card">
                    
                    <div class="card-body">
                        <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                
                                
                                <div class="tab-pane show active " id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
                                    <div class="card-body">
                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                      <div class="grids-3">
                                            
                                            <div class="mb-3">
                                                <label for="student" class="form-label">Ad - Soyad </label>
                                                <input type="text" class="form-control" id="student" name="name" value="{{ $student->name }}" >
                                            </div>
                                            
                                            <!-- email -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-posta</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" >
                                            </div>
                                            
                                            <!-- grade --> 
                                            <div class="mb-3">
                                                <label for="grade" class="form-label">Sınıf</label>
                                                <input type="text" class="form-control" id="grade" name="grade" value="{{ $student->grade }}" >
                                            </div>

                                            <!-- is_banned --> 
                                            <div class="mb-3">
                                                <label for="is_banned" class="form-label">Yasaklı mı?</label>
                                                <select class="form-control" id="is_banned" name="is_banned">
                                                    <option value="0" {{ $student->is_banned == 0 ? 'selected' : '' }}>Hayır</option>
                                                    <option value="1" {{ $student->is_banned == 1 ? 'selected' : '' }}>Evet</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                           
                            </div>
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </form>
                    </div>
                </div>
        </div>
@endsection

@section('scripts')

    

@endsection