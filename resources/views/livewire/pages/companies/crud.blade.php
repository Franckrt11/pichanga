<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">@if ($typecrud == 'Nuevo') Crear @else Editar @endif Empresa @if ($typecrud != 'Nuevo') / ID: {{ $company->id }} @endif</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <form class="form-aera" wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="name" class="form-label">Razón social</label>
                            <input type="text" name="name" id="name" class="form-control" wire:model.defer="data.name" required>
                        </div>
                        <div class="mb-3">
                            <label for="ruc" class="form-label">R.U.C.</label>
                            <input type="tel" name="ruc" id="ruc" class="form-control" wire:model.defer="data.ruc" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" wire:model.defer="data.email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" wire:model.defer="data.password" @if ($typecrud == 'Nuevo') required @else disabled @endif>
                        </div>
                        @if ($typecrud == 'Nuevo')
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Repetir contraseña</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" wire:model.defer="data.confirm_password" required>
                        </div>
                        @endif
                        @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                        <div class="d-grid gap-3 d-md-flex mt-4">
                            @if ($typecrud != 'Nuevo')
                            <button type="button" class="btn btn-primary flex-md-fill px-0" wire:click="resetPassword">Resetear contraseña</button>
                            @endif
                            <button type="submit" class="btn btn-primary flex-md-fill">Guardar</button>
                        </div>
                        @endif
                    </form>
                </div>
                @if ($typecrud != 'Nuevo')
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Canchas</h3>
                        @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                        <a href="{{ route('panel.companies.field', [ 'id' => $company->id, 'fid' => 'nuevo' ]) }}" class="btn btn-primary btn-sm px-4">
                            AGREGAR CANCHA
                        </a>
                        @endif
                    </div>
                    @foreach ($fields as $field)
                    <div class="d-flex mb-4">
                        <div class="avatar avatar-crud-sm me-4" wire:ignore>
                            @if($field->portrait == NULL)
                            <img src="{{ asset('images/admin/client-icon.svg') }}" id="avatar-img" alt>
                            @else
                            <img src="{{ asset('storage/fields/'.$field->portrait) }}" id="avatar-img" alt>
                            @endif
                        </div>
                        <div>
                            <h4>{{ $field->name }}</h4>
                            <div class="controls mt-3">
                                <a href="{{ route('panel.companies.field', [ 'id' => $company->id, 'fid' => $field->id ]) }}" class="icon">
                                    <p class="mb-0 me-1">Editar</p>
                                    <x-admin.icons.edit />
                                </a>
                                @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                                <div class="icon delete" data-id="{{ $field->id }}">
                                    <p class="mb-0 me-1">Borrar</p>
                                    <x-admin.icons.delete />
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
    <script>
        document.addEventListener('livewire:load', () => {
            const deleteBtns = document.querySelectorAll('.delete');

            deleteBtns.forEach(btn => {
                const id = btn.dataset.id;

                btn.addEventListener('click', () => {
                    Swal.fire({
                        title: 'Borrar Cancha',
                        text: "¿Estás seguro de querer borrar esta cancha?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si'
                    }).then((result) => {
                        if (result.value) {
                            @this.deleteField(id)
                        }
                    });
                });
            });
        });
    </script>
    @endif
</main>