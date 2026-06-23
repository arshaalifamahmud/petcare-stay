<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PetOwner extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'address'
    ];

    public function pets(): HasMany
    {
        return $this->hasMany(Pet::class);
    }
}