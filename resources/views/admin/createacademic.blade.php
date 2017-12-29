@extends('admin.layouts.dashboard')
@section('page_heading',(isset($categoryByid))?'Update Academic':'Add Academic')
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
                    @slot('panelTitle', (isset($categoryByid))?'Update Academic':'Add Academic')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['academic.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storeacademic']) !!}
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
                            {!! Form::label('course_number', 'Course Number :', ['class' => 'control-label']) !!}
                            {!! Form::text('course_number', (isset($categoryByid->course_number))?$categoryByid->course_number:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('course', 'Course:', ['class' => 'control-label']) !!}
                            {!! Form::text('course', (isset($categoryByid->course))?$categoryByid->course:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('passing_year', 'Passing Year:', ['class' => 'control-label']) !!}
                            {!! Form::text('passing_year', (isset($categoryByid->passing_year))?$categoryByid->passing_year:'', ['class' => 'form-control','id'=>'post_date','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('division', 'Division:', ['class' => 'control-label']) !!}
                            {!! Form::text('division', (isset($categoryByid->division))?$categoryByid->division:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('percentage', 'Percentage:', ['class' => 'control-label']) !!}
                            {!! Form::text('percentage', (isset($categoryByid->percentage))?$categoryByid->percentage:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('university', 'University:', ['class' => 'control-label']) !!}
                            {!! Form::text('university', (isset($categoryByid->university))?$categoryByid->university:'', ['class' => 'form-control','Required'=>'required']) !!}
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
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Active</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}} >Inactive</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->id))?'Edit Academic' :'Add Academic', ['class' => 'btn btn-primary']) !!}

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
