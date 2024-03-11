@extends('layouts.app')

@section('title', 'Welcome Page - PetsApp')

@section('content')
<header>
    <img src="{{ asset('images/Icon light.png') }}" alt="Logo">
</header>
<section class="homepage">
    <img src="{{ asset ('images/Icono App.png') }}" alt="slide">
    <a href="{{ url('login') }}">Enter</a>
</section>
@endsection