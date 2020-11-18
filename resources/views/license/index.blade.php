@extends('layout')

@section('title', 'Liste license')

@section('content')
    <style>
        table,
        td {
            border: 1px solid #333;
        }

        thead,
        tfoot {
            background-color: #333;
            color: #fff;
        }

    </style>

    <h1>Liste des utilisateur</h1>
    <table>
        <thead>
        <tr>
            <th colspan="9">Toutes les licenses</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($licenses as $license)
            <tr>
                <td>Nom: {{ $license->name }}</td>
                <td>Prix: {{ $license->price }}</td>
                <td>Durée: {{$license->duration}}</td>
                <td>Type de durée: {{$license->duration_type}}</td>
                <td>Mois de début : {{$license->month_start}}</td>
                <td>Jour de début : {{$license->day_start}}</td>
                <td>
                    <form action="{{ route('licenses.destroy', $license->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('licenses.edit', $license->id) }}">
                        <button type="button">Modifier</button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('licenses.show', $license->id) }}">
                        <button type="button">Voir</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
