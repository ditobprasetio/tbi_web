<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Models\EngineModel;

class EngineController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request, $slug)
    {
        $datadb = EngineModel::where('slug', $slug)->get();
        return response()->json($datadb, Response::HTTP_OK);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        try{
            
            $content = '';
            switch( $request->get('class') ){
                case 'rekes-text':
                    $content = $request->get('content_text');
                break;
                case 'rekes-html':
                    $content = $request->get('content_html');
                break;
                case 'rekes-image':
                    $content = $request->get('content_image');
                break;
                case 'rekes-image-style':
                    $content = $request->get('content_image');
                break;
                case 'rekes-image-banner':
                    $content_carousel = json_encode($request->get('content_banner'));
                    $content = json_encode($request->get('content_banner'));
                    $request->except(
                        ['content_banner[0]', 'content_banner[1]','content_banner[2]','content_banner[3]' ,'content_banner[4]', 'content_banner[5]'] );
                break;
                case 'rekes-link':
                    $content = $request->get('content_link');
                break;
            }
            $datadb = EngineModel::where('slug', $slug)
            ->where('index', $request->get('index'))
            ->where('lang_code', $request->get('lang_code'))
            ->where('class', $request->get('class'))
            ->first();

            if( count($datadb) > 0 ){
                // do update
                $input = $request->all();
                if(isset($content_carousel)){
                    $input['content_carousel'] = $content_carousel;
                    unset($input['content_banner']);
                }
                EngineModel::where('page_lang_id', $datadb->page_lang_id)->update($input);
            }else{
                // do insert
                $input = $request->all();
                $input['slug'] = $slug;
                EngineModel::create($input);
            }

            return response()->json([
                'result'        => 'ok', 
                'class'         => $input['class'],
                'index'         => $input['index'],
                'content'       => $content
            ], Response::HTTP_OK);
            
        }catch (Exception $e){
              return response()->setStatusCode(400, 'Request blocked!!!');
        }
    }
}
