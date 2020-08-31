<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class SocmedModel extends Model
{
    protected $table = 'socmed'; 
    protected $fillable = [
        'link',
        'config_tab'
    ];
}
