
@extends('admin.layouts.dashboard')

@section('page_heading','Achievement Like List')

@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Achievement Like List')
                    @slot('panelBody')
                        <table class="table table-bordered" id="example">
                            <thead>
                            <tr>
							    <th>Id</th>
                                <th>Name</th>
                                <th>Achievement</th>
                                <th>Status</th>
								
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($achievements as $achievement)
                                <tr class="success">
							    <td>{{$loop->iteration }}</td>
                                <td>{{$achievement->employeename($achievement->emp_id)}}</td>
                                <td>{{$achievement->achievementname($achievement->achievement_id)}}</td>
                                <td>{{$achievement->status}}</td>
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
