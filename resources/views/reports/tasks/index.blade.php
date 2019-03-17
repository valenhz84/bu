@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-file"></i> Generador de reportes <a href="{{ url('tasks/create')}}" class="btn btn-success btn-sm float-right disabled"><i class="fas fa-plus"></i> Nueva reporte</a></h5>
            <div class="card-body"> <!-- Start card-body -->
              
              @include('layouts.errors')
            
              <form method="POST" action="{{ route('reports_tasks_store') }}">
                  @csrf
                 <div class="form-group row">
                       <label class="col-md-4 col-form-label text-md-right">Rango</label>
                       <div class="col-md-6">
                         <div class="input-daterange input-group" data-plugin-datepicker>
                           <div class="input-group-prepend">
                             <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                           <input data-provide="datepicker" data-date-format="yyyy-mm-dd" id="startdate" type="text" class="form-control" name="startdate" value="{{ old('startdate') }}">
                           <div class="input-group-prepend">
                             <div class="input-group-text">a</div>
                           </div>
                           <input data-provide="datepicker" data-date-format="yyyy-mm-dd" id="duedate" type="text" class="form-control" name="duedate" value="{{ old('duedate') }}">
                         </div>
                       </div>
                  </div>
                 
                 <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                       <button type="submit" class="btn btn-success">
                           <i class="fa fa-file"></i>
                                   {{ __('Generator') }}
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