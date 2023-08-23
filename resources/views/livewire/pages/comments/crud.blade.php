<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">@if ($typecrud == 'Nuevo') Crear @else Editar @endif Comentario @if ($typecrud != 'Nuevo') / ID: {{ $comment->id }} @endif</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <form class="form-aera" wire:submit.prevent="save">
                        <div class="row mb-3">
                            <label for="score" class="col-3 col-form-label">Puntaje</label>
                            <div class="col-3 col-sm-4">
                                <select class="form-select" id="score" wire:model.defer="data.score">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Nombre</label>
                            <textarea class="form-control" name="content" id="content" wire:model.defer="data.content" rows="6"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <p>Estado</p>
                            </div>
                            <div class="col-9">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" name="status" id="status" wire:model="data.status">
                                    <label class="form-check-label" for="status">{{ $switchLabel }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 gap-sm-5 col-10 mx-auto d-sm-flex col-sm-12 justify-content-sm-center">
                            <button type="button" class="btn btn-primary px-sm-5 delete">Borrar</button>
                            <button type="submit" class="btn btn-primary px-sm-5">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            const deleteBtn = document.querySelector('.delete');

            deleteBtn.addEventListener('click', () => {
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
                        @this.delete()
                    }
                });
            });
        });
    </script>
</main>