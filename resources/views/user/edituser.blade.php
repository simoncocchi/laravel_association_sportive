@extends('layout')

@section('title', 'Editer un utilisateur utilisateur')

@section('content')
<h1>Editer user {{ $user->id }}</h1>
<form action="{{route('users.update', $user)}}" method="Post">
    @csrf
    @method('put')
    <label for="name">Nom:</label><br/>
    <input type="text" id="name" name="name" required size="25" value="{{ old('name', $user->name) }}"> @error('title') <p>Champs incorrect</p> @enderror<br/>
    <label for="firstname">Prenom:</label><br/>
    <input type="text" id="firstname" name="firstname" required size="25" value="{{ old('firstname', $user->firstname) }}">@error('firstname') <p>Champs incorrect</p> @enderror<br/>
    <label for="email">Email:</label><br/>
    <input type="email" id="email" name="email" required size="25" value="{{ old('email', $user->email) }}">@error('email') <p>Champs incorrect</p> @enderror<br/>
    <label for="password">Password:</label><br/>
    <input type="password" id="password" name="password" required size="25" value="{{ old('password', $user->password) }}">@error('password') <p>Champs incorrect</p> @enderror<br/>
    <label for="phone">Télephone:</label><br/>
    <input type="text" id="phone" name="phone" size="25" value="{{ old('phone', $user->phone) }}">@error('phone') <p>Champs incorrect</p> @enderror<br/>
    <label for="address">Address:</label><br/>
    <input type="text" id="address" name="address" required size="25" value="{{ old('address', $user->address_line_1) }}">@error('address_line_1') <p>Champs incorrect</p> @enderror<br/>
    <label for="addressComp">Address complémentaire:</label><br/>
    <input type="text" id="addressComp" name="addressComp" size="25" value="{{ old('addressComp', $user->address_line_2) }}">@error('address_line_2') <p>Champs incorrect</p> @enderror<br/>
    <label for="zipcode">Code Postal:</label><br/>
    <input type="text" id="zipcode" name="zipcode" required size="25" value="{{ old('zipcode', $user->zipcode) }}">@error('zipcode') <p>Champs incorrect</p> @enderror<br/>
    <label for="city">Ville:</label><br/>
    <input type="text" id="city" name="city" required size="25" value="{{ old('city', $user->city) }}">@error('city') <p>Champs incorrect</p> @enderror<br/>
    <button>Enregistrer</button>
</form>
@endsection
