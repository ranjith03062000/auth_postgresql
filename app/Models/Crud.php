<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Crud extends Model
{
    

   
    protected $table = 'user';
    protected $primaryKey = 'id ';
	  
    protected $fillable = [
        'id',
        'name',
        'branch',
        'desination'
    ];

    
}
