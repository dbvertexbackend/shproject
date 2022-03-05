@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Attendance
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <h4><b>User</b> : {{ $user->firstname." ".$user->lastname}} </h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto">
              <table id="example2" class="table table-bordered table-hover table-striped ">
                <thead>
                <tr>
                  <th class="serialnumberRow">Sr.</th>
                  <th>Date</th>
                  <th class="empoloyeeCountRowClient">Client Name</th>
                  <th class="actionBtnRowClients">Attendance</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($periods as $key => $period)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{date("d M, Y", strtotime($period))}}</td>
                    <td>{{getclientname($course->client_id)}}</td>
                    <td>
                        @php
                        $myattendance = getuserattendance(date('Y-m-d', strtotime($period)), $user->id, $course->id);
                        @endphp
                        <select data-userid="{{$user->id}}" data-dateof="{{date('Y-m-d', strtotime($period))}}" class="makeattendance form-control">
                            <option value="">--Select Attendance--</option>
                            <option value="1" {{($myattendance&&($myattendance->attendance==1))?'selected':''}}>Present</option>
                            <option value="2" {{($myattendance&&($myattendance->attendance==2))?'selected':''}}>Absent</option>
                            <option value="3" {{($myattendance&&($myattendance->attendance==3))?'selected':''}}>Delayed</option>
                        <select>    
                    </td>
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
  @include("components.footer")<!-- jQuery 3 -->
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

    $(document).on("change", ".makeattendance", function (e) { 
        e.preventDefault();
        let attend_date = $(this).data("dateof");
        let attendance = $(this).val();
        let url = "{{route('attendanceapi')}}";
        if(attendance=='')
            url="{{route('deleteuserattendanceapi')}}";
        let user_id = $(this).data("userid");
        $.ajax({
            type: "post",
            url: url,
            data: {"course_id":{{$course->id}}, "attend_date":attend_date, "attendance":attendance, "user_id":user_id},
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    });
  })
</script>
</body>
</html>
