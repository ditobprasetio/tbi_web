<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PostTravelModel extends Model
{
    protected $table = 'post_travel'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'location',
        'time',
        'special_request',
        'hear_about_us',
    ];
}
