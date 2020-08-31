<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigModel extends Model
{
    protected $table = 'page_config'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'langcode',
        'page_name',
        'page_title',
        'meta_keyword',
        'meta_description',
    ];

    public function scopeMasterJoin($query)
    {
        return $query
        ->select('page_config.*', 'page.slug', 'page.editable')
        ->leftJoin('page', 'page.id', '=', 'page_config.id_page');
    }
    
}
