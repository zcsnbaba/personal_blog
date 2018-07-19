@extends('home.common.common')

@section('content')
   <link rel="stylesheet" href="/xc2/font-awesome-4.5.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="/xc2/css/bootstrap.min.css">                                      
    <link rel="stylesheet" href="/xc2/css/hero-slider-style.css">                              
    <link rel="stylesheet" href="/xc2/css/magnific-popup.css">                                 
    <link rel="stylesheet" href="/xc2/css/tooplate-style.css">
    <style type="text/css">
         #abc{
            height:100px;
            width:100px;
            margin:2px;
            text-overflow : clip
            float:right;
        }

        #tmNavbar{
            float:left;
        }

         #xcym{
            
              background-color:white;
            }
    </style>    
 <article>
 <div class="cd-hero">

            <!-- Navigation -->        
            <div class="cd-slider-nav">
                <nav class="navbar"><br>
                    <div class="">
                        
                        <!-- <a class="navbar-brand text-uppercase" href="#"><i class="fa fa-gears tm-brand-icon"></i>相册</a> -->

                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                            &#9776;
                        </button>
                        @foreach($name as $a=>$b)
                        <div class="collapse navbar-toggleable-md text-xs-center text-uppercase tm-navbar" id="tmNavbar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item active selected" id="abc" >
                                    <a class="nav-link" href="/home/xc/show/{{$b['id']}}" data-no="1">{{$b['name']}} <span class="sr-only">(current)</span></a>
                                </li>                                
                              
                            </ul>
                        </div> 
                        @endforeach                       
                    </div>

                </nav>
            </div> 

            <ul class="cd-hero-slider">

                <!-- Page 1 Gallery One -->
                <li class="selected">                    
                    <div class="cd-full-width" id="xcym">
                        <div class="container-fluid js-tm-page-content" data-page-no="1" data-page-type="gallery">
                            <div class="tm-img-gallery-container">
                                <div class="tm-img-gallery gallery-one"><br>
                                <!-- Gallery One pop up connected with JS code below -->
                                @foreach($zp as $k=>$v)    
                                    <div class="grid-item">
                                        <figure class="effect-bubba">
                                            <img src="{{$v['photo']}}" alt="Image" class="img-fluid tm-img" style="width:100px;height:100px;">
                                            <figcaption>
                                                <h2 class="tm-figure-title">Image <span>Fifteen</span></h2>
                                                <p class="tm-figure-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                <a href="{{$v['photo']}}">View more</a>
                                            </figcaption>           
                                        </figure>
                                    </div>
                                @endforeach                                                                       
                                </div>                                 
                            </div>
                        </div>                                                    
                    </div>                    
                </li>            
        </div> <!-- .cd-hero -->
        <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
        <div id="loader-wrapper">
            
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div>
        
        <!-- load JS files -->
        <script src="/xc2/js/jquery-1.11.3.min.js"></script>        
        <script src="/xc2/js/tether.min.js"></script> 
        <script src="/xc2/js/bootstrap.min.js"></script>             
        <script src="/xc2/js/hero-slider-main.js"></script>         
        <script src="/xc2/js/jquery.magnific-popup.min.js"></script> 
        
        <script>

            function adjustHeightOfPage(pageNo) {

                var offset = 80;
                var pageContentHeight = 0;

                var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");

                if( pageType != undefined && pageType == "gallery") {
                    pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
                }
                else {
                    pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 20;
                }

                if($(window).width() >= 992) { offset = 120; }
                else if($(window).width() < 480) { offset = 40; }
               
                // Get the page height
                var totalPageHeight = $('.cd-slider-nav').height()
                                        + pageContentHeight + offset
                                        + $('.tm-footer').height();

                // Adjust layout based on page height and window height
                if(totalPageHeight > $(window).height()) 
                {
                    $('.cd-hero-slider').addClass('small-screen');
                    $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
                }
                else 
                {
                    $('.cd-hero-slider').removeClass('small-screen');
                    $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
                }
            }

            /*
                Everything is loaded including images.
            */
            $(window).load(function(){

                adjustHeightOfPage(1); // Adjust page height

                /* Gallery One pop up
                -----------------------------------------*/
                $('.gallery-one').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery:{enabled:true}                
                });
				
				/* Gallery Two pop up
                -----------------------------------------*/
				$('.gallery-two').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{enabled:true}                
                });

                /* Gallery Three pop up
                -----------------------------------------*/
                $('.gallery-three').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{enabled:true}                
                });

                /* Collapse menu after click 
                -----------------------------------------*/
                $('#tmNavbar a').click(function(){
                    $('#tmNavbar').collapse('hide');

                    adjustHeightOfPage($(this).data("no")); // Adjust page height       
                });

                /* Browser resized 
                -----------------------------------------*/
                $( window ).resize(function() {
                    var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
                    
                    // wait 3 seconds
                    setTimeout(function() {
                        adjustHeightOfPage( currentPageNo );
                    }, 1000);
                    
                });
        
                // Remove preloader (https://ihatetomatoes.net/create-custom-preloading-screen/)
                $('body').addClass('loaded');
                           
            });

           

        </script>   
</article>

                 
@endsection