@extends('admin.layouts.app')

@section('main-content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paslaugos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Sukurti paslaugą</li>
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
                <h3 class="card-title">Sukurti paslaugą</h3>
              </div>
              <form role="form" action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                     @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">
                                    {{$error}}
                                </p>
                            @endforeach
                      @endif
                  <div class="form-group">
                    <label for="service_name">Paslaugos pavadinimas</label>
                    <input type="text" name="service_name" class="form-control" id="service_name" placeholder="Įrašyti paslaugos pavadinimą...">
                  </div>
                  <div class="form-group">
                    <label for="slug">URL</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Įrašyti URL">
                  </div>
                   <div class="form-group">
                        <label>Paslaugos vieta</label>
                        <select class="custom-select" name="places[]">
                          @foreach ($places as $place)
                          <option value="{{ $place->id }}">{{$place->address}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                    <label for="service_text">Paslaugos aprašymas</label>
                    <textarea type="text" name="service_text" class="form-control mb-2" id="service_text" placeholder="Įrašyti paslaugos aprašymą..."></textarea>
                    </div>
                    <div class="form-group">
                    <label for="service_name">Paslaugos nuotrauka</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="service_photo" name="service_photo">
                        <label class="custom-file-label" for="service_photo">Pasirinkti nuotrauką</label>
                      </div>
                    </div>
                  </div>
                   <button type="submit" class="btn btn-info">Sukurti</button>
                   <a href="{{ route('service.index') }}" class="btn btn-secondary">Grįžti</a>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection