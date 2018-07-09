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
    	<form class="mws-form" action="/admin/article/update/{{ $article_data['id'] }}" method="post">
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
    			<input type="reset" value="返回" class="btn ">
    		</div>
    	</form>
    </div>
</div>




@endsection