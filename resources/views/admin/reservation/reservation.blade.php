@extends('admin.layouts.app')<!-- comment -->

@section('main-content')<!-- comment -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rezervacijos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagrindinis</a></li>
              <li class="breadcrumb-item active">Sukurti rezervaciją</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Sukurti rezervaciją</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form" action="{{ route('reservation.store') }}" method="post" enctype="multipart/form-data">
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
                            <label>Pasirinkti paslaugą</label>
                            <select class="custom-select" name="services[]">
                          @foreach ($services as $service)
                          <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                          @endforeach
                        </select>
                       </div>
                      <div class="form-group">
                            <label>Pasirinkti administratorių</label>
                            <select class="custom-select" name="admins[]">
                          @foreach ($admins as $admin)
                          <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                          @endforeach
                        </select>
                       </div>
                    <div class="form-group">
                    <label>Data:</label>
                    <div class="input-group date" id="reservationdate">
                        <input type="date" class="form-control" name="service_date"/>
                    </div>
                  </div>
                    <div class="form-group">
                    <label>Laikas nuo:</label>
                    <div class="input-group date" id="reservationdate">
                        <input type="time" id="appt" name="service_time_from" min="09:00" max="18:00" class="form-control">
                    </div>
                  </div>
                    <div class="form-group">
                    <label>Laikas iki:</label>
                    <div class="input-group date" id="reservationdate">
                        <input type="time" id="appt" name="service_time_to" min="09:00" max="18:00" class="form-control">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info">Sukurti</button>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection