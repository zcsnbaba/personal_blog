@extends('admin.common.common')

@section('content')

<div class="mws-panel grid_6">
<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><i class="icon-user"></i> 轮播列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                    	<th>ID</th>
                    	<th>名称</th>
                    	<th>url</th>
                        <th>图片</th>
                    	<th>操作</th>
                    </tr>
                </thead>
             <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($data as $k => $v)
	            <tr class="odd" style="border:1px #ccc solid">
	                <td class=" sorting_1" style="text-align:center">{{ $v['id'] }}</td>
	                <td class=" " style="text-align:center">{{ $v['carousel_name'] }}</td>
	                <td class=" "  style="text-align:center">{{ $v['url' ] }}</td>
                        <td style="text-align:center">
                            <img src="{{$v['address']}}" class="img-rounded" style="width:80px;height:60px;">
                        </td>	           
	               
	                <td style="text-align:center">
	                	<a href="/admin/lb/edit/{{ $v['id'] }}" class="btn btn-warning">修改</a>
	                	<a href="/admin/lb/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
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
