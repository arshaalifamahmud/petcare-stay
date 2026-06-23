@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <span class="badge">Transaksi</span>
        <h1>Data Booking</h1>
        <p>Kelola booking penitipan hewan di PetCare Stay.</p>
    </div>

    <a class="btn" href="{{ route('bookings.create') }}">+ Tambah Booking</a>
</div>

<div class="table-card">
    <table class="pretty-table">
        <thead>
            <tr>
                <th>Hewan</th>
                <th>Pemilik</th>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Status</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td><strong>{{ $booking->pet->name ?? '-' }}</strong></td>
                    <td>{{ $booking->pet->owner->name ?? '-' }}</td>
                    <td>{{ $booking->room->name ?? '-' }}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td><span class="tag">{{ $booking->status }}</span></td>
                    <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    <td class="actions-table">
                        <a class="btn-small edit" href="{{ route('bookings.edit', $booking) }}">Edit</a>

                        <form method="POST" action="{{ route('bookings.destroy', $booking) }}" onsubmit="return confirm('Yakin mau hapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="empty">Belum ada data booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection