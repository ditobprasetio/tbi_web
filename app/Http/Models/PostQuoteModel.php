<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PostQuoteModel extends Model
{
    protected $table = 'post_quote'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'quotation_for',
    ];
}
