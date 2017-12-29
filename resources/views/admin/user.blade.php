
@extends('admin.layouts.dashboard')

@section('page_heading','Users')

@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Users List')
                    @slot('panelBody')
                        <table class="table table-bordered" id="example">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $user)

                            <tr class="success">
                                <td>{{ $user->name }}</td>
                                <td>{{$user->email}}</td>

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
