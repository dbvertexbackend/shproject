@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Courses
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/loginpage/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Courses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              @if (isset($client_id)&&!empty($client_id))
              <a href="{{route('addclientcourse', $client_id)}}" class="float-r"><button class="btn float-right btn-primary">Add Courses</button></a>
              @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Sr.</th>
                  <th>Course Name</th>
                  <th>Consultant</th>
                  <th>Start Date & Time</th>
                  <th>End Date & Time</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($courses as $key =>  $course)
                <tr>
                  <td class="serialnumberRow">{{($key+1)}}</td>
                  <td><a href="{{route('attendances', $course->id)}}">{{$course->name}}</a></td>
                  <td>{{getusername($course->consultant_id)}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($course->start_date.' '.$course->start_time))}}</td>
                  <td>{{date("d M, Y h:i A", strtotime($course->end_date.' '.$course->end_time))}}</td>
                  <td class="ActionBtnRow"><a class="linktxt" href="{{route('deleteclientcourse', $course->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                </tr>   
                @endforeach
                </tbody>
              </table>
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
    $('#example2').DataTable({
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
