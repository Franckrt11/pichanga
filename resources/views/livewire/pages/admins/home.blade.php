<main class="app-main" >
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-8 col-xl-9 col-xxl-10">
                    <h3 class="title">Administradores</h3>
                    <p class="description">Puedes editar los datos de los administradores con <span><img src="{{ asset('images/admin/edit-icon.svg') }}" height="15" alt="editar"></span> o borrarla con <span><img src="{{ asset('images/admin/trash-icon.svg') }}" height="15" alt="borrar"></span>.</p>
                </div>
                <div class="col-12 col-sm-5 col-md-4 col-xl-3 col-xxl-2">
                    <a href="{{ route('panel.admins.crud', [ 'id' => 'nuevo' ]) }}" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center">
                        <p class="mb-0 me-2">AGREGAR ADMINISTRADORES</p>
                        <img src="{{ asset('images/admin/plus-icon.svg') }}" height="15" alt>
                    </a>
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
                                    <th>Usuario</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($admins as $admin)
                                <tr wire:key="row-{{ $admin->id }}">
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->roleString() }}</td>
                                    <td>
                                        <div class="controls justify-content-center">
                                            <a href="{{ route('panel.admins.crud', [ 'id' => $admin->id ]) }}" class="icon">
                                                <x-admin.icons.edit />
                                            </a>
                                            <div class="icon delete" wire:click="deleteAdmin({{ $admin->id }})">
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
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('deleteListener', adminId => {
                Swal.fire({
                    title: 'Borrar Administrador',
                    text: "¿Estás seguro de querer borrar este administrador?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        @this.delete(adminId)
                    }
                });
            });
        });
    </script>
</main>