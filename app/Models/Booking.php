<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Booking extends Model { protected $fillable=['pet_id','room_id','check_in','check_out','service_package','status','total_price','special_request']; protected $casts=['check_in'=>'date','check_out'=>'date']; public function pet(): BelongsTo { return $this->belongsTo(Pet::class); } public function room(): BelongsTo { return $this->belongsTo(Room::class); } }
