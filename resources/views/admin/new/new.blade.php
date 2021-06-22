@extends('admin.layouts.app')

@section('main-content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Naujienos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Sukurti naujieną</li>
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
                <h3 class="card-title">Sukurti naujieną</h3>
              </div>
              <form role="form" action="{{ route('new.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="news_name">Naujienos pavadinimas</label>
                    <input type="text" name="news_name" class="form-control" id="news_name" placeholder="Įrašyti paslaugos pavadinimą...">
                  </div>
                  <div class="form-group">
                    <label for="news_photo">Paslaugos nuotrauka</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="news_photo" name="news_photo">
                        <label class="custom-file-label" for="news_photo">Pasirinkti nuotrauką</label>
                      </div>
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="news_text">Naujienos aprašymas</label>
                    <textarea type="text" name="news_text" class="form-control mb-2" id="news_text" placeholder="Įrašyti paslaugos aprašymą..."></textarea>
                  </div>
                  <button type="submit" class="btn btn-info">Sukurti</button>
                  <a href="{{ route('new.index') }}" class="btn btn-secondary">Grįžti</a>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection