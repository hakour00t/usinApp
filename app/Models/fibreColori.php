<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


class fibreColori extends Model
{
    use HasFactory;
     public $incrementing = false;   // your id is not auto increment
    protected $keyType = 'string';  // your id is string

    protected $fillable =  ['id' ,'apparaille' , 'vitesse' ,'long', 'chifet' , 'color' , 'colorQiolity' , 'bobineQiolity' , 'tempir' , 'debitAzot' , 'Observ','bobigneMere_id' , 'user_id'];

    // relation to bobine
    public function Bobines(): HasOne
    {
        return $this->Bobines(Bobine::class,'bobigneMere_id');
    }

    // relation ti users
 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
   
 //relation to tube lache
    public function tubLaiche(): BelongsToMany
    {
        return $this->belongsToMany(TubLaiche::class);
    }
}
