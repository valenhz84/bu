<!-- Modal Eliminar -->
<div class="modal fade" id="delete_period_{{ $period->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mensaje de sistema</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Deseas eliminar el periodo {{ $period->shortname }} ?
        </div>
        <div class="modal-footer">
            <form method="POST" action="{{ route('periods.destroy', $period->id) }}">
            @method('DELETE')
            @csrf

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger">Aceptar</button>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- end Modal-->