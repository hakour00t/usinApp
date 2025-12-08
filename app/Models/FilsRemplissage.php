<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilsRemplissage extends Model
{
    use HasFactory;
        public $incrementing = false;   // your id is not auto increment
        protected $keyType = 'string';  // your id is string
        protected $fillable = [
            'id' ,
            'couleur' ,
            'longueur' ,
            'observation' ,
            'f_s_remplissages_id' ,
        ];

        public function FSRemplissage(): BelongsTo {return $this->FSRemplissage(FSRemplissage::class);}// relation fiche de suivi remplissage

}
