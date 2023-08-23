<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-6 col-lg-5">
                    <h3 class="title">Empresas</h3>
                    <p class="description">Puedes editar los datos de las empresas con <span><img src="{{ asset('images/admin/edit-icon.svg') }}" height="15" alt="editar"></span> o borrarla con <span><img src="{{ asset('images/admin/trash-icon.svg') }}" height="15" alt="borrar"></span>.</p>
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
                        @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                        <div class="col-12 col-md-6 col-lg-4">
                            <a href="{{ route('panel.companies.crud', [ 'id' => 'nuevo' ]) }}" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center">
                                <p class="mb-0 me-2">AGREGAR NUEVA EMPRESA</p>
                                <img src="{{ asset('images/admin/plus-icon.svg') }}" height="15" alt>
                            </a>
                        </div>
                        @endif
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
                                    <th>Logo</th>
                                    <th>Razón Social</th>
                                    <th>R.U.C.</th>
                                    <th>Correo</th>
                                    <th>N° Canchas</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $company)
                                <tr wire:key="row-{{ $company->id }}">
                                    <td>
                                        <x-admin.icons.client types="avatar-table" :photo="$company->photo"/>
                                    </td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->ruc }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->fields_count }}</td>
                                    <td>
                                        @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                                        <div class="form-check form-switch d-flex justify-content-center" wire:click="switchStatus({{ $company->id }})">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" @if ($company->status) checked @endif>
                                        </div>
                                        @else
                                        <div class="form-check form-switch d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" @if ($company->status) checked @endif>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="controls justify-content-center">
                                            <a href="{{ route('panel.companies.crud', [ 'id' => $company->id ]) }}" class="icon">
                                                <x-admin.icons.edit />
                                            </a>
                                            @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
                                            <div class="icon delete" wire:click="deleteCompany({{ $company->id }})">
                                                <x-admin.icons.delete />
                                            </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (array_search(Auth::user()->role, ['dummy','admin','mod']))
    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('deleteListener', companyId => {
                Swal.fire({
                    title: 'Borrar Empresa',
                    text: "¿Estás seguro de querer borrar esta empresa?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                }).then((result) => {
                    if (result.value) {
                        @this.delete(companyId)
                    }
                });
            });
        });
    </script>
    @endif
</main>