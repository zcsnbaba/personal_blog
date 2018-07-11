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
    	<form class="mws-form" action="/admin/article/update/{{ $article_data['id'] }}" method="post" enctype="multipart/form-data">
    		{{ csrf_field() }}
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章标题：</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="title" value="{{ $article_data['title'] }}">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">选择分类：</label>
    				<div class="mws-form-item">
    					<select class="medium" name="cid">
                            @foreach($article as $k => $v)
                                <option value="{{ $v['id'] }}" @if($v['id'] == $article_data['cid']) selected @endif>{{ $v['name_class'] }}</option>
                            @endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
                    <label class="mws-form-label">是否推荐：</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" value="1" name="is_recommend" @if($article_data['is_recommend'] == '1') checked @endif> <label>是</label></li>
                            <li><input type="radio" value="2" name="is_recommend" @if($article_data['is_recommend'] == '2') checked @endif> <label>否</label></li>
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">文章图片：</label>
                    <div class="mws-form-item" style="width:48%">
                        <input type="file" name="file" id="file" onchange="imgPreview(this)"/> 
                        <img id="preview" style="width:200px">
                        <img src="{{ $article_data['file'] }}" style="width:200px">
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章描述：</label>
    				<div class="mws-form-item">
    					<textarea cols="91" rows="2" style="height:75px" name="desc" value="">{{ $article_data['desc'] }}</textarea>
    				</div>
    			</div>
				<div class="mws-form-row">
    				<label class="mws-form-label">文章内容：</label>
    				<script id="container" name="content" type="text/plain" style="width:87%;height:500px">
				        {!! $article_data['content'] !!}
				    </script>
				    <script type="text/javascript">
				        var ue = UE.getEditor('container');
				    </script>
    			</div>
    		<div class="mws-button-row">
    			<input type="submit" value="修改" class="btn btn-danger">
    			<a href="/admin/article/index" class="btn btn-warning">返回</a>
    		</div>
    	</form>
    </div>
</div>
<script type="text/javascript">
    function imgPreview(fileDom){
        //判断是否支持FileReader
        if (window.FileReader) {
            var reader = new FileReader();
        } else {
            alert("您的设备不支持图片预览功能，如需该功能请升级您的设备！");
        }

        //获取文件
        var file = fileDom.files[0];
        var imageType = /^image\//;
        //是否是图片
        if (!imageType.test(file.type)) {
            alert("请选择图片！");
            return;
        }
        //读取完成
        reader.onload = function(e) {
            //获取图片dom
            var img = document.getElementById("preview");
            //图片路径设置为读取的图片
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>



@endsection