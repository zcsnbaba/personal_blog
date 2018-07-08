@extends('admin.common.common')

@section('content')
	 <div id="mws-container" class="clearfix">
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-magic"></i> 添加分类</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form id="mws-wizard-form" class="mws-form" action="/admin/category/store" method="post">
                            {{ csrf_field() }}
                            <fieldset id="step-1" class="mws-form-inline">                             
                                <div id class="mws-form-row">
                                    <label class="mws-form-label">分类名称<span class="required">*</span></label>
                                    <div class="mws-form-item">
                                        <input type="text" name="name_class" class="required large">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success" value="　添　　加　">
                            </fieldset>                          
                        </form>
                    </div>
                </div>
	</div>
@endsection