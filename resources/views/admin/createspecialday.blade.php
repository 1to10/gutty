@extends('admin.layouts.dashboard')

@section('page_heading',(isset($categoryByid))?'Update Special Day':'Add Special Day')

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
                    @slot('panelTitle', (isset($categoryByid))?'Update Special Day':'Add Special Day')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['specialday.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storespecialday']) !!}
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
                            {!! Form::label('emp_date_of_birth', 'Birth Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('emp_date_of_birth', (isset($categoryByid->emp_date_of_birth))?$categoryByid->emp_date_of_birth:'', ['class' => 'form-control','id'=>'post_date','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('anniversary_date', 'Anniversary Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('anniversary_date', (isset($categoryByid->anniversary_date))?$categoryByid->anniversary_date:'', ['class' => 'form-control','id'=>'expiry_date','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('wedding_date', 'Wedding Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('wedding_date', (isset($categoryByid->wedding_date))?$categoryByid->wedding_date:'', ['class' => 'form-control','id'=>'wedding_date','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('baby_date', 'Baby Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('baby_date', (isset($categoryByid->baby_date))?$categoryByid->baby_date:'', ['class' => 'form-control','id'=>'baby_date','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            <label for="sel">Wedding Status</label>
                            <select id="sel" name="wedding_status" class="form-control">
                                <option value="1" {{(isset($categoryByid->wedding_status) && $categoryByid->wedding_status=='1')?'selected':''}} >Married</option>
                                <option value="0" {{(isset($categoryByid->wedding_status) && $categoryByid->wedding_status=='0')?'selected':''}} >Unmarried</option>

                            </select>
                        </div>
						
						<div class="form-group">
                            <label for="sel">Baby Birth Status</label>
                            <select id="sel" name="baby_birth_status" class="form-control">
                                <option value="1" {{(isset($categoryByid->baby_birth_status) && $categoryByid->baby_birth_status=='1')?'selected':''}} >Born</option>
                                <option value="0" {{(isset($categoryByid->wedding_status) && $categoryByid->baby_birth_status=='0')?'selected':''}} >No Born</option>
                           </select>
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
                            {!! Form::label('thumbnail', 'Birthday Image:', ['class' => 'control-label']) !!}
                            <div class="input-group">
                            <span class="input-group-btn">
                           <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                          <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                 </span>
                                <input id="thumbnail" value="{{(isset($categoryByid->birthday_image))?$categoryByid->birthday_image:''}}"class="form-control" type="text" name="birthday_image" required/>
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
						<div class="form-group">
                            {!! Form::label('wedding_image', 'Wedding Image:', ['class' => 'control-label']) !!}
                            <div class="input-group">
                            <span class="input-group-btn">
                           <a data-input="thumbnail1" data-preview="holder1" class="btn btn-primary lfm">
                          <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                 </span>
                                <input id="thumbnail1" value="{{(isset($categoryByid->wedding_image))?$categoryByid->wedding_image:''}}"class="form-control" type="text" name="wedding_image" required/>
                            </div>
                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                        </div>
						<div class="form-group">
                            {!! Form::label('officeany_image', 'Office Any Image:', ['class' => 'control-label']) !!}
                            <div class="input-group">
                            <span class="input-group-btn">
                           <a data-input="thumbnail2" data-preview="holder2" class="btn btn-primary lfm">
                          <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                 </span>
                                <input id="thumbnail2" value="{{(isset($categoryByid->officeany_image))?$categoryByid->officeany_image:''}}"class="form-control" type="text" name="officeany_image" required/>
                            </div>
                            <img id="holder2" style="margin-top:15px;max-height:100px;">
                        </div>
						<div class="form-group">
                            {!! Form::label('babybirth_image', 'Baby Birth Image:', ['class' => 'control-label']) !!}
                            <div class="input-group">
                            <span class="input-group-btn">
                           <a data-input="thumbnail3" data-preview="holder3" class="btn btn-primary lfm">
                          <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                 </span>
                                <input id="thumbnail3" value="{{(isset($categoryByid->babybirth_image))?$categoryByid->babybirth_image:''}}"class="form-control" type="text" name="babybirth_image" required/>
                            </div>
                            <img id="holder3" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Active</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}} >Inactive</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->id))?'Edit Special Day' :'Add Special Day', ['class' => 'btn btn-primary']) !!}

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
