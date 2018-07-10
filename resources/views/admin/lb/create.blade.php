@extends('admin.common.common')

@section('content')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>轮播添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/lb/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">图片名称：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="carousel_name">
                        </div>
                    </div>
                   
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">图片链接：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="url">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">图片：</label>
                        <div class="mws-form-item" style="width:48%">
                            <input type="file" name="avatar" id="file"/> 
                        </div>
                    </div>
                   
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                    <a href="/admin/lb/index" class="btn btn-warning">返回</a>
                </div>
            </form>
        </div>      
    </div>
 </div>               
@endsection
	