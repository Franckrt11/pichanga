<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-6 col-lg-5">
                    <h3 class="title">Clientes</h3>
                    <p class="description">Puedes editar los datos de los clientes con <span><img src="{{ asset('images/admin/edit-icon.svg') }}" height="15" alt="editar"></span> o borrarla con <span><img src="{{ asset('images/admin/trash-icon.svg') }}" height="15" alt="borrar"></span>.</p>
                </div>
                <div class="col-12 col-sm-5 col-md-6 col-lg-7">
                    <div class="row justify-content-sm-end">
                        <div class="col-12 col-md-6 col-lg-4 d-grid">
                            <button type="button" wire:click="exportExcel" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center mb-3">
                                <p class="mb-0 me-2">EXPORTAR EN EXCEL</p>
                                <img src="{{ asset('images/admin/export-icon.svg') }}" height="15" alt>
                            </button>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-grid">
                            <button type="button" wire:click="exportTxt" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center mb-3">
                                <p class="mb-0 me-2">EXPORTAR EN TXT</p>
                                <img src="{{ asset('images/admin/export-icon.svg') }}" height="15" alt>
                            </button>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" wire:model.defer="search" placeholder="Buscar">
                                <button class="btn btn-primary" type="button" wire:click="doSearch">
                                    <img src="{{ asset('images/admin/search-icon.svg') }}" height="15" alt>
                                </button>
                            </div>
                        </div>
                    </div>
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
                                    <th>Foto</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>F. Nacimiento</th>
                                    <th>Sexo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr wire:key="row-{{ $user->id }}">
                                    <td><x-admin.icons.client types="avatar-table" :photo="$user->photo"/></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->birth->format('d-m-Y') }}</td>
                                    <td>{{ $user->sexString() }}</td>
                                    <td>
                                        <div class="controls justify-content-center">
                                            <a href="{{ route('panel.users.crud', [ 'id' => $user->id ]) }}" class="icon">
                                                <x-admin.icons.edit />
                                            </a>
                                            <div class="icon delete" wire:click="deleteClient({{ $user->id }})">
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('deleteListener', cliendId => {
                Swal.fire({
                    title: 'Borrar Cliente',
                    text: "¿Estás seguro de querer borrar este cliente?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        @this.delete(cliendId)
                    }
                });
            });
        });
    </script>
</main>