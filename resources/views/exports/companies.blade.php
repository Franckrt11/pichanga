<table>
    <thead>
    <tr>
        <th>Razón Social</th>
        <th>R.U.C.</th>
        <th>Correo</th>
        <th>N° Canchas</th>
        <th>Estado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->ruc }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->fields_count }}</td>
            <td>{{ ($company->status) ? 'Habilitado' : 'Inhabilitado' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>