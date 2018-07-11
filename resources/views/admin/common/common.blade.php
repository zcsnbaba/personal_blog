<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/adminmoban/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/adminmoban/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/adminmoban/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/adminmoban/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/adminmoban/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/adminmoban/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/adminmoban/css/themer.css" media="screen">

<title>{{ $common['web']['0']['name'] }}</title>

</head>
    <!-- Themer (Remove if not needed) -->  
    <div id="mws-themer">
        <div id="mws-themer-content">
            <div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
            <div id="mws-theme-presets-container" class="mws-themer-section">
                <label for="mws-theme-presets">颜色设置</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div id="mws-theme-pattern-container" class="mws-themer-section">
                <label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>基色：</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>突出颜色：</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>文本颜色：</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>文本发光颜色：</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>文本发光不透明度：</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <button class="btn btn-danger small" id="mws-themer-getcss">CSS样式</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
            <form class="mws-form">
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="mws-header" class="clearfix">
        <div id="mws-logo-container">
            <div id="mws-logo-wrap">
                <img src="{{ $common['web']['0']['logo'] }}" alt="mws admin">
            </div>
        </div>
        <div id="mws-user-tools" class="clearfix">
            <div id="mws-user-info" class="mws-inset">
                <div id="mws-user-photo">
                    <img src="/adminmoban/example/profile.jpg" alt="User Photo">
                </div>
                <div id="mws-user-functions">
                    <div id="mws-username">
                        zcwd
                    </div>
                    <ul>
                        <li><a href="/"><i class="icon-file-openoffice" style="color:red"></i> 前台</a></li>
                        <li><a href="#"> | </a></li>
                        <li><a href="/"><i class="icon-off" style="color:red"> </i> 退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/category">分类列表</a></li>
                            <li><a href="/admin/category/create">分类添加</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#"><i class="icon-book"></i> 文章管理</a>
                        <ul>
                            <li><a href="/admin/article/index">文章列表</a></li>
                            <li><a href="/admin/article/create">文章添加</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/user/create">用户添加</a></li>
                            <li><a href="/admin/user/index">用户查看</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-th"></i>导航管理</a>
                        <ul>
                            <li><a href="/admin/dh/index">导航列表</a></li>
                            <li><a href="/admin/dh/create">添加导航</a></li>
                        </ul>
                    </li>  
                    
                    <li>
                        <a href="#"><i class="icon-pictures"></i>轮播管理</a>
                        <ul>
                            <li><a href="/admin/lb/index">轮播列表</a></li>
                            <li><a href="/admin/lb/create">添加轮播</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/wp/edit"><i class="icon-cog-2"></i>网站配置管理</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-picture"></i>相册管理</a>
                        <ul>
                            <li><a href="/admin/xc/index">相册列表</a></li>
                            <li><a href="/admin/xc/create">添加相册</a></li>
                            <li><a href="/admin/xc/tpcreate">添加图片</a></li>
                        </ul>
                    </li>
                    <li>        
                        <a href="/admin/collect"><i class="icon-archive"></i>文章收藏管理</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-th"></i>友情链接管理</a>
                        <ul>
                            <li><a href="/admin/link">友情链接列表</a></li>
                            <li><a href="/admin/link/create">友情链接添加</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="/admin/message/index"><i class="icon-sound"></i>留言管理</a>
                    </li>
                </ul>
            </div>                    
        </div>   
<div class="container">
<div class="mws-panel grid_6">
@if(session('success'))
<div class="mws-form-message success">                             
{{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="mws-form-message error">                             
{{ session('error') }}
</div>
@endif
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')


@show
<body>
    <script src="/adminmoban/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/adminmoban/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/adminmoban/js/libs/jquery.placeholder.min.js"></script>
    <script src="/adminmoban/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/adminmoban/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/adminmoban/jui/jquery-ui.custom.min.js"></script>
    <script src="/adminmoban/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/adminmoban/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/adminmoban/plugins/flot/jquery.flot.min.js"></script>
    <script src="/adminmoban/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/adminmoban/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/adminmoban/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/adminmoban/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/adminmoban/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/adminmoban/plugins/validate/jquery.validate-min.js"></script>
    <script src="/adminmoban/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/adminmoban/bootstrap/js/bootstrap.min.js"></script>
    <script src="/adminmoban/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/adminmoban/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/adminmoban/js/demo/demo.dashboard.js"></script>

</body>
</html>