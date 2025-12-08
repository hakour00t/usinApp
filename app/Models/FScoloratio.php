<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FScoloratio extends Model
{
    use HasFactory;
    protected $fillable = [ 'work_order_id' ,'apariel' ,'lote_id', 'vitesse' ,'fornissuer_id' ,'chifet' ,'user_id'] ;

    public function user(): BelongsTo { return $this->belongsTo(User::class); }// relation to users
    public function fibreColoris(): HasMany {return $this->hasMany(fibreColori::class , 'f_scoloratios_id');} // FScoloratiofibre colori
}
