<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Models\ConfigModel;
use App\Http\Models\AlbumModel;
use Illuminate\Support\Facades\DB;


class ConfigController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request, $slug, $langcode)
    {
        $datadb = ConfigModel::MasterJoin()
        ->where('page_config.langcode', $langcode)
        ->where('page.slug', $slug)
        ->where('page.editable', 'true')->first();
        
        return response()->json($datadb, Response::HTTP_OK);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $this->validate($request,[
                'page_name'     => 'required|max:100',
                'page_title'    => 'required|max:100',
                'meta_keyword'  => 'required|max:100',
                'meta_description'   => 'required|max:160'
            ]);
    
            $input = $request->all();
            ConfigModel::where('id', $id)->update($input);
            return response()->json(['result' => 'ok'], Response::HTTP_OK);
        }catch (Exception $e){
              return response()->setStatusCode(400, 'Request blocked!!!');
        }
    }

}