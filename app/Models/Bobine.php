<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bobine extends Model
{
    use HasFactory;
    public $incrementing = false;          // id is not auto-increment
    protected $keyType = 'string';         // id is string

    protected $fillable = ['id','loungeur','user_id'];
 
    public function fibreColoris(): HasMany {return $this->hasMany(fibreColori::class);}
    public function user(): BelongsTo {return $this->belongsTo(User::class);}


}
