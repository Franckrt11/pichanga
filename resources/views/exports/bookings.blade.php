<table>
    <thead>
    <tr>
        <th>Nombre de Cancha</th>
        <th>Dirección</th>
        <th>Distrito</th>
        <th>Fecha Reserva</th>
        <th>Hora Reserva</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bookings as $book)
        <tr>
            <td>{{ $book->field->name }}</td>
            <td>{{ $book->field->address }}</td>
            <td>{{ $book->field->district }}</td>
            <td>{{ $book->date->format('d-m-Y') }}</td>
            <td>{{ $book->start }} - {{ $book->end }}</td>
        </tr>
    @endforeach
    </tbody>
</table>