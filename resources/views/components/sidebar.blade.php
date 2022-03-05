  @php
    $access_Tabs = myauthtabs();
    $access_Tabs_arr = explode(',', $access_Tabs);
  @endphp<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::asset('assets/user.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->first_name." ".(auth()->user()->last_name)}}</p>
          <a href=""><i class="fa fa-circle text-success"></i> 
          @php
            switch(auth()->user()->user_type){
              case 1:{
                echo "User";
                break;
              }
              case 2:{
                echo "Consultant";
                break;
              }
              case 0:{
                echo "Admin";
                break;
              }
            } 
          @endphp
          </a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         <li class="{{Request::segment(1)=='dashboard'?'active':''}}">
          <a href="{{route('dashboard')}}">
            <i class="fa fa-th"></i> <span>Dashbaord</span>
          </a>
        </li>
        @if ($access_Tabs=='all'||in_array('users', $access_Tabs_arr))
        <li class="{{Request::segment(1)=='users'?'active':''}}">
          <a href="{{route('users')}}">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        @endif
        @if ($access_Tabs=='all'||in_array('clients', $access_Tabs_arr))
        <li class="{{Request::segment(1)=='clients'?'active':''}}">
          <a href="{{route('clients')}}">
            <i class="fa fa-address-book"></i> <span>Clients</span>
          </a>
        </li>
        @endif
        @if (Request::segment(1)=='employees')
        <li class="{{Request::segment(1)=='employees'?'active':''}}">
          <a href="{{route('employees', Request::segment(2))}}">
            <i class="fa fa-group"></i> <span>Employees</span>
          </a>
          </li>
        @endif
        @if (in_array('courses', $access_Tabs_arr))
        <li class="{{Request::segment(1)=='courses'?'active':''}}">
          <a href="{{route('courses')}}">
            <i class="fa fa-book"></i> <span>Courses</span>
          </a>
        </li>
        @endif
        @if (Request::segment(1)=='attendances')
        <li class="{{Request::segment(1)=='attendances'?'active':''}}">
          <a href="">
            <i class="fa fa-clock-o"></i> <span>Attendance</span>
          </a>
        </li>
        @endif
        @if ((Request::segment(1)!='attendances'&&(auth()->user()->user_type=="2")))
        <li class="{{Request::segment(1)=='consultantattendance'?'active':''}}">
          <a href="{{route('consultantattendance')}}">
            <i class="fa fa-clock-o"></i> <span>Attendance</span>
          </a>
        </li>
        @endif
        @if (($access_Tabs=='all')||(auth()->user()->user_type=="2"))
        <li class="{{Request::segment(1)=='events'?'active':''}}">
          <a href="{{route('events')}}">
            <i class="fa fa-calendar"></i> <span>Events</span>
          </a>
        </li>
        @endif
        @if (Request::segment(1)=="edittemplate")
        <li class="{{Request::segment(1)=='edittemplate'?'active':''}}">
          <a href="{{URL::current()}}">
            <i class="fa fa-edit"></i> <span>Edit Template</span>
          </a>
        </li>
        @endif
        @if (Request::segment(1)=="inviteforevent")
        <li class="{{Request::segment(1)=='inviteforevent'?'active':''}}">
          <a href="{{URL::current()}}">
            <i class="fa fa-send-o"></i> <span>Invitation</span>
          </a>
        </li>
        @endif
        @if ($access_Tabs=='all'||in_array('generatecertificate', $access_Tabs_arr))
        <li class="{{Request::segment(1)=='generatecertificate'?'active':''}}">
          <a href="">
            <i class="fa fa-certificate"></i> <span>Generate Certificate</span>
          </a>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>