<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TubLaiche extends Model
{
    use HasFactory;

    public $incrementing = false;   // your id is not auto increment
    protected $keyType = 'string';  // your id is string

    protected $fillable = [
        'id' , 
        'type_fibre_id' , 
        'couleur' , 
        'longueur' , 
        'user_id' , //relation user
        'f_s_revetement_secs_id' , //relation fiche de suivi revetement

    ];
     // relation ti users
    public function FSRevetementSec(): BelongsTo { return $this->belongsTo(FSRevetementSec::class); }
    
    //relation to fibres 
    public function fibreColoris():BelongsToMany
    {
        return $this->belongsToMany(fibreColori::class ,'fibre_colori_tub_laiche','tub_laiche_id','fibre_colori_id');
    }
            
}
           
