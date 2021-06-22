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
            <h1 class="d-inline-block mb-0">Rezervacijos</h1>
            <a href="{{ route('reservation.create') }}" class="btn btn-sm btn-dark mb-2 ml-3">Pridėti rezervaciją</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Rezervacijos</li>
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
                  <h5 class="mb-0">Rezervacijų sąrašas </h5>
              </div>
               <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Paslaugos pavadinimas</th>
                    <th>Administratoriaus vardas</th>
                    <th>Paslaugos data</th>
                    <th>Paslaugos laikas nuo</th>
                    <th>Paslaugos laikas iki</th>
                    <th>Sukurta</th>
                    <th>Atnaujinta</th>
                    <th>Ištrinti</th>
                  </tr>
                  </thead>
                    <tbody>
                      @foreach ($reservations as $reservation)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                        @foreach ($services as $service)
                            @foreach ($reservation->services as $reservationService)
                              @if ($reservationService->id == $service->id)
                                  {{$service->service_name}}
                              @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                       @foreach ($admins as $admin)
                            @foreach ($reservation->admins as $reservationAdmin)
                              @if ($reservationAdmin->id == $admin->id)
                                  {{$admin->name}}
                              @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td>{{ $reservation->service_date }}</td>
                    <td>{{ $reservation->service_time_from }}</td>
                    <td>{{ $reservation->service_time_to }}</td>
                    <td>{{ $reservation->created_at }}</td>
                    <td>{{ $reservation->updated_at }}</td>
                    <td>
                        <form id="delete-form-{{$reservation->id}}" method="post" action="{{ route('reservation.destroy', $reservation->id) }}" style="display: none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE"/>
                        </form>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            if(confirm('Ar tikrai?')) {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$reservation->id}}').submit();
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
