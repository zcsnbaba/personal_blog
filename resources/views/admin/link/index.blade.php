@extends('admin.common.common')

@section('content') 
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 友情链接</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>网站名称</th>
                        <th>网站标题</th>
                        <th>网站链接</th>
                        <th>图片链接</th>
                        <th>操作</th>
                    </tr>
                </thead>
                            
                <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                @foreach($link as $k => $v)
                <tr>
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['link_name'] }}</td>
                    <td>{{ $v['link_title'] }}</td>
                    <td>{{ $v['link_url'] }}</td>
                    <td>{{ $v['link_logo'] }}</td>
                    <td>
                        <a href="" class="btn btn-warning">修改</a>
                        <a href="" class="btn btn-danger">删除</a>
                    </td>
                </tr>
                @endforeach
            </div>
        </div>
    </div>            
@endsection
