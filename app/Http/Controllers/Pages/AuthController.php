<?php

namespace App\Http\Controllers\Pages;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Models\UserModel;

class AuthController extends Controller
{
    public function authmode(Request $request, $slug, $token)
    {
        if (!$request->session()->get('auth_page'))
        {
            $data = UserModel::where('edit_token', $token)->first();
            if( count($data) > 0 )
            {
                // clear and resetting token
                $input['edit_token'] = '';
                UserModel::find($data->id)->update($input);
                $request->session()->put('auth_page', 'true');
                $request->session()->put('auth_slug', $slug);
            }
        }

        return redirect(url('/'.$slug));
    }

    public function closemode(Request $request, $slug)
    {
        if ($request->session()->get('auth_page')){
            $request->session()->forget('auth_page');
            $request->session()->forget('auth_slug');
        }
        return redirect(url('/'.$slug));
    }   
}
