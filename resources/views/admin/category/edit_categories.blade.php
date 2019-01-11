@extends('layouts.adminLayout.admin_design')

@section('content')
    
<div id="content">
        <div id="content-header">
          <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Add Category</a> </div>
          <h1>Form Category</h1>
        </div>
        <div class="container-fluid"><hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                  <h5>Add Category</h5>
                </div>
                <div class="widget-content nopadding">
                  <form class="form-horizontal" method="post" action="{{ url('/admin/edit-categories/'.$categoryDetail->id) }}" name="edit_category" id="edit_category" novalidate="novalidate">{{csrf_field()}}
                    <div class="control-group">
                      <label class="control-label">Categry Name</label>
                      <div class="controls">
                      <input type="text" name="category_name" id="category_name" value="{{ $categoryDetail->name }}">
                      </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Categry Level</label>
                        <div class="controls">
                          <select name="parent_id">
                            <option value="0">Main Category</option>
                            @foreach ($levles as $val)
                              <option value="{{ $val->id }}" @if($val->id == $categoryDetail->parent_id) selected @endif>
                                {{ $val->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                          <textarea name="description" id="description">{{ $categoryDetail->description }}</textarea>
                        </div>
                  </div>
                    <div class="control-group">
                      <label class="control-label">URL</label>
                      <div class="controls">
                        <input type="text" name="url" id="url" value="{{ $categoryDetail->url }}">
                      </div>
                    </div>
                    <div class="form-actions">
                      <input type="submit" value="Update Caregory" class="btn btn-success">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection