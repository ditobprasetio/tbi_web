<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PostMessageModel extends Model
{
    protected $table = 'post_message'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'name',
        'email',
        'city',
        'message',
        'phone_number',
    ];
}
