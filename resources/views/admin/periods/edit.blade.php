@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-calendar"></i> Editar periodos <a href="{{ url('admin/periods')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i> Regresar</a></h5>
            <div class="card-body"> <!-- Start card-body -->
              
              @include('layouts.errors')
              
              <form method="POST" action="{{ route('periods.update', $period->id) }}">
                  @method('PATCH')
                  @csrf
                 <div class="form-group row">
                     <label for="fullname" class="col-md-4 col-form-label text-md-right">Nombre completo</label>

                     <div class="col-md-6">
                         <input id="fullname" type="text" class="form-control" name="fullname" value="{{ $period->fullname }}" required autofocus>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="shortname" class="col-md-4 col-form-label text-md-right">Nombre corto</label>

                     <div class="col-md-6">
                         <input id="shortname" type="text" class="form-control" name="shortname" value="{{ $period->shortname }}" required autofocus>
                     </div>
                 </div>
                 
                 <div class="form-group row">
                       <label class="col-md-4 col-form-label text-md-right">Rango</label>
                       <div class="col-md-6">
                         <div class="input-daterange input-group" data-plugin-datepicker>
                           <div class="input-group-prepend">
                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                           <input data-provide="datepicker" data-date-format="yyyy-mm-dd" id="startdate" type="text" class="form-control" name="startdate" value="{{ $period->startdate }}" required autofocus>
                           <div class="input-group-prepend">
                             <div class="input-group-text">a</div>
                           </div>
                           <input data-provide="datepicker" data-date-format="yyyy-mm-dd" id="duedate" type="text" class="form-control" name="duedate" value="{{ $period->duedate }}" required autofocus>
                         </div>
                       </div>
                  </div>
                 <div class="form-group row">
                     <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                     <div class="col-md-6">
                         <textarea class="form-control" id="description" name="description" rows="3">{{ $period->description }}</textarea>
                     </div>
                 </div>
                 <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                       <button type="submit" class="btn btn-success">
                           <i class="fa fa-calendar"></i>
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