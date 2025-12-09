<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class fibreColori extends Model
{
    use HasFactory;
     public $incrementing = false;   // your id is not auto increment
    protected $keyType = 'string';  // your id is string

    protected $fillable =  [
        'id' ,
        'couleur' ,
        'longueur' ,
        'colorQiolity' ,
        'bobineQiolity' ,
        'tempirature' ,
        'debitAzot' ,
        'observation' ,
        'bobigneMere_id' ,
        'f_scoloratios_id' ,
    ];
    
    public function Bobine(): BelongsTo { return $this->belongsTo(Bobine::class , 'bobigneMere_id' );}// relation to bobine
    public function FScoloratio(): BelongsTo { return $this->belongsTo(FScoloratio::class ,'f_scoloratios_id' );}// relation to  fiche de suivi de coloration
    
    
    //relation to tube lache
    public function tubLaiches():BelongsToMany
    {
            return $this->belongsToMany(fibreColori::class ,'fibre_colori_tub_laiche','tub_laiche_id','fibre_colori_id');
    }
//  'fibre_coloris_tube_laches'
            //    fibre_colori_tub_laiche
    
}
