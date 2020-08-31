<!doctype html>
<html lang="en">
<head>
  <title>{{ $dbpage->page_title }}</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Tukang Bersih">
  <meta name="slug" content="{{ $slug }}">
  <meta name="lang" content="{{ $langcode }}">
  <meta name="keyword" content="{{ $dbpage->meta_keyword }}">
  <meta name="description" content="{{ $dbpage->meta_description }}">
  <meta property="og:title" content="TukangBersih"/>
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="https://tukangbersih.com"/>
  <meta property="og:description" content="{{ $dbpage->meta_description }}"/>
  <meta property="og:site_name" content="Tukang Bersih"/>
  <meta name="google-site-verification" content="uSHQuzmtQdvzvpF08PfCdb5WtkXvvx1TGj_6RssafFA" />
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-51949687-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-51949687-2');
	</script>
  <!-- ============================================= -->



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
  <img height="1" width="1" 
  src="https://www.facebook.com/tr?id=348529399240931&ev=PageView
  &noscript=1"/>
  </noscript>
  <!-- End Facebook Pixel Code -->



  <link href="/assets/css/theme-styles.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/blocks.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/widgets.css" rel="stylesheet" type="text/css"><!--External fonts-->
  <link rel="stylesheet" type="text/css" href="/assets/css/count.css">

<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


  <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet"><!-- Styles for Plugins -->
  <link href="/assets/css/swiper.min.css" rel="stylesheet" type="text/css"><!--Styles for RTL-->
  <link href="/assets/css/datepicker.min.css" rel="stylesheet" type="text/css">
  <link href="https://rawgit.com/kenwheeler/slick/master/slick/slick-theme.css" rel="stylesheet" type="text/css">
  <meta name="google-site-verification" content="uSHQuzmtQdvzvpF08PfCdb5WtkXvvx1TGj_6RssafFA" />
</head>
<body class="crumina-grid">
<div id="app">  
	<!-- Preloader -->
	<div id="hellopreloader" style="display: block; position: fixed;z-index: 99999;top: 0;left: 0;width: 100%;height: 100%;min-width: 100%;background: #0084ee url(/svg/preload.svg) center center no-repeat;background-size: 41px;opacity: 1;"></div><!-- ... end Preloader -->
    <header class="header header--small-lines" id="site-header">
		<div class="top-bar top-bar-dark">
			<div class="container">
		
				<div class="top-bar-contact">
					

		
					<div class="contact-dll">
							<img src="/assets/img/phone.svg" class="svg-top">					
							<span>1500-166</span>
					</div>



                    <div class="contact-dll">
                    <img src="/assets/img/time-left.svg" alt="" class="svg-top">
                    <span> 8 AM to 5 PM (Daily)    </span>
                    </div>



					<div class="contact-dll">
							<img src="/assets/img/email.svg" class="svg-top">					
						<a href="mailto:customer.care@tukangbersih.com">customer.care@tukangbersih.com</a>
					</div>
					
				</div>
				<div class="top-bar-download">
					<a href="https://itunes.apple.com/id/app/tukang-bersih-indonesia/id1445985669?mt=8" target="_blank">
						<img src="/assets/img/appstore.svg" class="img-andro" alt="">
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.tukangbersih.tbicust" target="_blank">
						<img src="/assets/img/googlestore.svg" class="img-andro" alt="">
					</a>
		
				</div>
				<!-- <a class="btn-bhs bhs--green fr" href="#">English</a>
				<a class="btn-bhs btn--white fr" href="#">Indonesia</a> -->
		
		
			</div>
		</div>
		<div class="container">
			<a class="top-bar-link" href="#" id="top-bar-js"><svg class="utouch-icon utouch-icon-arrow-top">
			<use xlink:href="#utouch-icon-arrow-top"></use></svg></a>
			<div class="header-content-wrapper">
				<div class="site-logo"><a class="full-block" href="/home"></a> <img alt="TB" src="/assets/svg/logo.svg"></div>
				<nav class="primary-menu" id="primary-menu">
					<!-- menu-icon-wrapper -->
					 <a class="menu-icon-trigger showhide" href='javascript:void(0)' id="menu-icon-trigger"><span class="mob-menu--title">Menu</span> <span class="menu-icon-wrapper" id="menu-icon-wrapper"><svg height="1000px" width="1000px">
					<path d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800" id="pathD"></path>
					<path d="M 300 500 L 700 500" id="pathE"></path>
					<path d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200" id="pathF"></path></svg></span></a>
					<ul class="primary-menu-menu">
						<li class="">
							<a href="{{ url($dblistpage[0]->slug) }}">{{ $dblistpage[0]->page_name }}</a>
						</li>
						<li class="menu-item-has-children">
							<a href="{{ url($dblistpage[1]->slug) }}">{{ $dblistpage[1]->page_name }}</a>
						</li>
						<li class="">
								<a href="{{ url($dblistpage[2]->slug) }}">{{ $dblistpage[2]->page_name }}</a>
							</li>
						<li class="">
							<a href="{{ url($dblistpage[3]->slug) }}">{{ $dblistpage[3]->page_name }}</a>
						</li>
						<li class="">
							<a href="{{ url($dblistpage[4]->slug) }}">{{ $dblistpage[4]->page_name }}S</a>
						</li>						
						<li class="">
							<a href="{{ url($dblistpage[5]->slug) }}">{{ $dblistpage[5]->page_name }}</a>
						</li>
						<li class="">
								<a href="{{ url($dblistpage[0]->slug) }}#testi">{{ $dblistpage[6]->page_name }}</a>
						</li>
						<li class="">
							<a href="{{ url($dblistpage[7]->slug) }}">{{ $dblistpage[7]->page_name }}</a>
						</li>
						<li>
								<a class="theme-btn" href="{{ url($dblistpage[8]->slug) }}">{{ $dblistpage[8]->page_name }}</a>
						</li>
							<!-- <a class="bt-login btn--primary btn--with-shadow" href="login.html">login</a> -->
					</ul>
					
					
				</nav>
			</div>
		</div>
	</header>
	<div class="header-spacer-2"></div><!-- ... End Header -->
	
