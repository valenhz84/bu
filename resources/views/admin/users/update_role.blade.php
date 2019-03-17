<!-- Modal Cambiar Rol -->
<div class="modal fade" id="update_role_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mensaje de sistema</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
              <label for="shortname" class="col-md-12 col-form-label">
              ¿Deseas modificar el rol del usuario {{ $user->firstname . " " . $user->lastname }} ?
              </label>
            </div>
              
              <form method="POST" action="{{ route('update_role', $user->id) }}">
                @csrf
              <div class="form-group row">
              <label for="nrol" class="col-md-4 col-form-label text-md-right">Nuevo rol</label>
              <div class="col-md-8">
              <select class="form-control" id="roleid" name="roleid">
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->shortname }}</option>
                @endforeach
              </select>
              </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-info">Aceptar</button>
            </div>
            </form>
          </div> <!-- end modal content -->
        </div> <!-- modal-dialog -->
      </div> <!-- end modal fade -->