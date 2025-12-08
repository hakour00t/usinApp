<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,HasRoles;

    protected $fillable = ['first_name','last_name','adress','grad','date','email','password' ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function fibreColori(): HasMany {return $this->hasMany(fibreColori::class);}
    public function TubLaiche(): HasMany {return $this->hasMany(TubLaiche::class);}
    
    public function FScoloratio(): HasMany {return $this->hasMany(FScoloratio::class);} // FScoloratio
   
}
