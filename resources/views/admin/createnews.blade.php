@extends('admin.layouts.dashboard')

@section('page_heading',(isset($categoryByid))?'Update News':'Add News')
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
                    @slot('panelTitle', (isset($categoryByid))?'Update News':'Add News')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['news.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storenews']) !!}
                        @endif
						<div class="form-group">
                            {!! Form::label('new_heading', 'Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('new_heading', (isset($categoryByid->new_heading))?$categoryByid->new_heading:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						
						<div class="form-group">
                            {!! Form::label('banner', 'Banner:', ['class' => 'control-label']) !!}
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
						 <div class="form-group" style="display:none">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                        <textarea id="my-editor-short" name="" class="form-control">{!! old('description', (isset($categoryByid->description))?$categoryByid->description:'') !!}</textarea>
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
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                        <textarea id="my-editor-short" name="description" class="form-control" required/>{!! old('description', (isset($categoryByid->description))?$categoryByid->description:'') !!}</textarea>
                       
                        </div>
						<div class="form-group">
                            {!! Form::label('link', 'Link:', ['class' => 'control-label']) !!}
                            {!! Form::text('referlink', (isset($categoryByid->referlink))?$categoryByid->referlink:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Active</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}} >Inactive</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->id))?'Edit News' :'Add News', ['class' => 'btn btn-primary']) !!}

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
