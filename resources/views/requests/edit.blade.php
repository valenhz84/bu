@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-clipboard"></i> Lista de tareas <a href="{{ url('tasks/create')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Nueva tarea</a></h5>
            <div class="card-body"> <!-- Start card-body -->
              
              @include('layouts.status')
              
            </div> <!-- End card-body -->
          </div> <!-- End card -->
      </div>
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection