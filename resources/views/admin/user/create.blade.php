@extends('admin.common.common')

@section('content')
 <div id="mws-container" class="clearfix">

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>用户添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/user/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">用户名：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="uname">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">密 码：</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="password">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">性 别：</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" value="1" name="sex" checked> <label>男</label></li>
                                <li><input type="radio" value="2" name="sex"> <label>女</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">权 限：</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" value="1" name="superuser" checked> <label>游客</label></li>
                                <li><input type="radio" value="2" name="superuser"> <label>博主</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">手机号：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phone">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"> Q Q：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="qq">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">邮 箱：</label>
                        <div class="mws-form-item">
                            <input type="email" class="small" name="email">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">头 像：</label>
                        <div class="mws-form-item" style="width:48%">
                            <input type="file" name="avatar" id="file"/> 
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                    <input type="reset" value="返回" class="btn btn-warning">
                </div>
            </form>
        </div>      
    </div>
 </div>               
@endsection
	