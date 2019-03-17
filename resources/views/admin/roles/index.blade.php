@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
                <i class="fas fa-dice-two"></i> Lista de Roles <a href="{{ url('admin/roles/create')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Nuevo Rol</a></h5>
            <div class="card-body"> <!-- Start card-body -->
                
              @include('layouts.status')
                
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($roles as $role)
                      <tr>
                      <td>{{ $role->fullname }}</td>
                      <td>{{ $role->level }}</td>
                      <td>
                      <div class="float-right">
                          <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button>
                      <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen-square"></i> Editar</a>
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_role_{{ $role->id }}"><i class="fas fa-trash"></i> Eliminar</button>
                      </div>
                      </td>
                      </tr>

                      @include('admin.roles.delete')

                      @endforeach
                    </tbody>
                </table>
                </div> <!-- End table-responsive -->

            </div> <!-- End card-body -->
          </div> <!-- End card -->
      </div> <!-- End col-md-12 -->
    
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection