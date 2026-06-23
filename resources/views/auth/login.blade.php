@extends('layouts.app')

@section('content')
<div class="auth-card">
    <h2>Login</h2>
    <p class="subtitle">Masuk sebagai admin atau user</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <div class="form-group">
            <label>Login Sebagai</label>
            <select name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit" class="btn full">Login</button>
    </form>

    <p class="auth-link">
        Belum punya akun? <a href="{{ route('register') }}">Daftar User</a>
    </p>
</div>
@endsection