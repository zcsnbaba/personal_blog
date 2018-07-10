@extends('admin.common.common')

@section('content')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>网站设置</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/wp/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">网站名称：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="name">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">网站描述：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="describe">
                        </div>
                    </div>
                   
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">网站备案号：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="filing">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">手机号：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="telephone">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">网站地址：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="url">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">版权信息：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="cright">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">网站logo：</label>
                        <div class="mws-form-item" style="width:48%">
                            <input type="file" name="logo" id="file"/> 
                        </div>
                    </div>
                   
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                    <a href="/admin/wp/index" class="btn btn-warning">返回</a>
                </div>
            </form>
        </div>      
    </div>
 </div>               
@endsection
	