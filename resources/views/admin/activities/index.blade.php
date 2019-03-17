@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-briefcase"></i>  Lista de actividades <a href="{{ url('admin/activities/create')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Nueva actividad</a></h5>
            <div class="card-body"> <!-- Start card-body -->
                
              @include('layouts.status')

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nombre corto</th>
                            <th scope="col">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach ($activities as $activitie)
                        <tr>
                        <td>{{ $activitie->fullname }}</td>
                        <td>{{ $activitie->shortname }}</td>
                        <td>
                            <div class="float-right">
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button>
                            <a href="{{ route('activities.edit', $activitie->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen-square"></i> Editar</a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_activitie_{{ $activitie->id }}"><i class="fas fa-trash"></i> Eliminar</button>
                            </div>
                        </td>
                        </tr>

                        @include('admin.activities.delete')

                      @endforeach
                        </tbody>
                    </table>
                </div>

            </div> <!-- End card-body -->
          </div> <!-- End card -->
      </div>
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection