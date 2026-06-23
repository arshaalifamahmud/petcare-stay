<?php
namespace App\Http\Controllers;
use App\Models\{PetOwner,Pet,Room,Booking};
class DashboardController extends Controller { public function index(){ return view('dashboard', ['owners'=>PetOwner::count(),'pets'=>Pet::count(),'rooms'=>Room::count(),'bookings'=>Booking::count(),'recent'=>Booking::with(['pet.owner','room'])->latest()->take(5)->get()]); } }
