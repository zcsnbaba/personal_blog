@extends('admin.common.common')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><i class="icon-table"></i> 文章列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>发表人</th>
                        <th>分类</th>
                        <th>文章标题</th>
                        <th>点击次数</th>
                        <th>是否推荐</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($article as $k => $v)
                    <tr>
                        <td>{{ $v['id'] }}</td>
                        <td>{{ $v['uname'] }}</td>
                        <td>{{ $v['name_class'] }}</td>
                        <td>{{ $v['title'] }}</td>
                        <td>{{ $v['ckick_count'] }}</td>
                        @if($v['is_recommend'] == '2')
                            <td>否</td>
                        @else
                            <td>是</td>
                        @endif
                        
                        <td>{{ $v['created_at'] }}</td>
                        <td>
                            <a href="/admin/article/edit/{{ $v['id'] }}" class="btn btn-success">详情</a>
                            <a href="/admin/article/edit/{{ $v['id'] }}" class="btn btn-warning">修改</a>
                            <a href="/admin/article/destroy/{{ $v['id'] }}" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($article->LastPage() > 1)
                    <a href="{{ $article->Url(1) }}" class="item{{ ($article->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        首页
                    </a>&nbsp;&nbsp;  
                    <a href="{{ $article->Url($article->last) }}" class="item{{ ($article->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        上一页
                    </a>&nbsp;&nbsp;  
                    @for ($i = 1; $i <= $article->LastPage(); $i++)
                        <a href="{{ $article->Url($i) }}" class="item{{ ($article->CurrentPage() == $i) ? ' active' : '' }}" style="border:1px #ccc solid">
                            &nbsp;&nbsp;&nbsp;{{ $i }}&nbsp;&nbsp;
                        </a>
                    @endfor
                    &nbsp;&nbsp;<a href="{{ $article->Url($article->next) }}" class="item{{ ($article->CurrentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon left arrow"></i> 
                        下一页
                    </a>&nbsp;&nbsp;
                    <a href="{{ $article->Url($article->LastPage()) }}" class="item{{ ($article->CurrentPage() == $article->LastPage()) ? ' disabled' : '' }}">
                        末页 
                        <i class="icon right arrow"></i>
                    </a>
                @endif
        </div>
    </div>
</div>
@endsection
