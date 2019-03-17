@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> <!-- start card -->
            <h5 class="card-header">
            <i class="fa fa-clipboard"></i> Mis solicitudes <a href="{{ url('requests/create')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Nueva solicitud</a></h5>
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
                            <th scope="col">De</th>
                            <th scope="col">Para</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      @foreach ($burequests as $burequest)
                          <tr>
                            <td><a tabindex="0" class="btn btn-link" role="button" data-toggle="popover" data-trigger="focus" data-content="{{ $burequest->description }}">{{ $burequest->name }}</a></td>
                            <td>{{ BUHUser::get_userfirstname($burequest->from) }}</td>
                            <td>{{ $burequest->user->firstname }}</td>
                            <td><small>{{ date("F jS, Y", strtotime($burequest->created_at)) }}</small></td>
                            @if($burequest->status == 0)
                            <td><span class="badge badge-warning">Pendiente</span></td>
                            @else
                            <td><span class="badge badge-success">Concluido</span></td>
                            @endif
                            <td>
                              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#update_status_burequest_{{ $burequest->id }}"
                              @if(Auth::id() == $burequest->user->id)
                              disabled
                              @endif
                                ><i class="fas fa-exchange-alt"></i> Actualizar</button>

                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_burequest_{{ $burequest->id }}"
                              @if(Auth::id() == $burequest->user->id)
                              disabled
                              @endif
                                ><i class="fas fa-trash-alt"></i> Eliminar</button>
                              </td>
                          </tr>

                          @include('requests.status')
                          @include('requests.delete')

                          @endforeach
                    </tbody>
                  </table>
              </div>

            </div> <!-- End card-body -->

            <div class="card-footer bg-transparent">
                <ul class="pagination pagination-sm justify-content-end">
                    {{ $burequests->appends(['search' => $s_burequest])->links() }}
               </ul>
            </div> <!-- End card-footer -->

          </div> <!-- End card -->
      </div>
    </div> <!-- End Row -->
  </div> <!-- End col-md-10-->
@endsection