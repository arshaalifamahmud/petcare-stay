@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Tambah Kamar</h1>
    <p>Masukkan data kamar penitipan baru.</p>

    <form method="POST" action="{{ route('rooms.store') }}">
        @csrf
        @include('rooms.form')
    </form>
</div>
@endsection