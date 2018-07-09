@extends('admin.common.common')

@section('content')

<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><i class="icon-user"></i>网站配置</span>
        </div>
        <div class="mws-panel-body no-padding">            
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                    	<th>网站名称</th>
                    	<th>网站描述</th>
                    	<th>网站备案号</th>
                        <th>联系方式</th>
                    	<th>网站地址</th>
                        <th>版权信息</th>
                        <th>网站logo</th>
                        <th>操作</th>
                    </tr>
                </thead>
             <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($data as $k => $v)
	            <tr class="odd" style="border:1px #ccc solid">
	                <td class=" sorting_1" style="text-align:center">{{ $v['name'] }}</td>
	                <td class=" " style="text-align:center">{{ $v['describe'] }}</td>
	                <td class=" "  style="text-align:center">{{ $v['filing' ] }}</td>
                    <td class=" " style="text-align:center">{{ $v['telephone'] }}</td>
                    <td class=" "  style="text-align:center">{{ $v['url' ] }}</td>
                    <td class=" " style="text-align:center">{{ $v['cright'] }}</td>
                    <td style="text-align:center">
                        <img src="{{$v['logo']}}" class="img-rounded" style="width:80px;height:60px;">

                    </td>	           
	               
	                <td style="text-align:center">
	                	<a href="/admin/wp/edit/{{ $v['id'] }}" class="btn btn-warning">修改</a>
	                	<a href="/admin/wp/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
	                </td>
	            </tr>
			
            @endforeach
            </tbody>
            </table>
               
                    
            </div>
        </div>
    </div>

</div>         
@endsection
