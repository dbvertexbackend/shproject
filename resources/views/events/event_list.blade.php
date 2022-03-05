@include("components/header")
@include("components/sidebar")
<style>
.ActionBtnRow{
    display: flex;
    width: 170px;
}

.ActionBtnRow button{
    margin-left:5px;
    margin-right:5px;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Events</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#upcoming">Upcoming</a></li>
            <li><a data-toggle="tab" href="#inprogress">Inprogress</a></li>
            <li><a data-toggle="tab" href="#completed">Completed</a></li>
            </ul>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto">
            <div class="tab-content">
            <div id="upcoming" class="tab-pane fade in active">
            <table class="example2 table table-bordered table-hover table-striped">
                <thead>
                <tr>
                <th>Sr.</th>
                  <th>Client Name</th>
                  <th>Consultant</th>
                  <th>Course</th>
                  <th>No. of Employees</th>
                  <th>Start Date Time</th>
                  <th>End Date Time</th>
                  <th>Action Mails</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($upcoming_events as $key =>  $event)
                <tr>
                  <td class="serialnumberRow">{{($key+1)}}</td>
                  <td>{{getclientname($event->client_id)}}</td>
                  <td>{{getUserById($event->consultant_id)->first_name." ".getUserById($event->consultant_id)->last_name}}</td>
                  <td>{{$event->name}}</td>
                  <td>{{getCountEmployeesOfCourse($event->id)}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($event->start_date))}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($event->end_date))}}</td>
                  <td class="ActionBtnRow"><a class="linktxt" href="{{route('inviteforevent', $event->id)}}"><button class="btn btn-primary">Invite</button></a> 
                   <a class="linktxt" href="{{route('inviteforevent', $event->id)}}"><button class="btn btn-primary">Reminder</button></a> 
                   <a class="linktxt" href="{{route('inviteforevent', $event->id)}}"><button class="btn btn-primary">Thanks You</button></a></td>
                </tr>   
                @endforeach
                </tbody>
              </table>
            </div>
            <div id="inprogress" class="tab-pane fade">
            <table class="example2 table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Sr.</th>
                  <th>Client Name</th>
                  <th>Consultant</th>
                  <th>Course</th>
                  <th>No. of Employees</th>
                  <th>Start Date Time</th>
                  <th>End Date Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inprogress_events as $key =>  $event)
                <tr>
                  <td class="serialnumberRow">{{($key+1)}}</td>
                  <td>{{$event->client_id}}</td>
                  <td>{{$event->consultant_id}}</td>
                  <td>{{$event->name}}</td>
                  <td>{{getCountEmployeesOfCourse($event->id)}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($event->start_date))}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($event->end_date))}}</td>
                  <td class="ActionBtnRow"><a class="linktxt" href="{{route('deleteevent', $event->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                </tr>   
                @endforeach
                </tbody>
              </table>
            </div>
            <div id="completed" class="tab-pane fade">
            <table class="example2 table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Sr.</th>
                  <th>Client Name</th>
                  <th>Consultant</th>
                  <th>Course</th>
                  <th>No. of Employees</th>
                  <th>Start Date Time</th>
                  <th>End Date Time</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($completed_events as $key =>  $event)
                <tr>
                  <td class="serialnumberRow">{{($key+1)}}</td>
                  <td>{{$event->client_id}}</td>
                  <td>{{$event->consultant_id}}</td>
                  <td>{{$event->name}}</td>
                  <td>{{getCountEmployeesOfCourse($event->id)}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($event->start_date))}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($event->end_date))}}</td>
                  <td class="ActionBtnRow"><a class="linktxt" href="{{route('deleteevent', $event->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                </tr>   
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @include("components.footer")
 @include("components.script")
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('.example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
