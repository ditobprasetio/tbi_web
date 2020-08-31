<?php

namespace App\Http\Controllers\Gallery;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Models\AlbumModel;


class ApiAlbumController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $datadb = AlbumModel::orderBy('id', 'asc')
        ->when($request->search['field'], function ($query) use ($request)
        {
            if( $request->search['field'] !== '' && $request->search['keyword'] !== ''){
                $query->where( $request->search['field'], 'like', "%{$request->search['keyword']}%");
            }
        })
        ->paginate(3);

        $result = array();
        if(count($datadb) > 0)
        {
            foreach($datadb as $row)
            {
                $result[] = array(
                    'id'            => $row['id'],
                    'name'          => $row['name'],
                    'description'   => $row['description'],
                    'cover_image'   => DB::table('gallery')->where('id_album', '=', $row['id'])->pluck('path')->first(),
                    'cover_type'    => DB::table('gallery')->where('id_album', '=', $row['id'])->pluck('type')->first(),
                    'total_assets'  => DB::table('gallery')->where('id_album', '=', $row['id'])->count(),
                    'created_at'    => $row['created_at'],
                    'updated_at'    => $row['updated_at'],
                );
            }
        }

        $custom = collect(['result' => $result]);
        $data = $custom->merge($datadb);
        return response()->json($data, Response::HTTP_OK);
    }
}
