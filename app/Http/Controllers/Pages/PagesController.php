<?php
namespace App\Http\Controllers\Pages;
error_reporting(0);
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\ContactModel;
use App\Http\Models\SocmedModel;
use App\Http\Models\PageModel;
use App\Http\Models\PageLangModel;
use App\Http\Models\UserModel;

use Jenssegers\Agent\Agent;
use Illuminate\Support\ServiceProvider;

class PagesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $init_slug)
    {
      
    
        $preview_mode = $request->session()->get('auth_page') ? false : true;
        //$preview_mode = false;
        $slug         = $init_slug;
        $langcode     = $request->session()->get('auth_lang') ? $request->session()->get('auth_lang') : 'ID';
        $content      = $this->generateContent(PageLangModel::where('slug', $slug)->where('lang_code', $langcode)->get());
        $content_image  = $this->generateContentImage(PageLangModel::where('slug', $slug)->get());

        $data = array(
            'slug'          => $slug,
            'slug_view'     => '../pages/'.$slug,
            'langcode'      =>  $langcode,
            // -- content -- //
            'rekes_text'    => $content['content_text'],
            'rekes_html'    => $content['content_html'],
            'rekes_image'   => $content_image['content_image'],
            'rekes_image_banner' => $content_image['content_carousel'],
            'rekes_image_style' => $content_image['content_image_style'],
            // -- ======= -- //
            'preview_mode'  => $preview_mode,
            'dbpage'        => PageModel::MasterJoin()->where('page.slug', $slug)->where('page_config.langcode', $langcode)->first(),
            'dblistpage'    => PageModel::MasterJoin()->where('page_config.langcode', $langcode)->get(),
            'dbsocmed'      => SocmedModel::get(),
            'dbcontact'     => ContactModel::where('id', 1)->first(),
        );
        return view('render', $data);/*
        if( count($data['dbpage']) > 0 ){
            
        }else{
            exit('Page not found');
        }*/
    } 

   public function promo_detail(Request $request, $id)
   {
        if( $id == 1 ){
            $template  = '../pages/promo_detail/promo_detail1';
        }
        if( $id == 2 ){
            $template  = '../pages/promo_detail/promo_detail2';
        }

        $preview_mode = $request->session()->get('auth_page') ? false : true;
        //$preview_mode = false;
        $slug         = 'promo_detail';
        $langcode     = $request->session()->get('auth_lang') ? $request->session()->get('auth_lang') : 'ID';
        $content      = $this->generateContent(PageLangModel::where('slug', $slug)->where('lang_code', $langcode)->get());
        $content_image  = $this->generateContentImage(PageLangModel::where('slug', $slug)->get());

        $data = array(
            'slug'          => $slug,
            'slug_view'     => '../pages/'.$slug,
            'langcode'      =>  $langcode,
            // -- content -- //
            'rekes_text'    => $content['content_text'],
            'rekes_html'    => $content['content_html'],
            'rekes_image'   => $content_image['content_image'],
            'rekes_image_banner' => $content_image['content_carousel'],
            'rekes_image_style' => $content_image['content_image_style'],
            // -- ======= -- //
            'preview_mode'  => $preview_mode,
            'dbpage'        => PageModel::MasterJoin()->where('page.slug', $slug)->where('page_config.langcode', $langcode)->first(),
            'dblistpage'    => PageModel::MasterJoin()->where('page_config.langcode', $langcode)->get(),
            'dbsocmed'      => SocmedModel::get(),
            'dbcontact'     => ContactModel::where('id', 1)->first(),
            'template'      => $template
        );

        return view('render', $data);
   }

    private function generateContent($datadb)
    {
        $data['content_text'] = [];
        $data['content_html'] = [];
       
        foreach($datadb as $row)
        {
            # processing text
            if( $row->class == 'rekes-text' ){
                $data['content_text'][$row->index] = $row->content_text;
            }
            # processing html
            if( $row->class == 'rekes-html' ){
                $data['content_html'][$row->index] = $row->content_html;
            }
        }
        return $data;
    }

    private function generateContentImage($datadb)
    {
        $data['content_image'] = [];
        $data['content_carousel'] = [];
        $data['content_image_style'] = [];

        foreach($datadb as $row)
        {
            # processing image
            if( $row->class == 'rekes-image' ){
                $data['content_image'][$row->index] = $row->content_image;
            }
            # processing image banner
            if( $row->class == 'rekes-image-banner' ){
                $dataImage = json_decode($row->content_carousel);

                $i = 0;
                foreach($dataImage as $inrow)
                {
                    if( strpos( $inrow, '?text' ) !== false){unset($dataImage[$i]);}
                    $i++;
                }
                $data['content_carousel'][$row->index] = $dataImage;
            }
            # processing image style
            if( $row->class == 'rekes-image-style' ){
                $data['content_image_style'][$row->index] = $row->content_image_style;
            }
        }
        return $data;
    }

    public function lang(Request $request, $id)
    {
        $request->session()->put('auth_lang', $id);
        $referer = request()->headers->get('referer');
        return redirect($referer);
    }

}
