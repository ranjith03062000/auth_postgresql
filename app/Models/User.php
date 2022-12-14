<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

   
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    

    
    const CREATED_AT = 'added_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'password',
        'email_id'
    ];
 

       public function getJWTIdentifier()
        {
            return $this->getKey();
        }
    public function getJWTCustomClaims()
        {
            return [];
        }
}
