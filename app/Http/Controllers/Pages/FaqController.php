<?php

namespace App\Http\Controllers\Pages;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Models\FaqModel;

class FaqController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request, $lang)
    {
        $datadb = FaqModel::where('language_code', $lang)->get();
        return response()->json($datadb, Response::HTTP_OK);
    } 

}
