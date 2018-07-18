@extends('admin.common.common')

@section('content')
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>文章修改</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/about/update" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
				<div class="mws-form-row">
    				<label class="mws-form-label">文章内容：</label>
    				<script id="container" name="content" type="text/plain" style="width:87%;height:500px">
				    {!! $about['0']['content'] !!}
				    </script>
				    <script type="text/javascript">
				        var ue = UE.getEditor('container');
				    </script>
    			</div>
    		<div class="mws-button-row">
    			<input type="submit" value="修改" class="btn btn-danger">
    		</div>
    	</form>
    </div>
</div>

@endsection