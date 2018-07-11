@extends('admin.common.common')

@section('content')


    	<div class="mws-panel-header">
        	<span><i class="icon-user"></i> 用户列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <form action="/admin/message/index" method="git">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>搜索用户名 ：<input type="text" aria-controls="DataTables_Table_0" name="username"><input type="submit" class="btn btn-success" value="搜索"></label></div>
                </form>
                <thead>
                    <tr role="row">
                    	<th>ID</th>
                    	<th>用户名</th>
                    	<th>留言内容</th>
                        <th>留言时间</th>
                        <th>好评次数</th>
                        <th>差评次数</th>
                    	<th>操作</th>
                    </tr>
                </thead>
             <tbody role="alert" aria-live="polite" aria-relevant="all">
             @foreach($message_data as $k => $v)
	            <tr class="odd" style="border:1px #ccc solid">
	                <td class=" sorting_1">{{ $v['id'] }}</td>
                    <td class=" ">{{ $v['uname'] }}</td>
                    <td class=" ">{{ $v['content'] }}</td>
                    <td class=" ">{{ $v['created_at'] }}</td>
                    <td class=" ">{{ $v['praise'] }}</td>
	                <td class=" ">{{ $v['badreview'] }}</td>
	              
	                
	                <td>
	                	<a href="/admin/message/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
	                </td>
	            </tr>
			
            @endforeach
            </tbody>
            </table>
                @if ($message_data->LastPage() > 1)
                    <a href="{{ $message_data->Url(1) }}" class="item{{ ($message_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        首页
                    </a>&nbsp;&nbsp;  
                    <a href="{{ $message_data->Url($message_data->last) }}" class="item{{ ($message_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        上一页
                    </a>&nbsp;&nbsp;  
                    @for ($i = 1; $i <= $message_data->LastPage(); $i++)
                        <a href="{{ $message_data->Url($i) }}" class="item{{ ($message_data->CurrentPage() == $i) ? ' active' : '' }}" style="border:1px #ccc solid">
                            &nbsp;&nbsp;&nbsp;{{ $i }}&nbsp;&nbsp;
                        </a>
                	@endfor
                	&nbsp;&nbsp;<a href="{{ $message_data->Url($message_data->next) }}" class="item{{ ($message_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        下一页
                    </a>&nbsp;&nbsp;
                    <a href="{{ $message_data->Url($message_data->LastPage()) }}" class="item{{ ($message_data->CurrentPage() == $message_data->LastPage()) ? ' disabled' : '' }}">
                        末页 
                        <i class="icon right arrow"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>

</div>         
@endsection
