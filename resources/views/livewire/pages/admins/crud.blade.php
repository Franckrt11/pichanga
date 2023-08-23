<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="mb-0">@if ($typecrud == 'Nuevo') Crear @else Editar @endif Administrador @if ($typecrud != 'Nuevo') / ID: {{ $admin->id }} @endif</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5">
                    <form class="form-aera" wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" name="name" id="name" class="form-control" wire:model.defer="data.name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" wire:model.defer="data.email" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Roles</label>
                            <select class="form-select" name="role" id="role" wire:model.defer="data.role" required>
                                <option value="" disabled selected> --- </option>
                                <option value="admin">Administrador</option>
                                <option value="mod">Moderador</option>
                                <option value="data">Analista de data</option>
                            </select>
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
                        <div class="d-grid gap-3 d-md-flex mt-4">
                            @if ($typecrud != 'Nuevo')
                            <button type="button" class="btn btn-primary flex-md-fill px-0" wire:click="resetPassword">Resetear contraseña</button>
                            @endif
                            <button type="submit" class="btn btn-primary flex-md-fill">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-6 col-xl-7">
                   <h3 class="mb-4">Información de Roles</h4>
                    <div class="mb-4">
                        <h4>Administrador</h4>
                        <p>Acceso a todas las funciones del servidor.</p>
                    </div>
                    <div class="mb-4">
                        <h4>Moderador</h4>
                        <p>Acceso a las funciones y data de clientes, empresas y comentarios.</p>
                    </div>
                    <div class="mb-4">
                        <h4>Analista de data</h4>
                        <p>Acceso solo a la data de canchas y reservas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>