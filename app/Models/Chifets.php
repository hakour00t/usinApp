<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chifets extends Model
{
    use HasFactory;
     protected $fillable = ['title' , 'time' , 'user_id'];

    public function FScoloratios(): HasMany {return $this->hasMany(FScoloratio::class, 'chifet_id');}
    public function user(): BelongsTo {return $this->belongsTo(User::class);}
  
          
}
