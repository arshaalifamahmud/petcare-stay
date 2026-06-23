<?php
namespace App\Http\Controllers;
use App\Models\Room; use Illuminate\Http\Request;
class RoomController extends Controller {
 public function index(){ return view('rooms.index',['rooms'=>Room::latest()->paginate(10)]); }
 public function create(){ return view('rooms.create'); }
 public function store(Request $r){ $data=$r->validate(['name'=>'required|max:100|unique:rooms,name','type'=>'required|in:Standard,Deluxe,VIP','capacity'=>'required|integer|min:1|max:10','price_per_day'=>'required|numeric|min:10000','status'=>'required|in:Tersedia,Penuh,Maintenance']); Room::create($data); return redirect()->route('rooms.index')->with('success','Kamar berhasil ditambah.'); }
 public function edit(Room $room){ return view('rooms.edit',compact('room')); }
 public function update(Request $r, Room $room){ $data=$r->validate(['name'=>'required|max:100|unique:rooms,name,'.$room->id,'type'=>'required|in:Standard,Deluxe,VIP','capacity'=>'required|integer|min:1|max:10','price_per_day'=>'required|numeric|min:10000','status'=>'required|in:Tersedia,Penuh,Maintenance']); $room->update($data); return redirect()->route('rooms.index')->with('success','Kamar berhasil diperbarui.'); }
 public function destroy(Room $room){ $room->delete(); return redirect()->route('rooms.index')->with('success','Kamar dihapus.'); }
}
