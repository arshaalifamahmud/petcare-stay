@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Tambah Pemilik</h1>
    <p>Masukkan data pemilik hewan baru.</p>

    <form method="POST" action="{{ route('owners.store') }}">
        @csrf
        @include('owners.form')
    </form>
</div>
@endsection