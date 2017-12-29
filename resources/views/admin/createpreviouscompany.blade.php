@extends('admin.layouts.dashboard')

@section('page_heading',(isset($categoryByid))?'Update Previous Company':'Add Previous Company')
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
                    @slot('panelTitle', (isset($categoryByid))?'Update Previous Company':'Add Previous Company')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['previouscompany.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storepreviouscompany']) !!}
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
                            {!! Form::label('Pcomapny_name', 'Previous Company Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('Pcomapny_name', (isset($categoryByid->Pcomapny_name))?$categoryByid->Pcomapny_name:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('Pdesignation', 'Previous Designation:', ['class' => 'control-label']) !!}
                            {!! Form::text('Pdesignation', (isset($categoryByid->Pdesignation))?$categoryByid->Pdesignation:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('Pjoining_date', 'Previous Joining Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('Pjoining_date', (isset($categoryByid->Pjoining_date))?$categoryByid->Pjoining_date:'', ['class' => 'form-control','id' => 'post_date','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('Prelieving_date', 'Previous Releaving Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('Prelieving_date', (isset($categoryByid->Prelieving_date))?$categoryByid->Prelieving_date:'', ['class' => 'form-control','id' => 'expiry_date','Required'=>'required']) !!}
                        </div>
						 <div class="form-group" style="display:none">
                            {!! Form::label('description', 'Key Component:', ['class' => 'control-label']) !!}
                        <textarea id="my-editor-short" name="" class="form-control">{!! old('key_component', (isset($categoryByid->key_component))?$categoryByid->key_component:'') !!}</textarea>
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
                        {!! Form::submit((isset($categoryByid->id))?'Edit Current Company' :'Add Current Company', ['class' => 'btn btn-primary']) !!}

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
