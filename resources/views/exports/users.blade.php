<table>
    <thead>
    <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>F. Nacimiento</th>
        <th>Sexo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->birth->format('d-m-Y') }}</td>
            <td>{{ $user->sexString() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>