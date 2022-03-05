@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendances
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/loginpage/#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendances</li>
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
            <div class="row">
                <div class="col-md-10">
                   <div class="row">
                       <!-- <div class="col-md-12">
                            Event Name : 
                       </div> -->
                       <div class="col-md-12">
                            Course Name : {{$course->name }}
                       </div>
                   </div>
                </div>
                <div class="col-md-2">
                    Date : 
                    <select class="form-control" id="periodic_course">
                    @foreach ($period as $key => $periodic)
                        <option {{($key==(COUNT($period)-1))?'selected':''}} value="{{date("Y-m-d", strtotime($periodic))}}">{{date("d M, Y", strtotime($periodic))}}</option>
                    @endforeach
                    </select>    
                </div>
               
            </div>
            <div class="row">
                <div class="col-md-12">
              
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Sr.</th>
                  <th>Usernanme</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Attendance</th>
                  <!--<th>Actions</th>-->
                </tr>
                </thead>
                <tbody>
                
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
    var table = $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    
    const loadtable = (selected_date) =>{
        table.rows().remove();
        $.ajax({
            type: "post",
            url: "{{route('getattendances')}}",
            data: {"course_id":{{$course->id}}, "date":selected_date},
            dataType: "json",
            success: function (response) {
                $.each(response, function (indexInArray, valueOfElement) { 
                    var action_btns = `<button class="btn btn-danger">Delete</button>`;
                    console.log(valueOfElement);
                    let attendance = "";
                    switch (valueOfElement.attendance) {
                        case 1:
                            attendance="Present";
                            break;
                        case 2:
                            attendance="Absent";
                            break;
                        case 3:
                            attendance="Delayed";
                            break;
                        default:
                            attendance="Not Selected";
                            break;
                    }
                    let base_url = '{{URL::to("/")}}/attendancedetails/{{$course->id}}/'+valueOfElement.id;
                    console.log(base_url);
                    let username = `<a href="${base_url}">${valueOfElement.firstname+" "+valueOfElement.lastname}</a>`;
                    let attendance_select = `<select class="form-control makeattendance" data-userid="${valueOfElement.id}"><option value="">-- Select Attendance --</option><option ${valueOfElement.attendance==1?'selected':''} value="1">Present</option><option ${valueOfElement.attendance==2?'selected':''} value="2">Absent</option><option ${valueOfElement.attendance==3?'selected':''} value="3">Delayed</option></select>`;
                    table
                    .row.add( [indexInArray+1, username, valueOfElement.email, valueOfElement.mobile, attendance_select] )
                    .draw();   
                });
            }
        });
       
    }

    $(document).on("change", ".makeattendance", function (e) { 
        e.preventDefault();
        let attend_date = $("#periodic_course").val();
        let attendance = $(this).val();
        let user_id = $(this).data("userid");
        let url = "{{route('attendanceapi')}}";
        if(attendance=='')
            url="{{route('deleteuserattendanceapi')}}";
        $.ajax({
            type: "post",
            url: url,
            data: {"course_id":{{$course->id}}, "attend_date":attend_date, "attendance":attendance, "user_id":user_id},
            dataType: "dataType",
            success: function (response) {
                
            }
        });
    });

    $("#periodic_course").change(function (e) { 
        e.preventDefault();
        loadtable(e.target.value); 
    });
loadtable('{{date("Y-m-d")}}'); 
  });
</script>
</body>
</html>
