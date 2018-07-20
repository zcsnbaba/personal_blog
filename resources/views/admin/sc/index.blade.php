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
                    	<th>文章名</th>
                    	<th>收藏时间</th>
                    	<th>操作</th>
                    </tr>
                </thead>
             <tbody role="alert" aria-live="polite" aria-relevant="all">

             @foreach($sc_data as $k => $v)
	            <tr class="odd" style="border:1px #ccc solid">
	                <td class=" sorting_1">{{ $v['id'] }}</td>
	                <td class=" ">{{ $v['uname'] }}</td>
	                <td class=" ">{{ $v['title' ] }}</td>
	                <td class=" ">{{ $v['times' ] }}</td>
	                <td>
	                	<a href="/admin/sc/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
	                </td>
	            </tr>
			
            @endforeach
            </tbody>
            </table>
                  @if ($sc_data->LastPage() > 1)
                      <a href="{{ $sc_data->Url(1) }}" class="item{{ ($sc_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                          <i class="icon left arrow"></i> 
                          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">首页</b>&nbsp;
                      </a> 
                      <a href="{{ $sc_data->Url($sc_data->last) }}" class="item{{ ($sc_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                          <i class="icon left arrow"></i> 
                          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">上一页</b>
                      </a>  
                      @for ($i = 1; $i <= $sc_data->LastPage(); $i++)
                      @if(($sc_data->last + 1) == $i)

                          <a href="{{ $sc_data->Url($i) }}" class="item{{ ($sc_data->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#ccc;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
                      @else
                          <a href="{{ $sc_data->Url($i) }}" class="item{{ ($sc_data->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
                      @endif
                      @endfor
                    <a href="{{ $sc_data->Url($sc_data->next) }}" class="item{{ ($sc_data->CurrentPage() == 1) ? ' disabled' : '' }}">
                          <i class="icon left arrow"></i> 
                          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">下一页</b>&nbsp;
                      </a>
                      <a href="{{ $sc_data->Url($sc_data->LastPage()) }}" class="item{{ ($sc_data->CurrentPage() == $sc_data->LastPage()) ? ' disabled' : '' }}">
                          <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">尾页</b>
                          <i class="icon right arrow"></i>
                      </a>
                  @endif
            </div>
        </div>
    </div>
</div>         
@endsection
