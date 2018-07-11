@extends('admin.common.common')

@section('content')


    	<div class="mws-panel-header">
        	<span><i class="icon-user"></i> 用户列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <form action="/admin/user/index" method="git">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>搜索用户名 ：<input type="text" aria-controls="DataTables_Table_0" name="username"><input type="submit" class="btn btn-success" value="搜索"></label></div>
            </form>
                <thead>
                    <tr role="row">
                    	<th>ID</th>
                    	<th>用户名</th>
                    	<th>性别</th>
                    	<th>权限</th>
                    	<th>手机号</th>
                    	<th>注册时间</th>
                    	<th>头像</th>
                    	<th>操作</th>
                    </tr>
                </thead>
             <tbody role="alert" aria-live="polite" aria-relevant="all">

             @foreach($user_data as $k => $v)
	            <tr class="odd" style="border:1px #ccc solid">
	                <td class=" sorting_1">{{ $v['id'] }}</td>
	                <td class=" ">{{ $v['uname'] }}</td>
	                <td class=" ">{{ $v['sex' ] }}</td>
	                <td class=" ">{{ $v['superuser' ] }}</td>
	                <td class=" ">{{ $v['phone'] }}</td>
	                <td class=" ">{{ $v['created_at'] }}</td>
	                @if($v['avatar'])
	                	<td>
	                		<img src="{{ $v['avatar'] }}" class="img-rounded" style="width:70px;height:70px;">
	                	</td>
	                @else
	                	<td>
	                		<img src="/adminmoban/images/touxiang.jpg" class="img-rounded" style="width:70px;height:70px;">
	                	</td>
	                @endif
	                
	                <td>
	                	<a href="/admin/user/edit/{{ $v['id'] }}" class="btn btn-warning">修改</a>
	                	<a href="/admin/user/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
	                </td>
	            </tr>
			
            @endforeach
            </tbody>
            </table>
                @if ($user_data->LastPage() > 1)
                    <a href="{{ $user_data->Url(1) }}" class="item{{ ($user_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        首页
                    </a>&nbsp;&nbsp;  
                    <a href="{{ $user_data->Url($user_data->last) }}" class="item{{ ($user_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        上一页
                    </a>&nbsp;&nbsp;  
                    @for ($i = 1; $i <= $user_data->LastPage(); $i++)
                        <a href="{{ $user_data->Url($i) }}" class="item{{ ($user_data->CurrentPage() == $i) ? ' active' : '' }}" style="border:1px #ccc solid">
                            &nbsp;&nbsp;&nbsp;{{ $i }}&nbsp;&nbsp;
                        </a>
                	@endfor
                	&nbsp;&nbsp;<a href="{{ $user_data->Url($user_data->next) }}" class="item{{ ($user_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        下一页
                    </a>&nbsp;&nbsp;
                    <a href="{{ $user_data->Url($user_data->LastPage()) }}" class="item{{ ($user_data->CurrentPage() == $user_data->LastPage()) ? ' disabled' : '' }}">
                        末页 
                        <i class="icon right arrow"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>         
@endsection
