@extends('admin.common.common')

@section('content') 
	<div id="mws-container" class="clearfix">
	<div class="mws-panel grid_8">
	 <form id="mws-wizard-form" class="mws-form" action="/admin/link/store" method="post">
            {{ csrf_field() }}
            <fieldset id="step-1" class="mws-form-inline">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 友情链接</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
		<tr>
            <th><i class="require-red"></i>网址名称：</th>
            <td>
                <input class="common-text required" id="title" name="link_name" size="50" value="" type="text">
            </td>
        </tr>
        <tr>
            <th><i class="require-red"></i>网址标题：</th>
            <td>
                <input class="common-text required" id="title" name="link_title" size="50" value="" type="text">
            </td>
        </tr>
        <tr>
            <th><i class="require-red"></i>链接地址：</th>
            <td>
                <input class="common-text required" id="" name="link_url" size="50" value="" type="text">
            </td>
        </tr>
        <tr>
            <th><i class="require-red">*</i>文件上传:</th>
            <td>
                <input type="file" name="link_logo">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="btn btn-success" value="添加" type="submit">
            </td>
        </tr>
          </fieldset>                          
        </form>
	</div>
@endsection
	