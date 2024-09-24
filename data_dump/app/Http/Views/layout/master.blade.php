<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} |  History Report</title>
    <meta name="description" content="@yield('description')">
    <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    @php
    $fullUrl = url()->full();
    $cleanUrl = preg_replace('/^www\./i', '', parse_url($fullUrl, PHP_URL_HOST));
    $cleanedFullUrl = str_replace(parse_url($fullUrl, PHP_URL_HOST), $cleanUrl, $fullUrl);
@endphp
<link rel="canonical" href="{{$cleanedFullUrl}}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css'.'?ver='.mt_rand())}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @stack('css')
</head>
<body>
    
     <style>
        .language-selector {
            position: fixed;
            bottom: 10px;
            left: 10px;
            display: flex;
            align-items: center;
            border: 1px solid #000;
            padding: 8px;
            border-radius: 4px;
            z-index: 111;
            background: #fff;
        }

        .language-selector span {
            margin-right: 5px;
        }
        .language-selector span img {
            width: 35px;
            height: 25px;
            border-radius: 4px;
            border: 1px solid;
        }

        .language-selector select {
            padding: 5px;
            background: transparent;
            border: none;
        }
    </style>

    <div id="google_element" style="display:none;"></div>

    <div class="language-selector">
        <span id="langImage">
            <img src="{{asset('images/en.png')}}" alt="English Lang">
        </span>
        <select id="langSelect" onchange="changeLanguage()">
            <option value="en">EN</option>
            <option value="fr">FR</option>
        </select>
    </div>
    @include('layout.header')
    
    @yield('content')
    @include('layout.footer')
    <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<script>
		$(document).ready(function(){
			$("#mob_nav_button").click(function(){
				$(".mob_navigation").slideToggle();
			});
		});
	</script>
	 <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
     <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_element');
        }
        var flags = document.getElementsByClassName('flag_link');


        function changeLanguage() {
            var langSelect = document.getElementById('langSelect');
            var langImage = document.getElementById('langImage');
            var lang = langSelect.value;
            var svgEn = `<img src="{{asset('images/en.png')}}" alt="English Lang">`;
            var svgFr = `<img src="{{asset('images/fr.png')}}" alt="French Lang">`;

            langImage.innerHTML = lang == 'en' ? svgEn : svgFr;

            var languageSelect = document.querySelector("select.goog-te-combo");
            languageSelect.value = lang;
            languageSelect.dispatchEvent(new Event("change"));

        }
        $(document).ready(function(){
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50){
                    $('#HeaderID').addClass("content_fixed");
                }
                else{
                    $('#HeaderID').removeClass("content_fixed");
                }
            });
        });

    </script>
     <script>
         var swiper = new Swiper("#topBannerSlide", {
             speed:2000,
             parallax: true,
             pagination: {
                 el: ".swiper-pagination",
                 clickable: true,
                 type: "fraction",
             },
         });
         new Swiper("#customerSlider", {
             navigation: {
                 nextEl: ".swiper-button-next",
                 prevEl: ".swiper-button-prev",
             },
         });
         new Swiper("#brandSlider", {
             loop: true,

             navigation: {
                 nextEl: ".swiper-button-next",
                 prevEl: ".swiper-button-prev",
             },

             breakpoints: {
                 0: {
                     slidesPerView: 2,
                     spaceBetween: 10,
                 },
                 768: {
                     slidesPerView: 3,
                     spaceBetween: 40,
                 },
                 1024: {
                     slidesPerView: 3,
                     spaceBetween: 50,
                 },
             },
         });
     </script>
	

    @stack('js')
</body>
</html>