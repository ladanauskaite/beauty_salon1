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
            <h1 class="d-inline-block mb-2">Užrezervuotos paslaugos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Užrezervuotos paslaugos</li>
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
                  <h5 class="mb-0">Užrezervuotų paslaugų sąrašas </h5>
              </div>
               <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Klientas</th>
                    <th>Paslauga</th>
                    <th>Vieta</th>
                    <th>Rezervacijos data</th>
                    <th>Rezervacijos laikas nuo</th>
                    <th>Rezervacijos laikas iki</th>
                    <th>Sukurta</th>
                    <th>Atnaujinta</th>
                    <th>Ištrinti</th>
                  </tr>
                  </thead>
                    <tbody>
                      @foreach ($reserved_services as $reserved_service)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                    @foreach ($users as $user)
                        @if ($reserved_service->user_id == $user->id)
                            {{$user->name}}
                        @endif
                    @endforeach
                    </td>
                    <td>
                        @foreach ($services as $service)
                            @foreach ($reservations as $reservation)
                                @if ($reserved_service->reservation_id == $reservation->id)
                                    @foreach ($reservation->services as $reservationService)
                                        @if ($reservationService->id == $service->id)
                                            {{$service->service_name}}
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                        @foreach ($services as $service)
                            @foreach ($reservations as $reservation)
                                @if ($reserved_service->reservation_id == $reservation->id)
                                    @foreach ($reservation->services as $reservationService)
                                        @if ($reservationService->id == $service->id)
                                            @foreach ($places as $place)
                                @foreach ($service->places as $servicePlace)
                                    @if ($servicePlace->id == $place->id)
                                        {{$place->address}}
                                    @endif
                                @endforeach
                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                    @foreach ($reservations as $reservation)
                        @if ($reserved_service->reservation_id == $reservation->id)
                            {{$reservation->service_date}}
                        @endif
                    @endforeach
                    </td>
                    <td>
                    @foreach ($reservations as $reservation)
                        @if ($reserved_service->reservation_id == $reservation->id)
                            {{$reservation->service_time_from}}
                        @endif
                    @endforeach
                    </td>
                    <td>
                    @foreach ($reservations as $reservation)
                        @if ($reserved_service->reservation_id == $reservation->id)
                            {{$reservation->service_time_to}}
                        @endif
                    @endforeach
                    </td>
                    <td>{{ $reserved_service->created_at }}</td>
                    <td>{{ $reserved_service->updated_at }}</td>
                    <td>
                        <form id="delete-form-{{$reserved_service->id}}" method="post" action="{{ route('reservedservice.destroy', $reserved_service->id) }}" style="display: none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE"/>
                        </form>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            if(confirm('Ar tikrai?')) {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$reserved_service->id}}').submit();
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
