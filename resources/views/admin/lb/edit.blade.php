@extends('admin.common.common')

@section('content')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>轮播修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/lb/update/{{ $data['id'] }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">图片名字：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="carousel_name" value="{{ $data['carousel_name'] }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"> 图片链接：</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="url" value="{{ $data['url'] }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">头 像：</label>
                        <div class="mws-form-item" style="width:48%">
                            <input type="file" name="avatar" id="file"/>
        
                                <img src="{{ $data['address'] }}" class="img-rounded" style="width:70px;height:70px;border:1px #ccc double" value="1"> 
                                <input type="hidden" name="avatar" value="{{ $data['address'] }}">
                            
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-success">
                    <a href="/admin/lb/index" class="btn btn-warning">返回</a>
                </div>
            </form>
        </div>      
    </div>
 </div>               
@endsection
	