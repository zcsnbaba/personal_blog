@extends('admin.common.common')

@section('content')
<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>Inline Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="/admin/xc/tpstore" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="mws-form-inline">                                                                                             
                                <div class="mws-form-row">
                                    <label class="mws-form-label">相册分类</label>
                                    <div class="mws-form-item">
                                        <select class="large" name="cid">
                                        @foreach($data as $k => $v)
                                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                                        @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                                 <div class="mws-form-row">[]
                                    <label class="mws-form-label">图片：</label>
                                    <div class="mws-form-item" style="width:48%">
                                        <input type="file" name="avatar[]" id="file" multiple/> 
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="Submit" class="btn btn-danger">
                                <input type="reset" value="Reset" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>
@endsection
