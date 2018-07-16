@extends('home.common.common')

@section('content')
<link rel="stylesheet" type="text/css" href="/adminmoban/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/adminmoban/css/fonts/ptsans/stylesheet.css" media="screen">
<!-- 后台图片按钮样式 -->
<link rel="stylesheet" type="text/css" href="/adminmoban/css/fonts/icomoon/style.css" media="screen">
<!-- 图片样式 -->
<link rel="stylesheet" type="text/css" href="/adminmoban/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/adminmoban/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/adminmoban/jui/css/jquery.ui.all.css" media="screen">


<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/adminmoban/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/themer.css" media="screen">
 <link href="/xc/css/bootstrap.min.css" rel="stylesheet">
    <link href="/xc/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/xc/css/templatemo_misc.css">
    <link type="text/css" rel="stylesheet" href="/xc/css/easy-responsive-tabs.css" />
    <link href="/xc/css/templatemo_style.css" rel="stylesheet"> 
        
    <script src="/xc/js/jquery-1.10.2.min.js"></script> 
    <script src="/xc/js/jquery.lightbox.js"></script>
    <script src="/xc/js/templatemo_custom.js"></script>
    <script src="/xc/js/easyResponsiveTabs.js" type="text/javascript"></script>   
<style type="text/css">
    .abc{
        float:left;
        list-style:none;
        margin:2px;
        padding: 2px 0 2px 0; 
        margin-right: 15px; 
        border-radius: 5px

    }

</style>
<article>
<div class="mws-panel grid_8">
<br><br><br>    
                       <div class="mws-panel-header">
                    
                         <ul >@foreach($name as $a => $b)
                            <li class = 'abc'>
                        <span><i class="icon-pictures"><a href="/home/xc/show/{{$b['id']}}"> <font color="white">{{$b['name']}}</font></a></i></span>
                              
                            </li>@endforeach
                        </ul>
                
                    </div>


                     @foreach($zp as $k => $v)
                        <div class="col-md-2 templatemo_leftgap">
                            <div class="templatemo_botgap templatemo_topgap gallery-item">
                                 <img src="{{$v['photo']}}" alt="gallery 7">
                                 <div class="overlay">
                                            <a href="{{$v['photo']}}" data-rel="lightbox" class="fa fa-arrows-alt"></a>
                                 </div>
                            </div>
                        </div>
                        @endforeach

                
                     
</div>
</article>
@endsection