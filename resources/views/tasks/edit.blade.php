@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-clipboard"></i> Editar tarea <a href="{{ url('/tasks')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i> Regresar</a></h5>
            <div class="card-body"> <!-- Start card-body -->
            
              @include('layouts.errors')
              
              <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                  @method('PATCH')
                  @csrf
                  <div class="form-group row">
                   <label for="activitieid" class="col-md-4 col-form-label text-md-right">Actividad</label>

                   <div class="col-md-6">
                      <select class="form-control" id="activitieid" name="activitieid">
                        <option value="{{ $task->activitie->id }}">{{ $task->activitie->fullname }}</option>
                      </select>
                  </div>
                 </div>
                 <div class="form-group row">
                     <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                     <div class="col-md-6">
                         <input id="name" type="text" class="form-control" name="name" value="{{ $task->name }}" required autofocus>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                     <div class="col-md-6">
                         <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                     </div>
                 </div>
                 <div class="form-group row">
                   <label for="solution" class="col-md-4 col-form-label text-md-right">Solución</label>

                   <div class="col-md-6">
                       <textarea class="form-control" id="solution" name="solution" rows="3">{{ $task->solution }}</textarea>
                   </div>
               </div>
                 <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                       <button type="submit" class="btn btn-success"
                       @if(Auth::user()->id != $task->user->id)
                        disabled
                        @endif
                       >
                           <i class="fa fa-clipboard"></i>
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