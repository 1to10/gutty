@extends('admin.layouts.dashboard')

@section('page_heading',(isset($categoryByid))?'Update Event':'Add Event')
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
                    @slot('panelTitle', (isset($categoryByid))?'Update Event':'Add Event')
                    @slot('panelBody')
                          @if(isset($categoryByid))
                            {!! Form::model($categoryByid, [
                          'method' => 'POST',
                          'route' => ['event.update', $categoryByid->id]
                      ]) !!}
                        @else
                        {!! Form::open(['url' => 'admin/storeevent']) !!}
                        @endif
						<div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
                            {!! Form::text('event_name', (isset($categoryByid->event_name))?$categoryByid->event_name:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('days', 'Event Days:', ['class' => 'control-label']) !!}
                            {!! Form::number('event_days', (isset($categoryByid->event_days))?$categoryByid->event_days:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('banner', 'Banner:', ['class' => 'control-label']) !!}
                        <div class="input-group">
                            <span class="input-group-btn">
                           <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                          <i class="fa fa-picture-o"></i> Choose
                                  </a>
                                 </span>
                                <input id="thumbnail" value="{{(isset($categoryByid->banner))?$categoryByid->banner:''}}"class="form-control" type="text" name="banner" required/>
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
						 <div class="form-group">
                            {!! Form::label('event_description', 'Event Description:', ['class' => 'control-label']) !!}
                        <textarea id="my-editor-short" name="event_description" class="form-control" required/>{!! old('event_description', (isset($categoryByid->event_description))?$categoryByid->event_description:'') !!}</textarea>
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
                            {!! Form::label('event_date', 'Event Date:', ['class' => 'control-label']) !!}
                            {!! Form::text('event_date', (isset($categoryByid->event_date))?$categoryByid->event_date:'', ['class' => 'form-control','id'=>'post_date','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('event_start_time', 'Event Start Time:', ['class' => 'control-label']) !!}
                            {!! Form::text('event_start_time', (isset($categoryByid->event_start_time))?$categoryByid->event_start_time:'', ['class' => 'form-control','id'=>'datetimepicker1','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('event_end_time', 'Event End Time:', ['class' => 'control-label']) !!}
                            {!! Form::text('event_end_time', (isset($categoryByid->event_end_time))?$categoryByid->event_end_time:'', ['class' => 'form-control','id'=>'datetimepicker2','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('event_address', 'Event Address:', ['class' => 'control-label']) !!}
                            {!! Form::text('event_address', (isset($categoryByid->event_address))?$categoryByid->event_address:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('total_slot', 'Total Slot:', ['class' => 'control-label']) !!}
                            {!! Form::number('total_slot', (isset($categoryByid->total_slot))?$categoryByid->total_slot:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
						<div class="form-group">
                            {!! Form::label('avialable_slot', 'Availaible Slot:', ['class' => 'control-label']) !!}
                            {!! Form::number('avialable_slot', (isset($categoryByid->avialable_slot))?$categoryByid->avialable_slot:'', ['class' => 'form-control','Required'=>'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="sel">Status</label>
                            <select id="sel" name="status" class="form-control">
                                <option value="1" {{(isset($categoryByid->status) && $categoryByid->status=='1')?'selected':''}} >Ongoing</option>
                                <option value="0" {{(isset($categoryByid->status) && $categoryByid->status=='0')?'selected':''}} >Complete</option>

                            </select>
                        </div>
                        <div class="form-group">
                        {!! Form::submit((isset($categoryByid->id))?'Edit Event' :'Add Event', ['class' => 'btn btn-primary']) !!}

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
