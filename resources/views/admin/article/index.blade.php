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
                                    <th>文章描述</th>
                                    <th>文章内容</th>
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
                                    <td>{{ $v['uid'] }}</td>
                                    <td>{{ $v['cid'] }}</td>
                                    <td>{{ $v['title'] }}</td>
                                    <td>{{ $v['desc'] }}</td>
                                    <td>{{ $v['content'] }}</td>
                                    <td>{{ $v['ckick_count'] }}</td>
                                    <td>{{ $v['is_recommend'] }}</td>
                                    <td>{{ $v['created_at'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
   	</div>
@endsection