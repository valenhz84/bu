<!-- Modal Eliminar -->
<div class="modal fade" id="delete_task_{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mensaje de sistema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar la tarea {{ $task->name }} ?
            </div>
            <div class="modal-footer">
            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
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