@extends('admin.common.common')

@section('content')
<div class="mws-panel grid_4">
                    <div class="mws-panel-header">
                        <span>Bordered Form</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="form_layouts.html">
                            <div class="mws-form-inline">
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Text field</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Textarea</label>
                                    <div class="mws-form-item">
                                        <textarea rows="" cols="" class="large"></textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Dropdown List</label>
                                    <div class="mws-form-item">
                                        <select class="large">
                                            <option>Option 1</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Checkboxes</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="checkbox"> <label>Checkbox 1</label></li>
                                            <li><input type="checkbox"> <label>Checkbox 2</label></li>
                                            <li><input type="checkbox"> <label>Checkbox 3</label></li>
                                            <li><input type="checkbox"> <label>Checkbox 4</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row bordered">
                                    <label class="mws-form-label">Radio Buttons</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio"> <label>Radio 1</label></li>
                                            <li><input type="radio"> <label>Radio 1</label></li>
                                            <li><input type="radio"> <label>Radio 1</label></li>
                                            <li><input type="radio"> <label>Radio 1</label></li>
                                        </ul>
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