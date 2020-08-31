<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class EngineModel extends Model
{
    protected $table = 'page_lang'; 
    protected $primaryKey = 'page_lang_id';
    protected $fillable = [
        'link',
        'config_tab',
        'page_lang_id',
        'slug' ,
        'lang_code' ,
        'index',
        'class',
        'content_html' ,
        'content_text',
        'content_value' ,
        'content_link',
        'content_image',
        'content_carousel',
        'content_placeholder',
        'file',
        'extention'
    ];
}
