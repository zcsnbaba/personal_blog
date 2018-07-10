@extends('admin.common.common')

@section('content')

        <div class="mws-panel-header">
            <span>Bordered Form</span>
                </div>
                <div class="mws-panel-body no-padding">
                    <form class="mws-form" action="/admin/xc/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="mws-form-inline">
                            <div class="mws-form-row bordered">
                                <label class="mws-form-label">相册名称</label>
                                <div class="mws-form-item">
                                    <input type="text" class="small" name="name">
                                </div>
                            </div>

                           
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>
            </form>
        </div>      
    </div>
@endsection