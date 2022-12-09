<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
    

   
    protected $table = 'vendors';
    protected $primaryKey = 'id ';
    

      const CREATED_AT = 'added_at';
      const UPDATED_AT = 'updated_at';
	  
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'father_name',
        'mother_name',
        'email',
        'phone_number',
        'whatsapp_number',
        'status'
    ];

    
}
