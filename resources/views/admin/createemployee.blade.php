@extends('admin.layouts.dashboard')

@section('page_heading',(isset($categoryByid))?'Update Employee':'Add Employee')

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
                    @slot('panelTitle', (isset($categoryByid))?'Update Employee':'Add Employee')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['employee.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storeemployee']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('employeeid', 'Employee Id:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_id', (isset($categoryByid->emp_id))?$categoryByid->emp_id:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_name', (isset($categoryByid->emp_name))?$categoryByid->emp_name:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_pwd', (isset($categoryByid->emp_pwd))?$categoryByid->emp_pwd:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_email', (isset($categoryByid->emp_email))?$categoryByid->emp_email:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('father_name', 'Father Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_father_name', (isset($categoryByid->emp_father_name))?$categoryByid->emp_father_name:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						
						<div class="form-group">
                            {!! Form::label('birthplace', 'Birth Place:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_birth_place', (isset($categoryByid->emp_birth_place))?$categoryByid->emp_birth_place:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('birth_date', 'Birth Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_birth_date', (isset($categoryByid->emp_birth_date))?$categoryByid->emp_birth_date:'', ['class' => 'form-control','id'=>'post_date','Required'=>'required']) !!}
                        </div>
						 <div class="form-group">
                            {!! Form::label('blood_group', 'Blood Group:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_blood_group', (isset($categoryByid->emp_blood_group))?$categoryByid->emp_blood_group:'', ['class' => 'form-control']) !!}
                        </div>
						 <div class="form-group">
                            {!! Form::label('marital_status', 'Marital Status:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_marital_status', (isset($categoryByid->emp_marital_status))?$categoryByid->emp_marital_status:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('native_place', 'Native Place:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_native_place', (isset($categoryByid->emp_native_place))?$categoryByid->emp_native_place:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('permanent_address', 'Permanent Address:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_permanent_address', (isset($categoryByid->emp_permanent_address))?$categoryByid->emp_permanent_address:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('present_address', 'Present Address:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_present_address', (isset($categoryByid->emp_present_address))?$categoryByid->emp_present_address:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('mobile', 'Mobile:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_mobile', (isset($categoryByid->emp_mobile))?$categoryByid->emp_mobile:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('panno', 'Pan Number:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_pan_no', (isset($categoryByid->emp_pan_no))?$categoryByid->emp_pan_no:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('aadharno', 'Aadhar Number:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_adhar_no', (isset($categoryByid->emp_adhar_no))?$categoryByid->emp_adhar_no:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('remainingleave', 'Remaining Leave:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_remainig_leave', (isset($categoryByid->emp_remainig_leave))?$categoryByid->emp_remainig_leave:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('specialremark', 'Special Remark:', ['class' => 'control-label']) !!}
                            {!! Form::text('special_remark', (isset($categoryByid->special_remark))?$categoryByid->special_remark:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						 <div class="form-group" style="display:none">
                            {!! Form::label('short_description', 'Short Description:', ['class' => 'control-label']) !!}
                        <textarea id="my-editor-short"  class="form-control">{!! old('short_description', (isset($categoryByid->short_description))?$categoryByid->short_description:'test editor content') !!}</textarea>
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
                            {!! Form::label('thumbnail', 'Thumbnail:', ['class' => 'control-label']) !!}
                            <div class="input-group">
                            <span class="input-group-btn">
                           <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                          <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                 </span>
                                <input id="thumbnail" value="{{(isset($categoryByid->image))?$categoryByid->image:''}}"class="form-control" type="text" name="image" required/>
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Active</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}} >Inactive</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->id))?'Edit Employee' :'Add Employee', ['class' => 'btn btn-primary']) !!}

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
