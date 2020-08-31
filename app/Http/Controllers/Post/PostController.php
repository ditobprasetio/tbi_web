<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Models\PostMessageModel;
use App\Http\Models\PostConsultationModel;
use App\Http\Models\PostQuoteModel;
use App\Http\Models\PostTravelModel;

class PostController extends Controller
{
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function message(Request $request)
    {
        $this->validate($request,[
            'langcode'  => 'required',
            'title'     => 'required',
            'name'      => 'required|max:50',
            'email'     => 'required|max:50',
            'city'      => 'required|max:50',
            'message'   => 'required',
            'phone_number' => 'required|max:50'
        ]);

        $success_message = 'Thanks, your data has been sent successfully';
        if( $request->get('langcode') == 'ID' ){
            $success_message = 'Terimakasih, data anda telah berhasil di kirim.';
        }   

        $input = $request->all();
        PostMessageModel::create($input);
        return back()->with('success', $success_message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function consultation(Request $request)
    {
        $this->validate($request,[
            'langcode'  => 'required',
            'name'      => 'required|max:50',
            'email'     => 'required|max:50',
            'phone_number' => 'required|max:50',
            'hear_about_us' => 'required',
            'appointment_date'   => 'required',
            'special_request'    => '',
        ]);

        $success_message = 'Thanks, your data has been sent successfully';
        if( $request->get('langcode') == 'ID' ){
            $success_message = 'Terimakasih, data anda telah berhasil di kirim.';
        }   

        if( $request->get('hear_about_us') ){
            $output = '';
            $data = $_POST['hear_about_us'];
            foreach($data as $row){
                $output .= $row.', ';
            }
        }

        $input = $request->all();
        $input['hear_about_us'] = rtrim($output, ', ');

        PostConsultationModel::create($input);
        return back()->with('success', $success_message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quote(Request $request)
    {
        $this->validate($request,[
            'langcode'  => 'required',
            'name'      => 'required|max:50',
            'email'     => 'required|max:50',
            'phone_number' => 'required|max:50',
            'quotation_for'   => 'required',
        ]);

        $success_message = 'Thanks, your data has been sent successfully';
        if( $request->get('langcode') == 'ID' ){
            $success_message = 'Terimakasih, data anda telah berhasil di kirim.';
        }   

        $input = $request->all();
        PostQuoteModel::create($input);
        return back()->with('success', $success_message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function travel(Request $request)
    {
        $this->validate($request,[
            'langcode'  => 'required',
            'name'      => 'required|max:50',
            'email'     => 'required|max:50',
            'phone_number'=> 'required|max:50',
            'location' => 'required|max:50',
            'time'   => 'required',
            'special_request' => '',
            'hear_about_us' => 'required',
        ]);

        $success_message = 'Thanks, your data has been sent successfully';
        if( $request->get('langcode') == 'ID' ){
            $success_message = 'Terimakasih, data anda telah berhasil di kirim.';
        }   

        if( $request->get('hear_about_us') ){
            $output = '';
            $data = $_POST['hear_about_us'];
            foreach($data as $row){
                $output .= $row.', ';
            }
        }

        $input = $request->all();
        $input['hear_about_us'] = rtrim($output, ', ');

        PostTravelModel::create($input);
        return back()->with('success', $success_message);
    }

}