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
<style type="text/css">
    .abc{
        float:left;
        list-style:none;
        margin:2px;
        padding: 2px 0 2px 0; margin-right: 15px; border-radius: 5px

    }

</style>
<br><br><br>    
<article>
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                    
                         <ul >@foreach($xcfl as $a => $b)
                            <li class = 'abc'>
                        <span><i class="icon-pictures"><a href="/home/xc/show/{{$b['id']}}"> <font color="white">{{$b['name']}}</font></a></i></span>
                              
                            </li>@endforeach
                        </ul>
                
                    </div>

                    <div class="mws-panel-body">
                        <ul class="thumbnails mws-gallery">@foreach($xc as $k => $v)
                            <li>
                                <span class="thumbnail"><img src="{{$v['photo']}}" alt=""></span>

                                
                                <span></span>
                            </li>@endforeach
                
                        </ul>
                    </div>
                     
</div>

</article>

                 
@endsection