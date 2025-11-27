<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class fibreColori extends Model
{
    use HasFactory;
     public $incrementing = false;   // your id is not auto increment
    protected $keyType = 'string';  // your id is string

    protected $fillable =  ['id' ,'apparaille' , 'vitesse' ,'long', 'chifet' , 'color' , 'colorQiolity' , 'bobineQiolity' , 'tempir' , 'debitAzot' , 'Observ','bobigneMere_id'];


    public function Bobines(): HasMany
    {
        return $this->hasMany(Bobine::class);
    }
}
