@extends('layouts.app')

@section('content')
<div class="form-card">
    <h1>Edit Hewan</h1>
    <p>Perbarui data hewan.</p>

    <form method="POST" action="{{ route('pets.update', $pet) }}">
        @csrf
        @method('PUT')
        @include('pets.form')
    </form>
</div>
@endsection