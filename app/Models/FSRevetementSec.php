<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class FSRevetementSec extends Model
{
    use HasFactory;
     protected $fillable = [
        'work_order_id' ,
        'lote_id' ,
        'vitesse_traction' , 
        'vitesse_extrudeuse' , 
        'pourcentage_gel' ,
        'noyau_moule' , 
        'couverture_moule_interieur' ,
        'couverture_moule_exterieur' ,
        'aiguille_fibre' ,
        'aiguille_gel' ,
        'temp_environnement' ,
        'temp_sechage_pbt' , 
        'corps1' ,
        'corps2' ,
        'corps3' ,
        'corps4' ,
        'tete1' ,
        'tete2' ,
        'tete3' ,
        'auge_chaude' ,
        'auge_tiede' ,
        'auge_froide' ,
        'fabriquant' ,
        'pbt_lote' ,
        'gel_lote' ,
        'chifet' ,
        'user_id' ,//relation user 
        ];
    
        public function user(): BelongsTo {return $this->belongsTo(User::class);} //user relation
       
        public function TubLaiches(): HasMany {return $this->hasMany(TubLaiche::class);} // relation tube lache
}
