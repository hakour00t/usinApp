<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use\Illuminate\Database\Eloquent\Relations\HasMany;

class aparile extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function FScoloratios(): HasMany {return $this->hasMany(FScoloratio::class, 'apariel_id');}
}
