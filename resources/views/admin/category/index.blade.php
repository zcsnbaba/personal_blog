@extends('admin.common.common')

@section('content')
<div class="mws-panel grid_6">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> 分类列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name_class</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($cate as $k => $v)
                <tr style="border:1px #ccc solid">
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['name_class'] }}</td>
                    <td>
                    	<a href="/admin/category/edit/{{ $v['id'] }}" class="btn btn-warning">修改</a>
                    	<a href="/admin/category/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $cate -> render() !!}
</div>
@endsection

