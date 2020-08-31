<?php

namespace App\Http\Controllers\Gallery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use App\Http\Models\GalleryModel;

class ApiGalleryController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $datadb = GalleryModel::MasterJoin()->where('gallery.id_album', '=', $request->id_album)
        ->where('gallery.type', '=', $request->type)
        ->when($request->search['field'], function ($query) use ($request)
        {
            if( $request->search['field'] !== '' && $request->search['keyword'] !== ''){
                $query->where( $request->search['field'], 'like', "%{$request->search['keyword']}%");
            }
        })
        ->paginate(4);
        return response($datadb->jsonSerialize(), Response::HTTP_OK);
    }
}
