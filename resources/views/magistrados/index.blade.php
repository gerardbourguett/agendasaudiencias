@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de magistrados</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($magistrados as $magistrado)
            <tr>
                <td>{{ $magistrado->id }}</td>
                <td>{{ $magistrado->nombre }}</td>
                <td>{{ $magistrado->apellido }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection