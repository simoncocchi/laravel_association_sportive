@extends('layout')

@section('title', 'Créer un compte')

@section('content')
    <h1>Page créer un compte</h1>
    <form method="POST" action="{{route('user.store')}}">

        @csrf
        <label for="name">Nom:</label><br/>
        <input type="text" id="name" name="name" required size="25"> @error('title') <p>Champs incorrect</p> @enderror<br/>
        <label for="firstname">Prenom:</label><br/>
        <input type="text" id="firstname" name="firstname" required size="25">@error('firstname') <p>Champs incorrect</p> @enderror<br/>
        <label for="email">Email:</label><br/>
        <input type="email" id="email" name="email" required size="25">@error('email') <p>{{$messages}}</p> @enderror<br/>
        <label for="password">Password:</label><br/>
        <input type="password" id="password" name="password" required size="25">@error('password') <p>Champs incorrect</p> @enderror<br/>
        <label for="phone">Télephone:</label><br/>
        <input type="text" id="phone" name="phone" size="25">@error('phone') <p>Champs incorrect</p> @enderror<br/>
        <label for="address">Address:</label><br/>
        <input type="text" id="address" name="address" required size="25">@error('address_line_1') <p>Champs incorrect</p> @enderror<br/>
        <label for="addressComp">Address complémentaire:</label><br/>
        <input type="text" id="addressComp" name="addressComp" size="25">@error('address_line_2') <p>Champs incorrect</p> @enderror<br/>
        <label for="zipcode">Code Postal:</label><br/>
        <input type="text" id="zipcode" name="zipcode" required size="25">@error('zipcode') <p>Champs incorrect</p> @enderror<br/>
        <label for="city">Ville:</label><br/>
        <input type="text" id="city" name="city" required size="25">@error('city') <p>Champs incorrect</p> @enderror<br/>
        <button>Enregistrer</button>
    </form>
@endsection
