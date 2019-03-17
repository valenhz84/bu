@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">

        <div class="row"> <!-- start row-->
        <div class="col-md-7">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
              <i class="fa fa-clipboard"></i>  Tarea: {{ $task->name }} <a href="{{ url('/')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i> Regresar</a></h5>
            <div class="card-body"> <!-- Start card-body -->
              
              @include('layouts.status')  
              @include('layouts.errors')
            
              <p class="card-text">
                  @if($task->status == 1)
                  <span class="badge badge-success">Concluido</span>
                  @else
                  <span class="badge badge-warning">Pendiente</span>
                  @endif
             <span class="badge badge-info">{{ $task->user->firstname  }}</span>
             <span class="badge badge-light">{{ date("F jS, Y", strtotime($task->updated_at))  }}</span></p>

             <h5 class="card-title">{{ $task->activitie->fullname ." : ". $task->name }}</h5>
            <h5 class="card-title">Descripción</h5>
            <p class="card-text">{{ $task->description }}</p>
            <h5 class="card-title">Solución</h5>
            <p class="card-text">{{ $task->solution }}</p>


            </div> <!-- End card-body -->

            <div class="card-footer">
                <div class="float-right">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_status_task_{{ $task->id }}"
                        @if(Auth::user()->id != $task->user->id)
                        disabled
                        @endif
                      ><i class="fas fa-exchange-alt"></i> Estado</button>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm
                        @if(Auth::user()->id != $task->user->id)
                        disabled
                        @endif
                      "><i class="fas fa-edit"></i> Editar</a>
                </div>
            </div>

            @include('tasks.status')
          </div> <!-- End card -->
          <hr />
        </div>
        
        <div class="col-md-5">

            @include('tasks.file')

            <hr />

            @include('tasks.comment')

            <hr />
        </div>

        </div> <!-- End row -->

      </div>
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection