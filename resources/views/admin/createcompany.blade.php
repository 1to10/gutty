@extends('admin.layouts.dashboard')

@section('page_heading',(isset($categoryByid))?'Update Current Company':'Add Current Company')
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
                    @slot('panelTitle', (isset($categoryByid))?'Update Current Company':'Add Current Company')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['company.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storecompany']) !!}
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
                            {!! Form::label('Ccompany_name', 'Current Company Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('Ccompany_name', (isset($categoryByid->Ccompany_name))?$categoryByid->Ccompany_name:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('Cdesignation', 'Current Designation:', ['class' => 'control-label']) !!}
                            {!! Form::text('Cdesignation', (isset($categoryByid->Cdesignation))?$categoryByid->Cdesignation:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('Cjoining_date', 'Current Joining Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('Cjoining_date', (isset($categoryByid->Cjoining_date))?$categoryByid->Cjoining_date:'', ['class' => 'form-control','id' => 'post_date','Required'=>'required']) !!}
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
