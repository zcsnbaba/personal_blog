@extends('home.common.common')

@section('content')
   
    <link href="/xc/css/bootstrap.min.css" rel="stylesheet">
    <link href="/xc/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/xc/css/templatemo_misc.css">
    <link type="text/css" rel="stylesheet" href="/xc/css/easy-responsive-tabs.css" />
    <link href="/xc/css/templatemo_style.css" rel="stylesheet"> 
        
    <script src="/xc/js/jquery-1.10.2.min.js"></script> 
    <script src="/xc/js/jquery.lightbox.js"></script>
    <script src="/xc/js/templatemo_custom.js"></script>
    <script src="/xc/js/easyResponsiveTabs.js" type="text/javascript"></script>   
<br><br><br>
<article>



            @foreach($xc as $k => $v)
            <div class="col-md-2 templatemo_leftgap">
                <div class="templatemo_botgap templatemo_topgap gallery-item">
                     <img src="{{$v['photo']}}" alt="gallery 7">
                     <div class="overlay">
                                <a href="{{$v['photo']}}" data-rel="lightbox" class="fa fa-arrows-alt"></a>
                     </div>
                </div>
            </div>
            @endforeach

     <!-- portfolio end -->
    <!-- testimonial start -->
    
    <!-- about end -->
    <!-- contact start -->

        <!-- contact end --> 
    
    </div>

</article>
@endsection
