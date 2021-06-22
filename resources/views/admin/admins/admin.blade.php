@extends('admin.layouts.app')

@section('main-content')
 <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administratoriai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Pridėti administratorių</li>
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
                <h3 class="card-title">Pridėti administratorių</h3>
              </div>
              <form role="form" action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="name">Administratoriaus vardas</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Įrašyti vardą..." value="{{ old('name') }}">
                  </div>
                 <div class="form-group">
                  <label for="email">El. paštas</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Įrašyti el. paštą..." value="{{ old('email') }}">
                </div>
             <div class="form-group">
                  <label for="password">Slaptažodis</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Įrašyti slaptažodį...">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">Pakartoti slaptažodį</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Pakartoti slaptažodį...">
                </div>
                    <div class="form-group">
                <label class="mb-2">Priskirti rolę</label>
                <div class="row mb-3">
                    @foreach(Auth::user()->roles as $role)
            @if ( $role->id == 1)
                  @foreach ($roles as $role)
                      <div class="col-lg-12">
                        <div class="checkbox">
                          <label style="font-weight: 500!important"><input type="radio" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                        </div>
                      </div>
                  @endforeach
                  @endif
                  @endforeach
                  @foreach(Auth::user()->roles as $role)
            @if ( $role->id == 2)
                  @foreach ($roles as $role)
                  @if($role->id > 1)
                      <div class="col-lg-12">
                        <div class="checkbox">
                          <label style="font-weight: 500!important"><input type="radio" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                        </div>
                      </div>
                  @endif
                  @endforeach
                  @endif
                  @endforeach
                </div>
                  <button type="submit" class="btn btn-info">Pridėti</button>
                  <a href="{{ route('admin.index') }}" class="btn btn-secondary">Grįžti</a>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection