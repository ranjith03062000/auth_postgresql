<?php 

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SingIn extends Model
{
    protected $table = 'singin';
    protected $primaryKey = 'id';

        CONST CREATED_AT ='added_at';
        CONST UPDATED_AT = 'updated_at';

       protected $fillable = [
        'id',
        'username',
        'mobile_number',
        'password',
        'email_id',
        'status'
    ];
}