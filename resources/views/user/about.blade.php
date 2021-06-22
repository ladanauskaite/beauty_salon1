@extends('user/app')

@section('main-content')
  <section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{ asset('user/img/about.jpg') }}" alt="">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Apie mus</span>
                <span class="section-heading-lower">Grožio paslaugų rezervacijos</span>
              </h2>
              <p>Mūsų darbas – padėti klientams užsisakyti paslaugas jiems patogiu laiku ir būdu, o salonams – dirbti patogiau ir dar sėkmingiau. Mes kuriame daugiau nei išmanią rezervacijų platformą – mes kuriame vietą, kur galėtum išreikšti save kiekvieną mielą dieną ir rasti geriausias paslaugas už patraukliausią kainą kur bebūtum, kada benorėtum.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  
  