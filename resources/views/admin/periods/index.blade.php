@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-calendar"></i> Lista de Periodos <a href="{{ url('admin/periods/create')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Nuevo Periodo</a></h5>
            <div class="card-body"> <!-- Start card-body -->
            
              @include('layouts.status')
              
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead class="thead-light">
                        <tr>
                            <th scope="col">Activo</th>
                            <th scope="col">N. Completo</th>
                            <th scope="col">N. Corto</th>
                            <th scope="col">F. Inicio</th>
                            <th scope="col">F. Fin</th>
                            <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($periods as $period)
                      <tr>
                      <td>
                          <form id="fp_active_{{$period->id}}" method="GET" action="{{ route('update_active',$period->id) }}">
                              <div class="custom-control custom-switch">
                              <input type="checkbox" name="active" class="custom-control-input" onChange="$('#fp_active_{{ $period->id }}').submit();" id="active_{{ $period->id }}" 
                              
                              @if($period->active==1)
                              checked
                              @endif
                              >
                                <label class="custom-control-label" for="active_{{ $period->id }}"></label>
                              </div>
                          </form>
                      </td>
                      <td>{{ $period->fullname }}</td>
                      <td>{{ $period->shortname }}</td>
                      <td>{{ $period->startdate }}</td>
                      <td>{{ $period->duedate }}</td>
                      <td>
                          <div class="float-right">
                              <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button>
                          <a href="{{ route('periods.edit', $period->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen-square"></i> Editar</a>
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_period_{{ $period->id }}"><i class="fas fa-trash"></i> Eliminar</button>
                          </div>
                      </td>
                      </tr>

                      @include('admin.periods.delete')

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