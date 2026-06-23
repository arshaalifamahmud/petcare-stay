@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <span class="badge">Data Master</span>
        <h1>Data Hewan</h1>
        <p>Kelola data hewan yang dititipkan di PetCare Stay.</p>
    </div>

    <a class="btn" href="{{ route('pets.create') }}">+ Tambah Hewan</a>
</div>

<div class="table-card">
    <table class="pretty-table">
       <thead>
    <tr>
        <th>Nama Hewan</th>
        <th>Pemilik</th>
        <th>Jenis Hewan</th>
        <th>Ras</th>
        <th>Jenis Kelamin</th>
        <th>Umur</th>
        <th>Catatan</th>
        <th>Aksi</th>
    </tr>
</thead>

        <tbody>
            @forelse($pets as $pet)
                <tr>
                    <td><strong>{{ $pet->name }}</strong></td>
                    <td>{{ $pet->owner->name ?? '-' }}</td>
                    <td><span class="tag">{{ $pet->species }}</span></td>
                    <td>{{ $pet->breed ?? '-' }}</td>
                    <td>{{ $pet->gender ?? '-' }}</td>
                    <td>{{ $pet->age }} tahun</td>
                    <td>{{ $pet->notes ?? '-' }}</td>
                    <td class="actions-table">
                        <a class="btn-small edit" href="{{ route('pets.edit', $pet) }}">Edit</a>

                        <form method="POST" action="{{ route('pets.destroy', $pet) }}" onsubmit="return confirm('Yakin mau hapus data hewan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="empty">Belum ada data hewan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection