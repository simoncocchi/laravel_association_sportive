@extends('layout')

@section('title', 'Liste utilisateur')

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
    <form method="get" action="{{ route('search') }}">
        <label for="searchinput">Filtrer les utilisateurs:</label>
        <select name="type" id="type">
            <option value="name">name</option>
            <option value="email">email</option>
            <option value="firstname">firstname</option>
        </select>
        <input type="searchinput" id="searchinput" name="searchinput">
        <button>Filtrer</button>
    </form>
    <br/>
    <table>
        <thead>
        <tr>
            <th colspan="12">Tout les utilisateurs</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            <tr>
                <td>Nom: {{ $user->name }}</td>
                <td>Prénom: {{ $user->firstname }}</td>
                <td>Email: {{$user->email}}</td>
                <td>Téléphone: {{$user->phone}}</td>
                <td>Adress : {{$user->address_line_1}}</td>
                <td>Adress Complémentaire : {{$user->address_line_2}}</td>
                <td>Code Postale: {{$user->zipcode}}</td>
                <td>Ville: {{$user->city}}</td>
                <td>Administrateur: {{$user->is_admin}}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}">
                        <button type="button">Modifier</button>
                    </a>
                </td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}">
                        <button type="button">Voir</button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
