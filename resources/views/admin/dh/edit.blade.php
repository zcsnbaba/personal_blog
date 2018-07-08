@extends('admin.common.common')

@section('content')  
<div class="mws-panel grid_6">
    <div class="mws-panel-header">
        <span>导航修改</span>
    </div>

    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/dh/update/{{$data['id']}}" method="post">
        {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">导航名称</label>

                    <div class="mws-form-item">
                        <input type="text" class="small" name="name" value="{{$data['name']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">url地址</label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="url" value="{{$data['url']}}">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <input type="reset" value="刷新" class="btn ">
            </div>
        </form>
    </div>      
</div>                      
@endsection
	