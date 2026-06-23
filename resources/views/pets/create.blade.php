@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Tambah Hewan</h1>
    <p>Masukkan data hewan baru.</p>

    <form method="POST" action="{{ route('pets.store') }}">
        @csrf
        @include('pets.form')
    </form>
</div>
@endsection