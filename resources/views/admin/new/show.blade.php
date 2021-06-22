  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

@extends('admin.layouts.app')

@section('main-content')
 <div class="content-wrapper">
    <section class="content-header pb-0">
      <div class="container-fluid">
        <div class="row mb-1">
          <div class="col-sm-6">
            <h1 class="d-inline-block mb-0">Naujienos</h1>
            <a href="{{ route('new.create') }}" class="btn btn-sm btn-dark mb-2 ml-3">Pridėti naujieną</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Naujienos</li>
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
                  <h5 class="mb-0">Naujienų sąrašas </h5>
              </div>
               <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                  <tr>
                    <th>ID</th>
                    <th>Paslaugos pavadinimas</th>
                    <th>Paslaugos aprašymas</th>
                    <th>Paslaugos nuotrauka</th>
                    <th>Sukurtas</th>
                    <th>Atnaujinta</th>
                    <th>Koreguoti</th>
                    <th>Ištrinti</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($news as $new)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $new->news_name }}</td>
                    <td>{{ $new->news_text }}</td>
                     <td>{{ $new->news_photo }}</td>
                    <td>{{ $new->created_at }}</td>
                    <td>{{ $new->updated_at }}</td>
                    <td>
                        <a href="{{ route('new.edit', $new->id) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                    </td>
                    <td>
                        <form id="delete-form-{{$new->id}}" method="post" action="{{ route('new.destroy', $new->id) }}" style="display: none;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE"/>
                        </form>
                        <a href="" class="btn btn-danger btn-sm" onclick="
                            if(confirm('Ar tikrai?')) {
                                event.preventDefault();
                                document.getElementById('delete-form-{{$new->id}}').submit();
                           }
                           else {
                               event.preventDefault();
                           }
                           ">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection


