
@extends('admin.layouts.dashboard')

@section('page_heading','Employee')
@section('create_url')
   <!--<a href="{{route('employee.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i>Add</a>-->
   {!! link_to_route('employee.create',
    '+Add', null,
    ['class' => 'btn btn-info'])
!!}
@endsection

@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Employee List')
                    @slot('panelBody')
                        <table class="table table-bordered" id="example">
                            <thead>
                            <tr>
							    <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
								<th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employee as $emp)

                            <tr class="success">
							    <td>{{ $loop->iteration }}</td>
                                <td>{{ $emp->emp_name }}</td>
                                <td>{{$emp->emp_email}}</td>
								<td> <a href="{{ route('employee.edit', $emp->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                         <a href="{{ route('employee.delete', $emp->id) }}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

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
