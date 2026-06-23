<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Pet extends Model { protected $fillable=['pet_owner_id','name','species','breed','age','gender','notes']; public function owner(): BelongsTo { return $this->belongsTo(PetOwner::class,'pet_owner_id'); } public function bookings(): HasMany { return $this->hasMany(Booking::class); } }
