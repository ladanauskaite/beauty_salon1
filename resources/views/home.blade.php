@extends('user/app')
@section('main-content')
    
  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('user/img/login.jpg') }}" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
          </h2>
          <p class="mb-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Jūs prisijungėte!') }}
                    <div class="form-group row mb-3">
                            <div class="col-12">
                                <a href="{{ route('main') }}" type="button" class="btn btn-primary">
                                    {{ __('Rezervuok paslaugą') }}
                                </a>
                            </div>
                        </div>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" class='mt-3 text-dark'>
                    Atsijungti
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
          </p>
        </div>
      </div>
    </div>
  </section>


@endsection
