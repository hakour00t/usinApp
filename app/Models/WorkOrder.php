<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    public $incrementing = false;          // id is not auto-increment
    protected $keyType = 'string';         // id is string

    protected $fillable = [
            'id',
            'description',
            'date_creation',
            'date_debut',
            'date_cloture',
            'quantite_planifiee',
            'date_de_finaliser',
            'lote_id',
            'user_id',	
    ];


    public function FScoloratios(): HasMany {return $this->hasMany(FScoloratio::class, 'work_order_id');}
    public function user(): BelongsTo {return $this->belongsTo(User::class);}
    public function lote(): BelongsTo {return $this->belongsTo(Lote::class);}


}
