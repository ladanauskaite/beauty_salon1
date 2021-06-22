<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@extends('user/app')
@section('main-content')
    
  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('user/img/hair.jpg') }}" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-lower">Rezervuok paslaugą</span>
          </h2>
          <p class="mb-3">
            <div class="form-group">
            <select class="custom-select" name="service" id="service" data-dependent="state" onchange="return showservicename();">
                <option class="font-weight-bold">Paslauga</option>
              @foreach ($services as $service)
              <option value="{{ $service->service_name }}">{{$service->service_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="custom-select" name="places[]" id="testing" onchange="return showserviceplace();">
                <option class="font-weight-bold">Paslaugos vieta</option>
              @foreach ($places as $place)
              <option value="{{ $place->address }}">{{$place->address}}</option>
              @endforeach
            </select>
          </div>
            <input class="form-control mb-3" type="date" value="2011-08-19" id="example-date-input" onchange="return showservicedate();">
           <input class="form-control" type="time" value="13:45:00" id="example-time-input">
          </p>
    
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta" style="background-color: rgba(0,0,0,.4);">
    <div class="container">
    
        @foreach ($reservations as $reservation)
        <?php $check = $reservation->id; ?>
        <?php $val = false; ?>
        @foreach ($reserved_services as $reserved_service)
        @if($reserved_service->reservation_id === $check)
            <?php $val=true; ?> 
            @endif
            @endforeach
            @if($val===false)
        <form role="form" action="{{ route('reservedservice')}}" method="post" enctype="multipart/form-data"  id="card" class="card">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row mb-2">
        <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
                <div class="row">
                <div class="col-6">
            <h2 class="section-heading mb-1">
                <span class="section-heading-upper service-place">
                    @foreach ($services as $service)
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
                        @endforeach
                </span>
              <span class="section-heading-lower mb-1 service-name" id="service-name">
                  @foreach ($services as $service)
                            @foreach ($reservation->services as $reservationService)
                              @if ($reservationService->id == $service->id)
                               {{$service->service_name}}
                              @endif
                            @endforeach
                        @endforeach</span>
            </h2>
               
                <h6>@foreach ($services as $service)
                            @foreach ($reservation->services as $reservationService)
                              @if ($reservationService->id == $service->id)
                              {{$service->service_text}}<br>
                              @endif
                            @endforeach
                        @endforeach</h6>
            <p class="mb-0">
                @foreach ($admins as $admin)
                    @foreach ($reservation->admins as $reservationAdmin)
                      @if ($reservationAdmin->id == $admin->id)
                          <b>Darbuotojas: </b> {{$admin->name}}
                      @endif
                    @endforeach
                @endforeach
                <br>
            <p class="mb-0"><b>Paslaugos data: </b><span class=" service-date">{{ $reservation->service_date }}</span></p>
                <p class="mb-0"><b>Nuo: </b>{{ $reservation->service_time_from }}</p>
                <p class="mb-0"><b>Iki: </b>{{ $reservation->service_time_to }}</p>
                <div class="intro-button mx-auto mt-3">
                    @if (!Auth::guest())
                    <button type="submit" class="btn btn-primary pl-4 pr-4 pt-3 pb-3">Rezervuoti</button>
                    @endif
                  </div>
          </div>
                <div class="col-6">
                    @foreach ($services as $service)
                            @foreach ($reservation->services as $reservationService)
                              @if ($reservationService->id == $service->id)
                                  <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{ Storage::url($service->service_photo) }}" alt="">
                              @endif
                            @endforeach
                        @endforeach
                </div>
                </div>
                 </div>
           </a>
        </div>
      </div>
        <input type="text" name="reservation_id" class="form-control" id="reservation_id" value="{{$reservation->id}}" style="display:none">
        </form>
            @endif
        @endforeach
        
            <ul class="pager">
                <li class="next">
                </li>
            </ul>
    </div>
  </section>
@endsection
<style>
    .hidden {
        display:none!important;
    }
    nav.items-center {
    float: right!important;
    margin-top:20px!important;
    }
    .bg-white {
        color: black!important;
    }
    .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
    background-color: #5bd6de!important;
    border-color: #5bd6de!important;
}
</style>

    
<script>
function showservicename(){
    var e = document.getElementById("service");
    var strUser = e.value.toUpperCase();
    console.log(strUser);
    var listName = document.getElementsByClassName("service-name");
    
    for (var i = 0; i < listName.length; i++) {
        var card = document.getElementsByClassName("card");
        card[i].style.display = "";
    }
    
    for (var i = 0; i < listName.length; i++) {
        var name = listName[i].innerText;
        console.log("Price: " + name);
        var card = document.getElementsByClassName("card");
        if(name === strUser) {
            card[i].style.display = "block";
        } else {
            card[i].style.display = "none";
        }
    }
}
function showserviceplace(){
    var e = document.getElementById("testing");
    var strUser = e.value.toUpperCase();
    console.log(strUser);
    var listName = document.getElementsByClassName("service-place");
        for (var i = 0; i < listName.length; i++) {
        var card = document.getElementsByClassName("card");
        card[i].style.display = "";
    }
for (var i = 0; i < listName.length; i++) {
  var name = listName[i].innerText;
  console.log("Price: " + name);

    var card = document.getElementsByClassName("card");
    if(name !== strUser) {
        card[i].style.display = "none";
    } else {
        card[i].style.display = "block";
    }
}
}

function showservicedate(){
    var e = document.getElementById("example-date-input");
    var strUser = e.value;
    console.log(strUser);
    var listName = document.getElementsByClassName("service-date");
    
    for (var i = 0; i < listName.length; i++) {
        var card = document.getElementsByClassName("card");
        card[i].style.display = "";
    }
    
    for (var i = 0; i < listName.length; i++) {
        var name = listName[i].innerText;
  console.log(name);
    
    var card = document.getElementsByClassName("card");
    if(name !== strUser) {
        card[i].style.display = "none";
    } else {
        card[i].style.display = "block";
    }
}
}
</script>