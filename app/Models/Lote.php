<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lote extends Model
{
    use HasFactory;
    public $incrementing = false;          // id is not auto-increment
    protected $keyType = 'string';         // id is string
    protected $fillable = ['id' , 'number' , 'user_id'];
    public function FScoloratios(): HasMany {return $this->hasMany(FScoloratio::class, 'lote_id');}
    public function user(): BelongsTo {return $this->belongsTo(User::class);}
    public function WorkOrder(): HasMany {return $this->hasMany(WorkOrder::class, 'lote_id');}

    

}
