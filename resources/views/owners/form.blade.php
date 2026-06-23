@if ($errors->any())
    <div class="error">
        {{ $errors->first() }}
    </div>
@endif

<div class="form-grid">
    <div class="form-group">
        <label>Nama Pemilik</label>
        <input type="text" name="name" value="{{ old('name', $owner->name ?? '') }}" placeholder="Masukkan nama pemilik" required>
    </div>

    <div class="form-group">
        <label>Nomor HP</label>
        <input type="text" name="phone" value="{{ old('phone', $owner->phone ?? '') }}" placeholder="Contoh: 08123456789" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $owner->email ?? '') }}" placeholder="Contoh: nama@email.com">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="address" value="{{ old('address', $owner->address ?? '') }}" placeholder="Masukkan alamat pemilik" required>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn">Simpan</button>
    <a class="btn secondary" href="{{ route('owners.index') }}">Kembali</a>
</div>