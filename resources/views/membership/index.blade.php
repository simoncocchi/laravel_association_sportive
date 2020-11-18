@extends('layout')

@section('title', 'Liste membership')

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

    <h1>Liste des adhésions</h1>
    <table>
        <thead>
        <tr>
            <th colspan="9">Toutes les licenses</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($memberships as $membership)
            <tr>
                <td>Id utilisateur: {{ $membership->user_id }}</td>
                <td>Id license: {{ $membership->license_id }}</td>
                <td>Type de paiment: {{$membership->payment_type}}</td>
                <td>Prix: {{$membership->price}}</td>
                <td>Date de début : {{$membership->date_start}}</td>
                <td>Date de fin : {{$membership->date_end}}</td>
                <td>
                    <form action="{{ route('memberships.destroy', $membership->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('memberships.edit', $membership->id) }}">
                        <button type="button">Modifier</button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('memberships.show', $membership->id) }}">
                        <button type="button">Voir</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
