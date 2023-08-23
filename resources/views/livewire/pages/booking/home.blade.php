<main class="app-main" >
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-7">
                    <h3 class="title">Reservas</h3>
                    <p class="description">Aquí puedes ver los datos de las reservas y exportarlas.</p>
                </div>
                <div class="col-12 col-sm-5">
                    <div class="row">
                        <div class="col-12 col-md-6 d-grid">
                            <button type="button" wire:click="exportExcel" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center mb-3">
                                <p class="mb-0 me-2">EXPORTAR EN EXCEL</p>
                                <img src="{{ asset('images/admin/export-icon.svg') }}" height="15" alt>
                            </button>
                        </div>
                        <div class="col-12 col-md-6 d-grid">
                            <button type="button" wire:click="exportTxt" class="btn btn-primary btn-sm d-flex justify-content-center align-items-center mb-3">
                                <p class="mb-0 me-2">EXPORTAR EN TXT</p>
                                <img src="{{ asset('images/admin/export-icon.svg') }}" height="15" alt>
                            </button>
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
                                    <th>Nombre de Cancha</th>
                                    <th>Dirección</th>
                                    <th>Distrito</th>
                                    <th>Fecha Reserva</th>
                                    <th>Hora Reserva</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($bookings as $book)
                                <tr wire:key="row-{{ $book->id }}">
                                    <td>{{ $book->field->name }}</td>
                                    <td>{{ $book->field->address }}</td>
                                    <td>{{ $book->field->district }}</td>
                                    <td>{{ $book->date->format('d-m-Y') }}</td>
                                    <td>{{ $book->start }} - {{ $book->end }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>