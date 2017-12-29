
@extends('admin.layouts.dashboard')

@section('page_heading','Event')
@section('create_url')
   <!--<a href="{{route('employee.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i>Add</a>-->
   {!! link_to_route('event.create',
    '+Add', null,
    ['class' => 'btn btn-info'])
!!}
@endsection

@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Event List')
                    @slot('panelBody')
                        <table class="table table-bordered" id="example">
                            <thead>
                            <tr>
							    <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
								<th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($event as $ev)
                                <tr class="success">
							    <td>{{ $loop->iteration }}</td>
                                <td>{{ $ev->event_name }}</td>
                                <td>{{$ev->status}}</td>
								<td> <a href="{{ route('event.edit', $ev->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                         <a href="{{ route('event.delete', $ev->id) }}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

                            </tr>
                                @endforeach


                            </tbody>
                        </table>

                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
