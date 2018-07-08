@extends('admin.common.common')

@section('content')  

<div class="mws-panel grid_7">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i> 导航列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">

                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                               <thead>
                                <tr class="odd">
                                    <th class=" sorting_1">ID</th>
                                    <th class=" ">导航名称</th>
                                    <th class=" ">url地址</th>
                                    <th class=" ">操作</th>
                                    
                                </tr>
                                </thead>
                                @foreach($data as $k=>$v)
                                <tr class="even" style="border:1px #ccc solid">
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