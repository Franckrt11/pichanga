<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="title">Comentarios</h3>
                    <p class="description">Puedes editar los comentarios con <span><img src="{{ asset('images/admin/edit-icon.svg') }}" height="15" alt="editar"></span> o borrarla con <span><img src="{{ asset('images/admin/trash-icon.svg') }}" height="15" alt="borrar"></span>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-aera table-responsive">
                        <table class="table text-nowrap text-center">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Puntaje</th>
                                    <th>Comentario</th>
                                    <th>Usuario</th>
                                    <th>Cancha</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                                <tr wire:key="row-{{ $comment->id }}">
                                    <td>{{ $comment->score }}</td>
                                    <td>{{ \Str::of($comment->content)->limit(20) }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->field->name }}</td>
                                    <td>
                                        <div class="form-check form-switch d-flex justify-content-center" wire:click="switchStatus({{ $comment->id }})">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" @if ($comment->status) checked @endif>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="controls justify-content-center">
                                            <a href="{{ route('panel.comments.crud', [ 'id' => $comment->id ]) }}" class="icon">
                                                <x-admin.icons.edit />
                                            </a>
                                            <div class="icon delete" wire:click="deleteComment({{ $comment->id }})">
                                                <x-admin.icons.delete />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('deleteListener', commentId => {
                Swal.fire({
                    title: 'Borrar Comentario',
                    text: "¿Estás seguro de querer borrar este comentario?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        @this.delete(commentId)
                    }
                });
            });
        });
    </script>
</main>