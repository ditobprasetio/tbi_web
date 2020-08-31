<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PostConsultationModel extends Model
{
    protected $table = 'post_consultation'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'hear_about_us',
        'appointment_date',
        'special_request',
    ];
}
