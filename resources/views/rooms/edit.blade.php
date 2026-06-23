@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Edit Kamar</h1>
    <p>Perbarui data kamar penitipan.</p>

    <form method="POST" action="{{ route('rooms.update', $room) }}">
        @csrf
        @method('PUT')
        @include('rooms.form')
    </form>
</div>
@endsection