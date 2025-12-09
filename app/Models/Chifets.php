<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chifets extends Model
{
    use HasFactory;
     protected $fillable = ['title' , 'time'];

    public function FScoloratios(): HasMany {return $this->hasMany(FScoloratio::class, 'chifet_id');}
          
}
