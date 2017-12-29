@extends('admin.layouts.dashboard')
@section('page_heading',(isset($categoryByid))?'Update Facebook Link':'Add Facebook Link')
@section('section')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', (isset($categoryByid))?'Update Facebook Link':'Add Facebook Link')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['facebook.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storefacebook']) !!}
                        @endif
						<div class="form-group">
                            <label for="sel">Employee</label>
                            <select id="sel" name="emp_id" class="form-control">
							
							@foreach($employess as $employee)
                                <option value="{{$employee->emp_id}}" {{(isset($categoryByid->emp_id) && $categoryByid->emp_id==$employee->emp_id)?'selected':''}} >{{$employee->emp_name}}</option>
                            @endforeach

                            </select>
                        </div>
						<div class="form-group">
                            {!! Form::label('linkheading', 'Link Heading:', ['class' => 'control-label']) !!}
                            {!! Form::text('link_heading', (isset($categoryByid->link_heading))?$categoryByid->link_heading:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('Link', 'link:', ['class' => 'control-label']) !!}
                            {!! Form::text('link', (isset($categoryByid->link))?$categoryByid->link:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						 <div class="form-group" style="display:none;">
                            {!! Form::label('Link Description', 'Link Description:', ['class' => 'control-label']) !!}
                        <textarea id="my-editor-short" name="" class="form-control" required/>{!! old('link_description', (isset($categoryByid->link_description))?$categoryByid->link_description:'') !!}</textarea>
                        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <script>
                            var options = {
                                filebrowserImageBrowseUrl: '{{url("/laravel-filemanager?type=Images")}}',
                                filebrowserImageUploadUrl: '{{url("/laravel-filemanager/upload?type=Images&_token=")}}',
                                filebrowserBrowseUrl: '{{url("/laravel-filemanager?type=Files")}}',
                                filebrowserUploadUrl: '{{url("/laravel-filemanager/upload?type=Files&_token=")}}'
                            };
                        </script>
                        </div>
						<div class="form-group">
                            {!! Form::label('Link Description', 'Link Description:', ['class' => 'control-label']) !!}
                        <textarea  name="link_description" class="form-control" required/>{!! old('link_description', (isset($categoryByid->link_description))?$categoryByid->link_description:'') !!}</textarea>
                        
                        </div>
						
                        <div class="form-group">
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Active</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}} >Inactive</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->id))?'Edit Facebook' :'Add Facebook', ['class' => 'btn btn-primary']) !!}

                        {!! Form::close() !!}
                        </div>
                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->
@endsection
