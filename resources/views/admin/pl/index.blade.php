@extends('admin.common.common')

@section('content')


    	<div class="mws-panel-header">
        	<span><i class="icon-user"></i> 评论列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <form action="/admin/pl/index" method="git">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div class="dataTables_filter" id="DataTables_Table_0_filter"><label>搜索评论 ：<input type="text" name="search" class="form-control" id="content" placeholder="评论"><input type="submit" class="btn btn-success" value="搜索"></label></div>
            </form>
                <thead>
                    <tr role="row">
                    	<th>ID</th>
                    	<th>用户名</th>
                    	<th>内容</th>
                    	<th>发表时间</th>
                    	<th>文章</th>
                    	<th>操作</th>
                    </tr>
                </thead>
             <tbody role="alert" aria-live="polite" aria-relevant="all">

             @foreach($pl as $k => $v)
	            <tr class="odd" style="border:1px #ccc solid">
	                <td class=" sorting_1" style="text-align:center">{{ $v['id'] }}</td>
	                <td class=" " style="text-align:center">{{ $v['name'] }}</td>
	                <td class=" " style="text-align:center">{{ $v['content' ] }}</td>
	                <td class=" " style="text-align:center">{{ $v['created_at' ] }}</td>
	                <td class=" " style="text-align:center">{{ $v['title'] }}</td>               
	                <td>
	                	<a href="/admin/pl/edit/{{ $v['id'] }}" class="btn btn-warning">修改</a>
	                	<a href="/admin/pl/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
	                </td>
	            </tr>
			
            @endforeach
            </tbody>
            </table>
            @if ($pl->LastPage() > 1)
                  <a href="{{ $pl->Url(1) }}&search={{ $search}}" class="item{{ ($pl->CurrentPage() == 1) ? ' disabled' : '' }}">
                      <i class="icon left arrow"></i> 
                      <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">首页</b>&nbsp;
                  </a> 
                  <a href="{{ $pl->Url($pl->last) }}&search={{ $search}}" class="item{{ ($pl->CurrentPage() == 1) ? ' disabled' : '' }}">
                      <i class="icon left arrow"></i> 
                      <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">上一页</b>
                  </a>  
                  @for ($i = 1; $i <= $pl->LastPage(); $i++)
                  @if(($pl->last + 1) == $i)

                      <a href="{{ $pl->Url($i) }}&search={{ $search}}" class="item{{ ($pl->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#ccc;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
                  @else
                      <a href="{{ $pl->Url($i) }}&search={{ $search}}" class="item{{ ($pl->CurrentPage() == $i) ? ' active' : '' }}" name="nb" value="1"><b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">&nbsp;{{ $i }}&nbsp;</b></a>
                  @endif
                  @endfor
                <a href="{{ $pl->Url($pl->next) }}&search={{ $search}}" class="item{{ ($pl->CurrentPage() == 1) ? ' disabled' : '' }}">
                      <i class="icon left arrow"></i> 
                      <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">下一页</b>&nbsp;
                  </a>
                  <a href="{{ $pl->Url($pl->LastPage()) }}&search={{ $search}}" class="item{{ ($pl->CurrentPage() == $pl->LastPage()) ? ' disabled' : '' }}">
                      <b style="color:#f0f;font-size: 20px;border:4px #ccc dotted">尾页</b>
                      <i class="icon right arrow"></i>
                  </a>
              @endif
            </div>
        </div>
    </div>
</div>         
@endsection
