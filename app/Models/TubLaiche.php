<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class TubLaiche extends Model
{
    use HasFactory;

    public $incrementing = false;   // your id is not auto increment
    protected $keyType = 'string';  // your id is string

    protected $fillable =  ['id' ,'vitesse_traction' , 'vitesse_extrudeuse' ,'pourcentage_gel',
     'noyau_moule' , 'couverture_moule_interieur' , 'couverture_moule_exterieur' , 'aiguille_fibre' , 'aiguille_gel' , 
     'temp_environnement' , 'temp_sechage_pbt' , 'corps1' ,'corps2' , 'corps3' , 'corps4' ,'tete1' , 'tete2' , 'tete3', 
    'auge_chaude' ,'auge_tiede'  , 'auge_froide' , 'color' ,'longueur' , 'pbt_lote' ,'gel_lote' , 'chifet' , 'user_id' , 'fiberColori_id'];



            public function fibreColoris():BelongsToMany
            {
                return $this->fibreColoris(
                    fibreColori::class,
                    'fibre_colori_tub_laiche',
                    'fibre_coloris_id',
                    'tub_laiche_id'
                );
            }
 
    
}
