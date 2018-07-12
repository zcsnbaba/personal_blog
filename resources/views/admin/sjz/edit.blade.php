@extends('admin.common.common')

@section('content')  
    <div class="mws-panel-header">
        <span>内容修改</span>
    </div>

    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/sjz/update/{{$data['id']}}" method="post">
        {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">内容</label>    
                    <div class="mws-form-item">
                        <input type="text" class="small" name="title" value="{{$data['title']}}">
                    </div>
                </div>
                
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <a href="/admin/sjz/index" class="btn btn-warning">返回</a>
            </div>
        </form>
    </div>      
</div>                      
@endsection
	