@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Tambah Booking</h1>
    <p>Masukkan data booking penitipan baru.</p>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf
        @include('bookings.form')
    </form>
</div>
@endsection