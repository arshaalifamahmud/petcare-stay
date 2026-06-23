@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Edit Pemilik</h1>
    <p>Perbarui data pemilik hewan.</p>

    <form method="POST" action="{{ route('owners.update', $owner) }}">
        @csrf
        @method('PUT')
        @include('owners.form')
    </form>
</div>
@endsection