@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Edit Booking</h1>
    <p>Perbarui data booking penitipan.</p>

    <form method="POST" action="{{ route('bookings.update', $booking) }}">
        @csrf
        @method('PUT')
        @include('bookings.form')
    </form>
</div>
@endsection