@extends('admin.layouts.app')
@section('body')
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('/login') }}">IBEES | ADMIN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('admin/home') }}"><i class="fa fa-dashcube"></i> Dashboard</a>
                        </li>
                        
                       
                        <!---<li>
                            <a href="#">
                                <i class="fa fa-user"></i>User Setting<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*users') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/users')}}">Users</a>
                                </li>
                                <li>
                                    <a href="#">Permission</a>
                                </li>
                                <li>
                                    <a href="#">Roles</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        <!--</li>-->
						@if(authmenupermission('employee.create')>0 || authmenupermission('employee.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Employee<span class="fa arrow"></span>
                            </a>
							
                            <ul class="nav nav-second-level">
							@if(authmenupermission('employee.list')>0)
                                <li {{ (Request::is('*employee') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/employeelist')}}">Employee</a>
                                </li>
								@endif
								
								@if(authmenupermission('employee.create')>0)
                                <li>
                                    <a href="{{url('admin/addemployee')}}">Add Employe</a>
                                </li>
								@endif
								


                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('slider.create')>0 || authmenupermission('slider.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Home Slider<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('slider.list')>0)
                                <li {{ (Request::is('*news') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/sliderlist')}}">Home Slider</a>
                                </li>
							@endif
							@if(authmenupermission('slider.create')>0)
                                <li>
                                    <a href="{{url('admin/addslider')}}">Add Home Slider</a>
                                </li>
								@endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('event.create')>0 || authmenupermission('event.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>BEEvent<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('event.list')>0)
                                <li {{ (Request::is('*event') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/eventlist')}}">BEEvent</a>
                                </li>
								@endif
								@if(authmenupermission('event.create')>0)
                                <li>
                                    <a href="{{url('admin/addevent')}}">Add BEEvent</a>
                                </li>
								@endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('news.create')>0 || authmenupermission('news.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Company Buzz<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('news.list')>0)
                                <li {{ (Request::is('*news') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/newslist')}}">Company Buzz</a>
                                </li>
							@endif
							@if(authmenupermission('news.create')>0)
                                <li>
                                    <a href="{{url('admin/addnews')}}">Add Company Buzz</a>
                                </li>
								@endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('recruitment.create')>0 || authmenupermission('recruitment.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Recruitment<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('recruitment.list')>0)
                                <li {{ (Request::is('*recruitment') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/recruitmentlist')}}">Recruitment</a>
                                </li>
							@endif
							@if(authmenupermission('recruitment.create')>0)
                                <li>
                                    <a href="{{url('admin/addrecruitment')}}">Add Recruitment</a>
                                </li>
							@endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('company.create')>0 || authmenupermission('company.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Current Company<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('company.list')>0)
                                <li {{ (Request::is('*company') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/companylist')}}">Company</a>
                                </li>
							@endif
                            @if(authmenupermission('company.create')>0)							
                                <li>
                                    <a href="{{url('admin/addcompany')}}">Add Compnay</a>
                                </li>
							@endif	

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('previouscompany.create')>0 || authmenupermission('previouscompany.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Previous Company<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('previouscompany.list')>0)
                                <li {{ (Request::is('*previouscompany') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/previouscompanylist')}}">Company</a>
                                </li>
							@endif
                           @if(authmenupermission('previouscompany.create')>0)							
                                <li>
                                    <a href="{{url('admin/addpreviouscompany')}}">Add Compnay</a>
                                </li>
								@endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('contact.create')>0 || authmenupermission('contact.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Emergency Contact<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('contact.list')>0)
                                <li {{ (Request::is('*contact') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/contactlist')}}">Contact</a>
                                </li>
							@endif
                            @if(authmenupermission('contact.create')>0)							
                                <li>
                                    <a href="{{url('admin/addcontact')}}">Add Contact</a>
                                </li>
							@endif	

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('reference.create')>0 || authmenupermission('reference.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Reference<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('reference.list')>0)
                                <li {{ (Request::is('*reference') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/referencelist')}}">Reference</a>
                                </li>
							@endif
                            @if(authmenupermission('reference.create')>0)  							
                                <li>
                                    <a href="{{url('admin/addreference')}}">Add Reference</a>
                                </li>
						     @endif 		

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('activity.create')>0 || authmenupermission('activity.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Extra Activity<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('activity.list')>0)
                                <li {{ (Request::is('*activity') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/activitylist')}}">Activity</a>
                                </li>
							@endif
                           @if(authmenupermission('activity.create')>0)							
                                <li>
                                    <a href="{{url('admin/addactivity')}}">Add Activity</a>
                                </li>
							@endif	

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('facebook.create')>0 || authmenupermission('facebook.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Social<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('facebook.list')>0)
                                <li {{ (Request::is('*facebook') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/facebooklist')}}">Social</a>
                                </li>
							@endif
                            @if(authmenupermission('facebook.create')>0)							
                                <li>
                                    <a href="{{url('admin/addfacebook')}}">Add Social</a>
                                </li>
							@endif	

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('specialday.create')>0 || authmenupermission('specialday.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Celebration<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('specialday.list')>0)
                                <li {{ (Request::is('*specialday') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/specialdaylist')}}">Celebration</a>
                                </li>
							@endif
                              @if(authmenupermission('specialday.create')>0)						
                                <li>
                                    <a href="{{url('admin/addspecialday')}}">Add Celebration</a>
                                </li>
							@endif	

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('client.create')>0 || authmenupermission('client.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Buzz Industry<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('client.list')>0)
                                <li {{ (Request::is('*client') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/clientlist')}}">Buzz Industry</a>
                                </li>
							@endif
                            @if(authmenupermission('client.create')>0)							
                                <li>
                                    <a href="{{url('admin/addclient')}}">Add Buzz Industry</a>
                                </li>
						    @endif		

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('academic.create')>0 || authmenupermission('academic.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Employee Academic<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('academic.list')>0)
                                <li {{ (Request::is('*academic') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/academiclist')}}">Academic</a>
                                </li>
								@endif
								@if(authmenupermission('academic.create')>0)
                                <li>
                                    <a href="{{url('admin/addacademic')}}">Add Academic</a>
                                </li>
								@endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
						@if(authmenupermission('achievement.create')>0 || authmenupermission('achievement.list')>0||authmenupermission('achievementlike.list')>0)
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i>Achievement<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
							@if(authmenupermission('achievement.list')>0)
                                <li {{ (Request::is('*achievement') ? 'class="active"' : '') }} >
                                    <a href="{{url('admin/achievementlist')}}">Achievement</a>
                                </li>
								@endif
								@if(authmenupermission('achievement.create')>0)
                                <li>
                                    <a href="{{url('admin/addachievement')}}">Add Achievement</a>
                                </li>
								@endif
								@if(authmenupermission('achievementlike.list')>0)
								<li>
                                    <a href="{{url('admin/achievementlikelist')}}">Achievement Like List</a>
                                </li>
								@endif

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						@endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="page-header">@yield('page_heading')</h1>

                </div>
                <div class="col-lg-3">
                    <a class="page-header">@yield('create_url')</a>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@endsection


