@extends('layouts.app')

@section('content')
<div class="page-header">
    @if (session('success'))
    <div class="info-box">
        {{ session('success') }}
    </div>
@endif
    <div>
        <span class="badge">Pelanggan</span>
        <h1>Dashboard User</h1>
        <p>Selamat datang, {{ auth()->user()->name }}.</p>
    </div>
    @if (session('success'))
    <div class="info-box">
        {{ session('success') }}
    </div>
@endif
</div>

<div class="grid">
    <div class="card">
        <h2>🐾 Hewan Saya</h2>
        <p>Tambahkan data hewan kamu sebelum melakukan booking.</p>
        <a href="{{ route('pets.create') }}" class="btn">Tambah Hewan</a>
    </div>

    <div class="card">
        <h2>📅 Booking Penitipan</h2>
        <p>Setelah data hewan ada, kamu bisa booking kamar penitipan.</p>
        <a href="{{ route('bookings.create') }}" class="btn">Booking Sekarang</a>
    </div>
</div>
@endsection