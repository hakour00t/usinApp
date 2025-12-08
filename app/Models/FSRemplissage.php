<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class FSRemplissage extends Model
{
    use HasFactory;
    protected $fillable = [
            'work_order_id' ,
            'lote_id' ,
            'vitesse_traction' ,
            'vitesse_extrudeuse' ,
            'temp_sechage_pbt' ,
            'demontion_moule' ,
            'fabriquant' ,
            'corps1' ,
            'corps2' ,
            'corps3' ,
            'corps4' ,
            'tete1' ,
            'tete2' ,
            'tete3' ,
            'user_id' ,  //user relation 
        ];
              
    public function user(): BelongsTo {return $this->belongsTo(User::class);} //user relation
  
    public function FilsRemplissages(): HasMany {return $this->hasMany(FilsRemplissage::class);} // relation fils de remplissage

}
