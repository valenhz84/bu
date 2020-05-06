@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-user"></i> Lista de usuarios <a href="{{ url('admin/users/create')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Nuevo Usuario</a></h5>
            <div class="card-body"> <!-- Start card-body -->
                
              @include('layouts.status')

            <form method="GET" action="" class="form-inline">
                <div class="input-group mb-0">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-success btn-sm" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </form>
            <hr />  
              <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Email</th>
                          <th scope="col">Rol</th>
                          <th scope="col">Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)

                        <tr>
                        <td>{{ $user->firstname ." ". $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td><button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#update_role_{{ $user->id }}"><i class="fas fa-exchange-alt"></i> {{ $user->role->shortname }}</button></td>
                        <td>
                            <div class="float-right">
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Ver</button>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen-square"></i> Editar</a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_user_{{ $user->id }}"><i class="fas fa-trash"></i> Eliminar</button>
                            </div>
                        </td>
                        </tr>

                        @include('admin.users.delete')
                        @include('admin.users.update_role')

                        @endforeach
                    </tbody>
                  </table>
                </div>

            </div> <!-- End card-body -->

            <div class="card-footer">
                <ul class="pagination pagination-sm justify-content-end">
                  {{ $users->appends(['search' => $s_user])->links() }}
                </ul>
            </div> <!-- End card-footer -->

          </div> <!-- End card -->
      </div>
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection