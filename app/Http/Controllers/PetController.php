<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\PetOwner;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        return view('pets.index', [
            'pets' => Pet::with('owner')->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('pets.create', [
            'owners' => PetOwner::orderBy('name')->get()
        ]);
    }

    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required|max:100',
            'species' => 'required|max:50',
            'breed' => 'nullable|max:80',
            'age' => 'nullable|integer|min:0|max:40',
            'gender' => 'required|in:Jantan,Betina',
            'notes' => 'nullable|max:500',
        ]);

        if (auth()->user()->role === 'admin') {

            $r->validate([
                'pet_owner_id' => 'required|exists:pet_owners,id'
            ]);

            $data['pet_owner_id'] = $r->pet_owner_id;

        } else {

            $owner = PetOwner::where('user_id', auth()->id())->first();

            if (!$owner) {
                return back()->withErrors([
                    'msg' => 'Data pemilik tidak ditemukan.'
                ]);
            }

            $data['pet_owner_id'] = $owner->id;
        }

        Pet::create($data);

      if (auth()->user()->isAdmin()) {
    return redirect()->route('pets.index')
        ->with('success', 'Data hewan berhasil ditambah.');
}

return redirect()->route('user.dashboard')
    ->with('success', 'Hewan kamu berhasil didaftarkan.');
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', [
            'pet' => $pet,
            'owners' => PetOwner::orderBy('name')->get()
        ]);
    }

    public function update(Request $r, Pet $pet)
    {
        $data = $r->validate([
            'pet_owner_id' => 'required|exists:pet_owners,id',
            'name' => 'required|max:100',
            'species' => 'required|max:50',
            'breed' => 'nullable|max:80',
            'age' => 'nullable|integer|min:0|max:40',
            'gender' => 'required|in:Jantan,Betina',
            'notes' => 'nullable|max:500',
        ]);

        $pet->update($data);

        return redirect()->route('pets.index')
            ->with('success', 'Data hewan berhasil diperbarui.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index')
            ->with('success', 'Data hewan dihapus.');
    }
}