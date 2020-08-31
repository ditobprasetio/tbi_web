<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class UserModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; 


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'privileges_role', 'photo', 'edit_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeMasterJoin($query)
    {
        return $query
        ->select('users.*', 'privileges.name as privileges_name')
        ->leftJoin('privileges', 'privileges.id', '=', 'users.privileges_role');
    }
}

