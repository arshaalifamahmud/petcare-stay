@if ($errors->any())
    <div class="error">
        {{ $errors->first() }}
    </div>
@endif

<div class="form-grid">
    <div class="form-group">
        <label>Nama Kamar</label>
        <input type="text"
               name="name"
               value="{{ old('name', $room->name ?? '') }}"
               placeholder="Contoh: Kamar A1"
               required>
    </div>

    <div class="form-group">
        <label>Tipe Kamar</label>
        <select name="type" required>
            <option value="">Pilih Tipe Kamar</option>
            <option value="Standard" {{ old('type', $room->type ?? '') == 'Standard' ? 'selected' : '' }}>Standard</option>
            <option value="Deluxe" {{ old('type', $room->type ?? '') == 'Deluxe' ? 'selected' : '' }}>Deluxe</option>
            <option value="VIP" {{ old('type', $room->type ?? '') == 'VIP' ? 'selected' : '' }}>VIP</option>
        </select>
    </div>

    <div class="form-group">
        <label>Kapasitas</label>
        <input type="number"
               name="capacity"
               value="{{ old('capacity', $room->capacity ?? '') }}"
               placeholder="Contoh: 3"
               min="1"
               max="10"
               required>
    </div>

    <div class="form-group">
        <label>Harga per Hari</label>
        <input type="number"
               name="price_per_day"
               value="{{ old('price_per_day', $room->price_per_day ?? '') }}"
               placeholder="Contoh: 50000"
               min="10000"
               required>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" required>
            <option value="">Pilih Status</option>
            <option value="Tersedia" {{ old('status', $room->status ?? '') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Penuh" {{ old('status', $room->status ?? '') == 'Penuh' ? 'selected' : '' }}>Penuh</option>
            <option value="Maintenance" {{ old('status', $room->status ?? '') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select>
    </div>
</div>

<div class="form-actions">
    <button type="submit" class="btn">Simpan</button>
    <a class="btn secondary" href="{{ route('rooms.index') }}">Kembali</a>
</div>