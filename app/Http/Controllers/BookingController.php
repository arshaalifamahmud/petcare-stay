<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pet;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index', [
            'bookings' => Booking::with(['pet.owner', 'room'])->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        if (auth()->user()->isAdmin()) {
            $pets = Pet::with('owner')->orderBy('name')->get();
        } else {
            $pets = Pet::with('owner')
                ->whereHas('owner', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->orderBy('name')
                ->get();
        }

        return view('bookings.create', [
            'pets' => $pets,
            'rooms' => Room::where('status', '!=', 'Maintenance')->orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if (!auth()->user()->isAdmin()) {
            $data['status'] = 'Menunggu';
        }

        if ($this->isRoomBooked($data)) {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'Kamar ini sudah dibooking pada tanggal tersebut. Silakan pilih kamar atau tanggal lain.'
                ]);
        }

        $data['total_price'] = $this->total($data);

        Booking::create($data);

        if (auth()->user()->isAdmin()) {
            return redirect()->route('bookings.index')
                ->with('success', 'Booking berhasil dibuat.');
        }

        return redirect()->route('user.dashboard')
            ->with('success', 'Booking kamu berhasil dibuat dan masuk ke admin.');
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', [
            'booking' => $booking,
            'pets' => Pet::with('owner')->orderBy('name')->get(),
            'rooms' => Room::where('status', '!=', 'Maintenance')->orderBy('name')->get()
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $this->validated($request);

        if ($this->isRoomBooked($data, $booking->id)) {
            return back()
                ->withInput()
                ->withErrors([
                    'room_id' => 'Kamar ini sudah dibooking pada tanggal tersebut. Silakan pilih kamar atau tanggal lain.'
                ]);
        }

        $data['total_price'] = $this->total($data);

        $booking->update($data);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking dihapus.');
    }

    private function validated(Request $request): array
    {
        $rules = [
            'pet_id' => 'required|exists:pets,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'service_package' => 'required|in:Basic,Premium,Grooming Plus',
            'special_request' => 'nullable|max:500',
        ];

        if (auth()->user()->isAdmin()) {
            $rules['status'] = 'required|in:Menunggu,Check In,Selesai,Dibatalkan';
        }

        return $request->validate($rules);
    }

    private function total(array $data): int
    {
        $room = Room::find($data['room_id']);

        $days = max(
            1,
            date_diff(date_create($data['check_in']), date_create($data['check_out']))->days
        );

        $extra = [
            'Basic' => 0,
            'Premium' => 30000,
            'Grooming Plus' => 60000,
        ][$data['service_package']] ?? 0;

        return ($room->price_per_day + $extra) * $days;
    }

    private function isRoomBooked(array $data, $ignoreBookingId = null): bool
    {
        $query = Booking::where('room_id', $data['room_id'])
            ->whereNotIn('status', ['Selesai', 'Dibatalkan'])
            ->where(function ($q) use ($data) {
                $q->where('check_in', '<', $data['check_out'])
                  ->where('check_out', '>', $data['check_in']);
            });

        if ($ignoreBookingId) {
            $query->where('id', '!=', $ignoreBookingId);
        }

        return $query->exists();
    }
}