@if ($errors->any())
    <div class="error">
        {{ $errors->first() }}
    </div>
@endif

<div class="form-grid">
    <div class="form-group">
        <label>Hewan</label>
        <select name="pet_id" required>
            <option value="">Pilih Hewan</option>
            @foreach($pets as $pet)
                <option value="{{ $pet->id }}" {{ old('pet_id', $booking->pet_id ?? '') == $pet->id ? 'selected' : '' }}>
                    {{ $pet->name }} - {{ $pet->owner->name ?? '-' }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Kamar</label>
        <select name="room_id" required>
            <option value="">Pilih Kamar</option>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ old('room_id', $booking->room_id ?? '') == $room->id ? 'selected' : '' }}>
                    {{ $room->name }} - {{ $room->type }} - Rp {{ number_format($room->price_per_day, 0, ',', '.') }}/hari
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Tanggal Check In</label>
        <input type="date" name="check_in" value="{{ old('check_in', $booking->check_in ?? '') }}" required>
    </div>

    <div class="form-group">
        <label>Tanggal Check Out</label>
        <input type="date" name="check_out" value="{{ old('check_out', $booking->check_out ?? '') }}" required>
    </div>

   <div class="form-group">
    <label>Paket Layanan</label>

    <select name="service_package" required>
        <option value="">Pilih Paket Layanan</option>

        <option value="Basic"
            {{ old('service_package', $booking->service_package ?? '') == 'Basic' ? 'selected' : '' }}>
            Basic (Rp 0/hari)
        </option>

        <option value="Premium"
            {{ old('service_package', $booking->service_package ?? '') == 'Premium' ? 'selected' : '' }}>
            Premium (+ Rp 30.000/hari)
        </option>

        <option value="Grooming Plus"
            {{ old('service_package', $booking->service_package ?? '') == 'Grooming Plus' ? 'selected' : '' }}>
            Grooming Plus (+ Rp 60.000/hari)
        </option>
    </select>
</div>

   @if(auth()->user()->isAdmin())
    <div class="form-group">
        <label>Status Booking</label>
        <select name="status" required>
            <option value="">Pilih Status</option>
            <option value="Menunggu" {{ old('status', $booking->status ?? '') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="Check In" {{ old('status', $booking->status ?? '') == 'Check In' ? 'selected' : '' }}>Check In</option>
            <option value="Selesai" {{ old('status', $booking->status ?? '') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="Dibatalkan" {{ old('status', $booking->status ?? '') == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
        </select>
    </div>
@else
    <div class="form-group">
        <label>Status Booking</label>
        <input type="text" value="Menunggu konfirmasi admin" readonly>
    </div>
@endif

    <div class="form-group full-row">
        <label>Permintaan Khusus</label>
        <textarea name="special_request" placeholder="Contoh: Hewan alergi ayam">{{ old('special_request', $booking->special_request ?? '') }}</textarea>
    </div>
</div>

<div class="info-box">
    Total harga dihitung otomatis oleh sistem berdasarkan harga kamar per hari, paket layanan, dan lama penitipan.
</div>

<div class="form-actions">
    <button type="submit" class="btn">Simpan</button>
    <a class="btn secondary" href="{{ route('bookings.index') }}">Kembali</a>
</div>