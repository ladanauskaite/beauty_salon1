@extends('user/app')
@section('main-content')
    
<section class="page-section cta" style="background-color: rgba(0,0,0,.4);">
      <div class="container">
        <div class="row">
          <div class="col-xl-11 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">Paskyra</span>
                <span class="section-heading-lower">Užrezervuotos paslaugos</span>
              </h2>
               <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Paslauga</th>
                    <th>Adresas</th>
                    <th>Rezervacijos data</th>
                    <th>Rezervacijos laikas nuo</th>
                    <th>Rezervacijos laikas iki</th>
                    <th>Užrezervuota</th>
                    <th>Atšaukti</th>
                  </tr>
                  </thead>
                    <tbody>
                      @foreach ($reserved_services as $reserved_service)
                      <?php $check = auth()->user()->id; ?>
                        <?php $val = false; ?>
                        @foreach ($users as $user)
                        @if($reserved_service->user_id == $check)
                            <?php $val=true; ?> 
                            @endif
                            @endforeach
                            @if($val===true)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
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
                  @endif
                  @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection