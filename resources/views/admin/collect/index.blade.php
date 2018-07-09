@extends('admin.common.common')

@section('content')
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 分类列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户ID</th>
                    <th>文章ID</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($collect as $k => $v)
                <tr style="border:1px #ccc solid">
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['uname'] }}</td>
                    <td>{{ $v['title'] }}</td>
                    <td>{{ $v['created_at'] }}</td>
                    <td>
                    	<a href="/admin/collect/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection