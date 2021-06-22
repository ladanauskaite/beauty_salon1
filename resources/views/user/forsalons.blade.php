@extends('user/app')
@section('main-content')
    
  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('user/img/hair.jpg') }}" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <!--<span class="section-heading-upper">Fresh Coffee</span>-->
            <span class="section-heading-lower">Salonams</span>
          </h2>
          <p class="mb-3">
            <select class="custom-select mb-2">
                    <option selected>Paslauga</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
            </select>
          <select class="custom-select mb-2">
                    <option selected>Vieta</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
          </select>
            <select class="custom-select mb-2">
                 <option selected>Data</option>
                 <option value="1">One</option>
                 <option value="2">Two</option>
                 <option value="3">Three</option>
           </select>
           <select class="custom-select">
                 <option selected>Laikas</option>
                 <option value="1">One</option>
                 <option value="2">Two</option>
                 <option value="3">Three</option>
           </select>
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary pl-4 pr-4 pt-3 pb-3" href="#"><i class="fas fa-search"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Our Promise</span>
              <span class="section-heading-lower">To You</span>
            </h2>
            <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
