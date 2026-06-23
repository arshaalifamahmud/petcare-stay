<?php
namespace App\Http\Controllers;
use App\Models\PetOwner; use Illuminate\Http\Request;
class PetOwnerController extends Controller {
 public function index(){ return view('owners.index',['owners'=>PetOwner::latest()->paginate(10)]); }
 public function create(){ return view('owners.create'); }
 public function store(Request $r){ $data=$r->validate(['name'=>'required|max:100','phone'=>'required|max:20','email'=>'nullable|email|max:100','address'=>'required|max:255']); PetOwner::create($data); return redirect()->route('owners.index')->with('success','Data pemilik berhasil ditambah.'); }
 public function edit(PetOwner $owner){ return view('owners.edit',compact('owner')); }
 public function update(Request $r, PetOwner $owner){ $data=$r->validate(['name'=>'required|max:100','phone'=>'required|max:20','email'=>'nullable|email|max:100','address'=>'required|max:255']); $owner->update($data); return redirect()->route('owners.index')->with('success','Data pemilik berhasil diperbarui.'); }
 public function destroy(PetOwner $owner){ $owner->delete(); return redirect()->route('owners.index')->with('success','Data pemilik dihapus.'); }
}
