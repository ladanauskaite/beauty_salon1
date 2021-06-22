@extends('user/app')
@section('main-content')
    

  <section class="page-section">
    <div class="container">
      <div class="product-item">
        <div class="product-item-title d-flex">
          <div class="bg-faded p-5 d-flex ml-auto rounded">
            <h2 class="section-heading mb-0">
                <span class="section-heading-upper">
                     @foreach ($places as $place)
                            @foreach ($service->places as $servicePlace)
                              @if ($servicePlace->id == $place->id)
                                  {{$place->address}}
                              @endif
                            @endforeach
                        @endforeach
                </span>
              <span class="section-heading-lower">{{ $service->service_name }}</span>
            </h2>
          </div>
        </div>
          <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{ Storage::url($service->service_photo) }}" alt="">
        <div class="product-item-description d-flex mr-auto">
          <div class="bg-faded p-5 rounded">
            <h6 class="mb-0">{{ $service->service_text }}</h6>
            <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th>Paslaugos pavadinimas</th>
                    <th>Administratoriaus vardas</th>
                    <th>Paslaugos data</th>
                    <th>Paslaugos laikas nuo</th>
                    <th>Paslaugos laikas iki</th>
                    <th>Rezervuoti</th>
                  </tr>
                  </thead>
                    <tbody>
                      @foreach ($reservations as $reservation)
                  <tr>
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
                    <td>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection