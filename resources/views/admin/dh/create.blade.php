@extends('admin.common.common')

@section('content')  

    <div class="mws-panel grid_7">
        <div class="mws-panel-header">
            <span>导航添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="store" method="post">
            {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">导航名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="name">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">url地址</label>
                        <div class="mws-form-item">
                            <input type="text" class="medium" name="url">
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                    <a href="/admin/dh/index" class="btn btn-warning">返回</a>
                </div>
            </form>
        </div>      
    </div>
</div>                      
@endsection
	