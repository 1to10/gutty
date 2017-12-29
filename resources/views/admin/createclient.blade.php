@extends('admin.layouts.dashboard')
@section('page_heading',(isset($categoryByid))?'Update Client Industry':'Add Client Industry')
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
                    @slot('panelTitle', (isset($categoryByid))?'Update Client Industry':'Add Client Industry')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['client.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storeclient']) !!}
                        @endif
						<div class="form-group">
                            {!! Form::label('heading', 'Heading:', ['class' => 'control-label']) !!}
                            {!! Form::text('heading', (isset($categoryByid->heading))?$categoryByid->heading:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                            {!! Form::text('description', (isset($categoryByid->description))?$categoryByid->description:'', ['class' => 'form-control','Required'=>'required']) !!}
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
                            {!! Form::label('banner', 'Image:', ['class' => 'control-label']) !!}
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
                            {!! Form::label('link', 'Link:', ['class' => 'control-label']) !!}
                            {!! Form::text('referlink', (isset($categoryByid->referlink))?$categoryByid->referlink:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						 <div class="form-group">
                            <label for="sel">Type</label>
                            <select id="sel" name="type" class="form-control">
                                <option value="2" {{(isset($categoryByid->status) && $categoryByid->status=='2')?'selected':''}} >Industry</option>
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Client</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Active</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}} >Inactive</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->id))?'Edit Client' :'Add Client', ['class' => 'btn btn-primary']) !!}

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
