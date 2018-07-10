@extends('admin.common.common')

@section('content')


        <div class="mws-panel-header">
            <span>用户添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/user/update/{{ $user_data['id'] }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">用户名：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="uname" value="{{ $user_data['uname'] }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">性 别：</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                @if($user_data['sex']  == '男') 
                                    <li><input type="radio" value="1" name="sex" checked> <label>男</label></li>
                                    <li><input type="radio" value="2" name="sex"> <label>女</label></li>
                                @else
                                    <li><input type="radio" value="1" name="sex"> <label>男</label></li>
                                    <li><input type="radio" value="2" name="sex" checked> <label>女</label></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">权 限：</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                @if($user_data['superuser']  == '男') 
                                    <li><input type="radio" value="1" name="superuser" checked> <label>游客</label></li>
                                    <li><input type="radio" value="2" name="superuser"> <label>博主</label></li>
                                @else
                                    <li><input type="radio" value="1" name="superuser"> <label>游客</label></li>
                                    <li><input type="radio" value="2" name="superuser" checked> <label>博主</label></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">手机号：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="phone" value="{{ $user_data['phone'] }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"> Q Q：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="qq" value="{{ $user_data['qq'] }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">邮 箱：</label>
                        <div class="mws-form-item">
                            <input type="email" class="small" name="email" value="{{ $user_data['email'] }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">头 像：</label>
                        <div class="mws-form-item" style="width:48%">
                            <input type="file" name="avatar" id="file"/>
                            @if($user_data['avatar'])
                                <img src="{{ $user_data['avatar'] }}" class="img-rounded" style="width:70px;height:70px;border:1px #ccc double" value="1"> 
                                <input type="hidden" name="avatar" value="{{ $user_data['avatar'] }}">
                            @else
                                <img src="/adminmoban/images/touxiang.jpg" class="img-rounded" style="width:70px;height:70px;border:1px #ccc double" value="12">      
                                <input type="hidden" name="avatar" value="/adminmoban/images/touxiang.jpg">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success">
                    <a href="/admin/user/index" class="btn btn-warning">返回</a>
                </div>
            </form>
        </div>      
    </div>
 </div>               
@endsection
	