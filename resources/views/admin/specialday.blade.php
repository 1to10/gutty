
@extends('admin.layouts.dashboard')

@section('page_heading','Special Day')
@section('create_url')
   <!--<a href="{{route('employee.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i>Add</a>-->
   {!! link_to_route('specialday.create',
    '+Add', null,
    ['class' => 'btn btn-info'])
!!}
@endsection

@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Special Day List')
                    @slot('panelBody')
                        <table class="table table-bordered" id="example">
                            <thead>
                            <tr>
							    <th>Id</th>
                                <th>Name</th>
                                <th>Date Of Birth</th>
                                <th>Status</th>
								<th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($specialdays as $specialday)
                                <tr class="success">
							    <td>{{$loop->iteration }}</td>
                                <td>{{$specialday->emp_name}}</td>
                                <td>{{$specialday->emp_date_of_birth}}</td>
                                <td>{{$specialday->status}}</td>
								<td> <a href="{{ route('specialday.edit', $specialday->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                         <a href="{{ route('specialday.delete', $specialday->id) }}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

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
