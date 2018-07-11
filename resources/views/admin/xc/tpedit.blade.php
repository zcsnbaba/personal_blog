@extends('admin.common.common')

@section('content')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>相片修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/xc/tpjd/{{ $data['id'] }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">相册分类</label>
                                    <div class="mws-form-item">
                                        <select class="large" name="cid">
                                        @foreach($data2 as $k => $v)
                                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">头 像：</label>
                        <div class="mws-form-item" style="width:48%">
                            <input type="file" name="avatar" id="file"/>
        
                                <img src="{{ $data['photo'] }}" class="img-rounded" style="width:70px;height:70px;border:1px #ccc double" value="1"> 
                                <input type="hidden" name="avatar" value="{{ $data['photo'] }}">
                            
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success">
                    <input type="reset" value="返回" class="btn btn-warning">
                </div>
            </form>
        </div>      
    </div>
 </div>               
@endsection
	