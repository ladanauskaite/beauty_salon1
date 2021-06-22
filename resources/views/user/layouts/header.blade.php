
  <h1 class="site-heading text-center text-white d-none d-lg-block mb-5 mt-5">
    <span class="site-heading-lower">Grožio paslaugų rezervacijos</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container text-nowrap">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('about') }}">Apie
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('main') }}">Rezervuok paslaugą</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('login') }}">Prisijungti</a>
          </li>
          @if (!Auth::check())
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded"  href="{{ route('register') }}">Registruokis</a>
          </li>
          @endif
                <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('news') }}">Naujienos</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded"  href="{{ route('admin.login') }}">Salonams</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('contacts') }}">Kontaktai</a>
          </li>
          @if (Auth::check())
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="{{ route('account') }}">Paskyra</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>