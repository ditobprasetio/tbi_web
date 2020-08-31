<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'contact'; 
    protected $fillable = [
        'phone',
        'fax',
        'email',
        'lat',
        'lng',
        'address',
    ];
    
}
