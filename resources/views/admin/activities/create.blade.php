@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
                <i class="fa fa-briefcase"></i> Registrar nueva actividad <a href="{{ url('admin/activities')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i> Regresar</a></h5>
            <div class="card-body"> <!-- Start card-body -->
              @include('layouts.errors')

              <form method="POST" action="{{ route('activities.store') }}">
                  @csrf
                 <div class="form-group row">
                     <label for="fullname" class="col-md-4 col-form-label text-md-right">Nombre completo</label>

                     <div class="col-md-6">
                         <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="shortname" class="col-md-4 col-form-label text-md-right">Nombre corto</label>

                     <div class="col-md-6">
                         <input id="shortname" type="text" class="form-control" name="shortname" value="{{ old('shortname') }}" required autofocus>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                     <div class="col-md-6">
                         <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                     </div>
                 </div>
                 <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                       <button type="submit" class="btn btn-success">
                           <i class="fa fa-briefcase"></i>
                                   {{ __('Register') }}
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