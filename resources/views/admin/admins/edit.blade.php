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
              <li class="breadcrumb-item active">Atnaujinti administratorių</li>
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
                <h3 class="card-title">Atnaujinti administratorių</h3>
              </div>
              <form role="form" action="{{ route('admin.update', $user->id) }}" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="PUT"/>
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
                    <input type="text" name="name" class="form-control" id="name" placeholder="Įrašyti vardą..." value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                  </div>
                 <div class="form-group">
                  <label for="email">El. paštas</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Įrašyti el. paštą..."  value="@if (old('email')){{ old('email') }}@else{{ $user->email }}@endif">
                </div>
            
                    <div class="form-group">
                <label class="mb-2">Priskirti rolę</label>
                <div class="row mb-3">
                  @foreach ($roles as $role)
                      <div class="col-lg-12">
                        <div class="checkbox">
                          <label style="font-weight: 500!important"><input type="radio" name="role[]" value="{{ $role->id }}"
                          @foreach ($user->roles as $user_role)
                            @if ($user_role->id == $role->id)
                              checked
                            @endif
                          @endforeach
                        > {{ $role->name }}</label>
                        </div>
                      </div>
                  @endforeach
                </div>
                  <button type="submit" class="btn btn-info">Atnaujinti</button>
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