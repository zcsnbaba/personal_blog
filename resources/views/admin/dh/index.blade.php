@extends('admin.common.common')

@section('content')  
<div class="container">
<div class="mws-panel grid_7">
@if(session('success'))
<div class="mws-form-message success">                             
{{ session('success') }}
</div>
@endif
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> 导航列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_0_length" class="dataTables_length"><label>Show <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Search: <input type="text" aria-controls="DataTables_Table_0"></label></div><table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">

                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                               
                                <tr class="odd">
                                    <td class=" sorting_1">ID</td>
                                    <td class=" ">导航名称</td>
                                    <td class=" ">url地址</td>
                                    <td class=" ">操作</td>
                                    
                                </tr>
                                @foreach($data as $k=>$v)
                                <tr class="even">
                                    <td class=" sorting_1">{{$v['id']}}</td>
                                    <td class=" ">{{$v['name']}}</td>
                                    <td class=" ">{{$v['url']}}</td>
                                    <td>
                                        <a href="/admin/dh/edit/{{$v['id']}}" class="btn btn-warning">修改</a>
                                        <a href="/admin/dh/destroy/{{$v['id']}}" class="btn btn-danger">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody></table>
                    </div>
                </div>
                </div>
@endsection