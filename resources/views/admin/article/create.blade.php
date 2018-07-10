@extends('admin.common.common')

@section('content')
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>文章添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/article/store" method="post">
    		{{ csrf_field() }}
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章标题：</label>
    				<div class="mws-form-item">
    					<input type="text" class="medium" name="title">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">选择分类：</label>
    				<div class="mws-form-item">
    					<select class="medium" name="cid">
    						@foreach($article as $k => $v)
								<option value="{{ $v['id'] }}">{{ $v['name_class'] }}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
                        <label class="mws-form-label">是否推荐：</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" value="1" name="is_recommend"> <label>是</label></li>
                                <li><input type="radio" value="2" name="is_recommend" checked> <label>否</label></li>
                            </ul>
                        </div>
                    </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">文章描述：</label>
    				<div class="mws-form-item">
    					<textarea cols="91" rows="2" style="height:75px" name="desc"></textarea>
    				</div>
    			</div>
    			
				<div class="mws-form-row">
    				<label class="mws-form-label">文章内容：</label>
    				<script id="container" name="content" type="text/plain" style="width:87%;height:500px">
				        
				    </script>
				    <script type="text/javascript">
				        var ue = UE.getEditor('container',{toolbars: [
						    ['fullscreen', 'source', 'undo', 'redo','bold','italic','underline','pasteplain','time','date','mergeright','mergedown','deleterow','deletecol', 'splittorows','splittocols','splittocells',],
						    [ 'justifyleft', 'justifyright','justifycenter', 'justifyjustify', 'forecolor', 'backcolor','insertorderedlist', 'insertunorderedlist', 'fullscreen', 'directionalityltr','directionalityrtl', 'rowspacingtop','rowspacingbottom','pagebreak','simpleupload','insertimage',]
						]});
				    </script>
    			</div>
    		<div class="mws-button-row">
    			<input type="submit" value="提交" class="btn btn-danger">
    			<a href="/admin/article/index" class="btn btn-warning">返回</a>
    		</div>
    	</form>
    </div>
</div>




@endsection