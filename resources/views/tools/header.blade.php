<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Tukang Bersih">
  <meta name="slug" content="{{ $slug }}">
  <meta name="lang" content="{{ $langcode }}">
  <meta name="keyword" content="{{ $dbpage->meta_keyword }}">
  <meta name="description" content="{{ $dbpage->meta_description }}">
  <meta property="og:title" content="TukangBersih"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="https://tukangbersih.com"/>
  <meta property="og:description" content="TukangBersih adalah produk jasa bersih bersih atau pembersih express atau jasa membersihkan rumah/residential, perkantoran/office dan komersial. Kami juga menyediakan jasa professional cleaning service, jasa bersih rumah, jasa pembersihan rumah, jasa kebersihan online, jasa membersihkan rumah, jasa membersihkan kamar mandi, jasa membersihkan kasur, jasa kebersihan kantor"/>
  <meta property="og:site_name" content="Tukang Bersih"/>
  <meta name="google-site-verification" content="uSHQuzmtQdvzvpF08PfCdb5WtkXvvx1TGj_6RssafFA" />
  <!--  -->
  <meta name="google-site-verification" content="uSHQuzmtQdvzvpF08PfCdb5WtkXvvx1TGj_6RssafFA" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <title>{{ $dbpage->page_title }}</title>


  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window,document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '348529399240931'); 
  fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=348529399240931&ev=PageView&noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->


  <link href="assets/css/theme-styles.css" rel="stylesheet" type="text/css">
  <link href="assets/css/blocks.css" rel="stylesheet" type="text/css">
  <link href="assets/css/widgets.css" rel="stylesheet" type="text/css"><!--External fonts-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet"><!-- Styles for Plugins -->
  <link href="assets/css/swiper.min.css" rel="stylesheet" type="text/css"><!--Styles for RTL-->
  <link href="assets/css/datepicker.min.css" rel="stylesheet" type="text/css">
  <link href="https://rawgit.com/kenwheeler/slick/master/slick/slick-theme.css" rel="stylesheet" type="text/css">


  <!-- rekes engine -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
  <link href="{{ asset('/vendor/rekes/rekes.css') }}" rel="stylesheet"/>
</head>
<body class="crumina-grid">
    <div id="app">  
        <!-- Preloader -->
        <div id="hellopreloader" style="display: block; position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 100%;background: #0084ee url(assets/svg/preload.svg) center center no-repeat;background-size: 41px;opacity: 1;"></div><!-- ... end Preloader -->
        
        <!-- rekes engine menu tools -->
        <div class="rekes-engine" id="rd-container-header" style="opacity:0;">
            <span id="loader"></span>
            <div class="row">
                <div class="col-md-3">
                    <ul class="pull-left">
                        <li><a href="javascript:;" id="open-bar"><i class="fa fa-align-left"></i></a></li>
                        <li><a href="javascript:;"><span class="brand">TKB</span></a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <ul class="pull-right">
                        <li>
                            <span>Page / <b class="">{{ ucfirst($dbpage->page_name) }}</b></span>
                        </li>
                        <li>
                            <span><b id="langcode">{{ $langcode }}</b></span>
                        </li>
                        <li>
                            <span>Edit Mode </span>
                        </li>
                        <li><i class="fa fa-refresh" onclick="window.location.reload()"></i></li>
                        <li><a href="javascript:;" onclick="window.location.href='/closemode/home'">CLOSE</a></li>
                    </ul>
                </div>
            </div>
        </div> 
        <div id="rd-container-leftbar" >
            <div>
                <ul>
                
                    <li>
                        <small>Switch to another page to setting configuration.</small>
                        <hr/>
                        <div class="">
                            <div class="form-group">
                                <label>Setting Page</label>
                                <select name="" onchange="rekes.changePage(this.value)">
                                    <option value="">-- Select Page --</option>
                                    @foreach ($dblistpage as $row)
                                        <option value="{{ $row->slug }}" <?= $slug == $row->slug ? 'selected' : '' ?> >{{ $row->page_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="">
                            <div class="form-group">
                                <label>Language Code</label>
                                <select   onchange="rekes.changeLang(this.value)">
                                    <option>-- Choose Language --</option>
                                    <option value="ID" <?= $langcode == 'ID' ? 'selected' : '' ?>>ID</option>
                                    <option value="EN" <?= $langcode == 'EN' ? 'selected' : '' ?>>EN</option>
                                </select>
                            </div>
                        </div>
                    </li>
                    <li>
                        <hr/>
                        <small>Please check your input data before submit.</small>
                    </li>
                    <li>
                        <!-- load / component form config -->
                        <form-config></form-config>
                        <!-- ========================== -->
                    </li>
                </ul>
            </div>
        </div>
        <div id="rd-container-editor" style="display:none;">
            <div class="content">
                <span id="close">CLOSE</span>
                <h5>Content Editor</h5>
                <small>Click button save to update your data</small>
                <hr/>
                <form method="post" enctype="multipart/form-data" onsubmit="return rekes.ajaxForm(this)">
                    <div class="col-md-12" id="rd-container-form">

                        <!-- initial class and index -->
                        <input id="rekes-class" type="hidden" name="class" />
                        <input id="rekes-index" type="hidden" name="index" />
                        <!-- ======================= -->
                    
                        <textarea id="textarea-text" name="content_text" class="form-control" style="height:100px;"></textarea>
                        <textarea id="textarea-html" name="content_html" class="form-control summernote"></textarea>
                        <input id="input-link" type="text" name="content_link" class="form-control"/>
                        <input id="input-value" type="text" name="content_value"  class="form-control" />
                        <input id="gallery-input-image" name="content_image" type="hidden"/>
                        <input id="input-placeholder" type="text" name="content_placeholder"  class="form-control" />
                        <div id="query-gallery"><query-gallery></query-gallery></div>
                        <div id="query-banner"><query-banner></query-banner></div>
                    </div>

                    <div class="col-md-12">
                        <hr/>
                        <button type="submit" class="submit">SAVE</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div> 
        <div style="margin-bottom:50px;">&nbsp;</div>
        <!-- rekes engine ---------- -->
  
