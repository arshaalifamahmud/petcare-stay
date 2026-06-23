@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <span class="badge">Data Master</span>
        <h1>Data Kamar</h1>
        <p>Kelola kamar penitipan hewan di PetCare Stay.</p>
    </div>

    <a class="btn" href="{{ route('rooms.create') }}">+ Tambah Kamar</a>
</div>

<div class="table-card">
    <table class="pretty-table">
        <thead>
            <tr>
                <th>Nama Kamar</th>
                <th>Tipe</th>
                <th>Kapasitas</th>
                <th>Harga / Hari</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($rooms as $room)
                <tr>
                    <td><strong>{{ $room->name }}</strong></td>
                    <td><span class="tag">{{ $room->type }}</span></td>
                    <td>{{ $room->capacity }} hewan</td>
                    <td>Rp {{ number_format($room->price_per_day, 0, ',', '.') }}</td>
                    <td>{{ $room->status }}</td>
                    <td class="actions-table">
                        <a class="btn-small edit" href="{{ route('rooms.edit', $room) }}">Edit</a>

                        <form method="POST" action="{{ route('rooms.destroy', $room) }}" onsubmit="return confirm('Yakin mau hapus kamar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="empty">Belum ada data kamar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection