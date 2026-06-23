@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <span class="badge">Data Master</span>
        <h1>Data Pemilik Hewan</h1>
        <p>Kelola data pelanggan yang menitipkan hewan di PetCare Stay.</p>
    </div>

    <a class="btn" href="{{ route('owners.create') }}">+ Tambah Pemilik</a>
</div>

<div class="table-card">
    <table class="pretty-table">
        <thead>
            <tr>
                <th>Nama Pemilik</th>
                <th>Nomor HP</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($owners as $o)
                <tr>
                    <td><strong>{{ $o->name }}</strong></td>
                    <td>{{ $o->phone }}</td>
                    <td>{{ $o->email ?? '-' }}</td>
                    <td>{{ $o->address }}</td>
                    <td class="actions-table">
                        <a class="btn-small edit" href="{{ route('owners.edit', $o) }}">Edit</a>

                        <form method="POST" action="{{ route('owners.destroy', $o) }}" onsubmit="return confirm('Yakin mau hapus data pemilik ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="empty">Belum ada data pemilik.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrap">
        {{ $owners->links() }}
    </div>
</div>
@endsection