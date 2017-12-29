
@extends('admin.layouts.dashboard')

@section('page_heading','Reference')
@section('create_url')
   <!--<a href="{{route('employee.create')}}"> <i class="fa fa-plus" aria-hidden="true"></i>Add</a>-->
   {!! link_to_route('reference.create',
    '+Add', null,
    ['class' => 'btn btn-info'])
!!}
@endsection

@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Reference List')
                    @slot('panelBody')
                        <table class="table table-bordered" id="example">
                            <thead>
                            <tr>
							    <th>Id</th>
                                <th>Employee</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Qualification</th>
                                <th>Status</th>
								<th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($references as $reference)
                                <tr class="success">
							    <td>{{$loop->iteration }}</td>
                                <td>{{$reference->employeename($reference->emp_id)}}</td>
                                <td>{{$reference->spouse_name}}</td>
                                <td>{{$reference->mobile}}</td>
                                <td>{{$reference->profes_detail}}</td>
                                <td>{{$reference->status}}</td>
								<td> <a href="{{ route('reference.edit', $reference->id) }}" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                         <a href="{{ route('reference.delete', $reference->id) }}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>

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
