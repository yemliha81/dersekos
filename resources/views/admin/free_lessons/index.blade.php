@extends('admin.layouts.main')
@section('title', 'Ücretsiz Ders Listesi')

@section('content')

<!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Ücretsiz Ders Listesi</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Anasayfa</a></li>
                  <li class="breadcrumb-item active" aria-current="exam">Ücretsiz Ders Yönetimi</li>
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
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Ücretsiz Ders Listesi</h5>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped dataTable" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Eğitmen</th>
                                    <th>Toplam Ders</th>
                                    <th>Ödeme</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($groupedLessons as $key => $lesson)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{$lesson['teacher']['name']}}</td>
                                        <td>{{$lesson['count']}}</td>
                                        <td>{{$lesson['count'] * 200 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        <!--end::App Content-->
@endsection
