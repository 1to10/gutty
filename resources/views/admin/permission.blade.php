
@extends('admin.layouts.dashboard')

@section('page_heading','Permission Denied')


@section('section')

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-12">
                @component('admin.widgets.panel')
                    @slot('panelTitle', 'Permission Denied')
                    @slot('panelBody')
                        You Have No Permission To Access This Page!
						Contact Admin!

                    @endslot
                @endcomponent
            </div>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection
