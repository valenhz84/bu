@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
              <i class="fa fa-user"></i>  Registrar nuevo usuario <a href="{{ url('admin/users')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i> Regresar</a></h5>
            <div class="card-body"> <!-- Start card-body -->
              
              @include('layouts.errors')

              <form method="POST" action="{{ route('users.update', $user->id) }}">
                  @method('PATCH')
                  @csrf
                <div class="form-group row">
                    <label for="fullname" class="col-md-4 col-form-label text-md-right">Nombre</label>

                    <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="shortname" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="shortname" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="level" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                    <div class="col-md-6">
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $user->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-success">
                          <i class="fa fa-user"></i>
                                  {{ __('Update') }}
                        </button>
                    </div>
                 </div>
              </form>

            </div> <!-- End card-body -->
          </div> <!-- End card -->
      </div>
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection