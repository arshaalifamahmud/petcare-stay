@extends('layouts.app')

@section('content')
<div class="auth-card">
    <h2>Dashboard Admin</h2>
    <p class="subtitle">Selamat datang, {{ auth()->user()->name }}</p>

    <a class="btn full" href="{{ route('owners.index') }}">Kelola Pemilik</a>
    <br><br>
    <a class="btn full" href="{{ route('pets.index') }}">Kelola Hewan</a>
    <br><br>
    <a class="btn full" href="{{ route('rooms.index') }}">Kelola Kamar</a>
    <br><br>
    <a class="btn full" href="{{ route('bookings.index') }}">Kelola Booking</a>
</div>
@endsection