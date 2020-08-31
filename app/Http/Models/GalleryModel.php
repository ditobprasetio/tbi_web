<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery'; 
    protected $fillable = [
        'id_album',
        'id_user',
        'title',
        'description',
        'type',
        'path',
        'status',
    ];

    public function scopeMasterJoin($query)
    {
        return $query
        ->select('gallery.*', 'album.name as album_name', 'users.name as author_name', 'users.photo as author_photo', 'users.name as author_name', 'users.email as author_email')
        ->leftJoin('album', 'album.id', '=', 'gallery.id_album')
        ->leftJoin('users', 'users.id', '=', 'gallery.id_user');
    }
}
