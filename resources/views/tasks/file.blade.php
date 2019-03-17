<div class="card">
        <div class="card-body">
            <p class="card-text">
            <form method="POST" action="{{ route('tasks_files_store', $task->id) }}" class="was-validated" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="validatedCustomFile" aria-describedby="inputGroupFileAddon04" required>
                      <label class="custom-file-label" for="inputGroupFile04">Elige tu archivo</label>
                    </div>
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-outline-success" type="button" id="inputGroupFileAddon04">Enviar</button>
                    </div>
                </div>
            </form>
            <hr />
            <table class="table table-sm table-striped">
                <tbody>
                @foreach($files as $file)
                <tr>
                <td><a href="{{ asset('/storage/'.$file->path) }}" target="_blank">{{ $file->name }}</a><sub><span class="badge badge-light">{{ date("F jS, Y", strtotime($file->created_at)) }}</span></sub></td>
                <td><span class="badge badge-info">{{ $file->user->firstname}}</span></td>
                <td>
                  @if(Auth::user()->id == $file->user->id)
                <form method="POST" action="{{ route('tasks_files_destroy', $file->id) }}">
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