@extends('admin.layouts.main')
@section('title', 'Paket Ekleme')

@section('content')
<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Paket Ekleme</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Paket Yönetimi</li>
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
                        <form action="{{ route('admin.vip_package.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                               
                                <div class="" id="tab-1" role="tabpanel" aria-labelledby="tab-1-tab">
                                    <div class="card-body">
                                       <div class="">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Başlık </label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Alt Başlık </label>
                                                <textarea name="description" id="description" class="form-control" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Aylık Ücret </label>
                                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Paket Görseli </label>
                                                <input type="file" class="form-control" id="image" name="image" required>
                                            </div>
                                            <!-- grade selection -->
                                            <div class="mb-3">
                                                <label for="grade" class="form-label">Sınıf Seçimi</label>
                                                <select name="grade" id="grade" class="form-control" required>
                                                    <option value="">Sınıf Seçiniz</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
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
        <!--end::App Content-->
@endsection