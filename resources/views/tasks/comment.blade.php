<div class="card">
        <div class="card-body">
            <p class="card-text">
            <form method="POST" action="{{ route('tasks_comments_store', $task->id) }}" class="was-validated">
              @csrf
              <div class="input-group">
                  <textarea class="form-control is-invalid" id="comment" name="comment" placeholder="Agrega un comentario" required></textarea>
                  <div class="input-group-append">
                      <button type="submit" class="btn btn-outline-success" type="button" id="inputGroupFileAddon04">Enviar</button>
                    </div>
              </div>
            </form>
            <hr />
            <table class="table table-sm table-striped">
            <tbody>
                @foreach($comments as $comment)
                <tr>
                <td>{{ $comment->comment }} 
                    <sub><span class="badge badge-light">{{ date("F jS, Y", strtotime($comment->created_at)) }}</span></sub>
                </td>
                <td><span class="badge badge-info">{{ $comment->user->firstname}}</span></td>
                <td>
                  @if(Auth::user()->id == $comment->user->id)
                <form method="POST" action="{{ route('tasks_comments_destroy', $comment->id) }}">
                    @csrf
                    <button type="submit" class="close" aria-label="Close">
                    <span class="badge badge-dark" aria-hidden="true">&times;</span>
                    </button>
                </form>
                @endif
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </p>
        </div>
</div>