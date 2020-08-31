<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PageModel extends Model
{
    protected $table = 'page'; 
    
    public function scopeMasterJoin($query)
    {
        return $query
        ->select('page.*', 'page_config.id as id_page_config', 'page_config.*')
        ->leftJoin('page_config', 'page_config.id_page', '=', 'page.id');
    }
}
