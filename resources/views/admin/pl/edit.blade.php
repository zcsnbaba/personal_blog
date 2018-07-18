@extends('admin.common.common')

@section('content')  
    <div class="mws-panel-header">
        <span>评论内容修改</span>
    </div>

    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/pl/update/{{$pl['id']}}" method="post">
        {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">评论内容</label>

                    <div class="mws-form-item">
                        <input type="text" class="small" name="content" value="{{$pl['content']}}">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <a href="/admin/pl/index" class="btn btn-warning">返回</a>
            </div>
        </form>
    </div>      
</div>                      
@endsection
	