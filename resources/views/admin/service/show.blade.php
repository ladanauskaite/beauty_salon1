  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

@extends('admin.layouts.app')

@section('main-content')
 <div class="content-wrapper">
    <section class="content-header pb-0">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1 class="d-inline-block mb-0">Paslaugos</h1>
            <a href="{{ route('service.create') }}" class="btn btn-sm btn-dark mb-2 ml-3">Pridėti naują paslaugą</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Paslaugos</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                  <h5 class="mb-0">Paslaugų sąrašas </h5>
              </div>
               <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Paslaugos pavadinimas</th>
                    <th>URL</th>
                    <th>Paslaugos vieta</th>
                    <th>Paslaugos suteikėjo ID</th>
                    <th>Paslaugos aprašymas</th>
                    <th>Paslaugos nuotrauka</th>
                    <th>Sukurtas</th>
                    <th>Atnaujinta</th>
                    <th>Koreguoti</th>
                    <th>Ištrinti</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($services as $service)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->slug }}</td>
                    <td>
                        @foreach ($places as $place)
                            @foreach ($service->places as $servicePlace)
                              @if ($servicePlace->id == $place->id)
                                  {{$place->address}}
                              @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td>{{ $service->service_admin_id }}</td>
                    <td>{{ $service->service_text }}</td>
                     <td>{{ $service->service_photo }}</td>
                    <td>{{ $service->created_at }}</td>
                    <td>{{ $service->updated_at }}</td>
                    <td>
                        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                        <form id="delete-form-{{$service->id}}" method="post" action="{{ route('service.destroy', $service->id) }}" style="display: none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE"/>
                        </form>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            if(confirm('Ar tikrai?')) {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$service->id}}').submit();
                           }
                           else {
                               event.preventDefault();
                           }
                           ">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection


