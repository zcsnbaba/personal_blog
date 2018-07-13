@extends('admin.common.common')

@section('content')

<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-user"></i>相册列表</span>
        </div>
        <div class="mws-panel-body no-padding">            
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th>相册ID</th>
                        <th>相册名称</th>
                        <th>操作</th>
                    </tr>
                </thead>
             <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($data as $k => $v)
                <tr class="odd" style="border:1px #ccc solid">
                    <td class=" sorting_1" style="text-align:center">{{ $v['id'] }}</td>
                    <td class=" " style="text-align:center">{{ $v['name'] }}</td>
  
                   
                    <td style="text-align:center">
                        <a href="/admin/xc/edit/{{ $v['id'] }}" class="btn btn-warning">修改</a>
                        <a href="/admin/xc/destroy/{{ $v['id'] }}" class="btn btn-warning">删除</a>
                        <a href="/admin/xc/show/{{ $v['id'] }}" class="btn btn-info">查看</a>
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
