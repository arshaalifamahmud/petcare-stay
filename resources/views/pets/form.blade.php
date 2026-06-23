@if ($errors->any())
    <div class="error">
        {{ $errors->first() }}
    </div>
@endif

<div class="form-grid">
    <div class="form-group">
        <label>Nama Hewan</label>
        <input type="text"
               name="name"
               value="{{ old('name', $pet->name ?? '') }}"
               placeholder="Contoh: Momo"
               required>
    </div>

    @if(auth()->user()->isAdmin())
    <div class="form-group">
        <label>Pemilik</label>
        <select name="pet_owner_id" required>
            <option value="">Pilih Pemilik</option>

            @foreach($owners as $owner)
                <option value="{{ $owner->id }}"
                    {{ old('pet_owner_id', $pet->pet_owner_id ?? '') == $owner->id ? 'selected' : '' }}>
                    {{ $owner->name }}
                </option>
            @endforeach
        </select>
    </div>
@endif

    <div class="form-group">
        <label>Jenis Hewan</label>
        <input type="text"
               name="species"
               value="{{ old('species', $pet->species ?? '') }}"
               placeholder="Contoh: Kucing, Anjing, Kelinci, Burung"
               required>
    </div>

    <div class="form-group">
        <label>Ras Hewan</label>
        <input type="text"
               name="breed"
               value="{{ old('breed', $pet->breed ?? '') }}"
               placeholder="Contoh: Persia, Golden Retriever, Anggora">
    </div>

    <div class="form-group">
    <label>Jenis Kelamin</label>
    <select name="gender" required>
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Jantan">Jantan</option>
        <option value="Betina">Betina</option>
    </select>
</div>

    <div class="form-group">
        <label>Umur</label>
        <input type="number"
               name="age"
               value="{{ old('age', $pet->age ?? '') }}"
               placeholder="Contoh: 2"
               required>
    </div>
</div>

<div class="form-group">
    <label>Catatan Hewan</label>
    <textarea name="notes"
        placeholder="Contoh: Suka makanan basah, alergi ayam, harus minum obat jam 8 pagi">{{ old('notes', $pet->notes ?? '') }}</textarea>
</div>

<div class="form-actions">
    <button type="submit" class="btn">Simpan</button>
    <a class="btn secondary" href="{{ route('pets.index') }}">Kembali</a>
</div>