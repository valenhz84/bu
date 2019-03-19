@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">

        <div class="row"> <!-- start row-->
        <div class="col-md-7">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
              <i class="fa fa-clipboard"></i>  Tarea: {{ $assignment->name }} <a href="{{ url('admin/assignments')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i> Regresar</a></h5>
            <div class="card-body"> <!-- Start card-body -->
              @include('layouts.status')  
              @include('layouts.errors')
            
              <p class="card-text">
                  @if($assignment->status == 1)
                  <span class="badge badge-success">Concluido</span>
                  @else
                  <span class="badge badge-warning">Pendiente</span>
                  @endif
             <span class="badge badge-info">{{ $assignment->user->firstname  }}</span>
             <span class="badge badge-light">{{ date("F jS, Y", strtotime($assignment->updated_at))  }}</span></p>

             <h5 class="card-title">{{ $assignment->activitie->fullname ." : ". $assignment->name }}</h5>
            <h5 class="card-title">Descripción</h5>
            <p class="card-text">{!! $assignment->description !!}</p>
            <h5 class="card-title">Solución</h5>
            <p class="card-text">{!! $assignment->solution !!}</p>


            </div> <!-- End card-body -->

            <div class="card-footer">
                <div class="float-right">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_assignment_{{ $assignment->id }}" disabled><i class="fas fa-exchange-alt"></i> Estado</button>
                    <a href="{{ route('assignments.edit', $assignment->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                </div>
            </div>
          </div> <!-- End card -->
        </div>

        <div class="col-md-5">
            <div class="card">
              <div class="card-body">
              <a href="{{ route('notifications_store', $assignment->user->id) }}" class="btn btn-success btn-sm float-right">Notificar a {{ $assignment->user->firstname }}</a>
              </div>
            </div>
            <hr />

            @include('admin.assignments.file')

            <hr />

            @include('admin.assignments.comment')

            <hr />
        </div>

        </div> <!-- End row -->

      </div>
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection