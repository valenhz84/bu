<!-- Modal Cambiar Estado -->
<div class="modal fade" id="update_status_burequest_{{ $burequest->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mensaje de sistema</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('update_status_burequest', $burequest->id) }}">
            @csrf
            <div class="modal-body">
                <div class="form-group row">
                <label for="shortname" class="col-md-10 col-form-label">
                Actualiza el estado de la tarea {{ $burequest->name }} a:
                </label>
                </div>

                <div class="form-group row">
                <label for="nrol" class="col-md-4 col-form-label text-md-right">Estado:</label>
                <div class="col-md-6">
                <select class="form-control" id="a_status" name="burequest_status">
                    <option value="0">Pendiente</option>
                    <option value="1">Concluido</option>
                </select>
                </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Aceptar</button>
            </div>
            </form>
        </div> <!-- end modal content -->
    </div> <!-- modal-dialog -->
</div> <!-- end modal fade -->