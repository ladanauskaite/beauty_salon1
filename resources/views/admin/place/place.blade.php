@extends('admin.layouts.app')

@section('main-content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paslaugų vietos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Sukurti vietą</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Sukurti vietą</h3>
              </div>
                
              <form role="form" action="{{ route('place.store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="address">Vietos adresas</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Įrašyti paslaugos pavadinimą...">
                       </div>
                       <button type="submit" class="btn btn-info">Sukurti</button>
                       <a href="{{ route('place.index') }}" class="btn btn-secondary">Grįžti</a>
                    </div>
              </form>
            </div>
        </div>
      </div>
      </div>
    </section>
  </div>
@endsection