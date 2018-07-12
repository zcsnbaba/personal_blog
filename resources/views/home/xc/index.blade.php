@extends('home.common.common')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-pictures"></i> 相册显示</span>
                    </div>
@foreach($xc as $k => $v)
                    <div class="mws-panel-body"   style="background-image: url(/photos/20180712/PxYMskKEjjTMtx9HSKok.jpg) no-repeat;">
                    
                        <ul class="thumbnails mws-gallery">
                            <li>
                                <span class="thumbnail"><img src="{{$v['photo']}}" alt=""></span>
                                <span class="mws-gallery-overlay">
                                    <a href="/admin/xc/tpedit/{{$v['id']}}" class="mws-gallery-btn"><i class="icon-pencil"></i></a>
                                    <a href="/admin/xc/tpdestroy/{{$v['id']}}" class="mws-gallery-btn"><i class="icon-trash"></i></a>
                                </span>
                                <span></span>
                            </li>
                
                        </ul>
                    </div>
@endforeach                     
</div>
@endsection