@extends('layouts.app')

@section('content')
<div class="auth-card">
    <h2>Daftar User</h2>
    <p class="subtitle">Buat akun pelanggan PetCare Stay</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
        </div>

        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Contoh: 08123456789" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="Masukkan alamat lengkap" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Minimal 6 karakter" required>
        </div>

        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
        </div>

        <button type="submit" class="btn full">Daftar User</button>
    </form>

    <p class="auth-link">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login di sini</a>
    </p>
</div>
@endsection