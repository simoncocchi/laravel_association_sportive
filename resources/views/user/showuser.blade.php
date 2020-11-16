@extends('layout')

@section('title', 'Voir un utilisateur utilisateur')

@section('content')
    <div>
        <p>
            name: {{ $user->name }}
        </p>
        <p>
            firstname: {{ $user->firstname }}
        </p>
        <p>
            email: {{ $user->email }}
        </p>
    </div>

@endsection
