@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Event
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">add event</li>
      </ol>
    </section>
  <style>
    .offsetbox{
        margin-left:50%;
        transform:translatex(-50%);
     }

      @media only screen and (max-width: 600px) {
        .offsetbox{
            margin-left:0%;
            transform:translatex(0%);
        }
      }
     
      .err_text{
          color:red;
      }
   </style>   
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="container">
                 <form action="{{route('addeventpost')}}" enctype='multipart/form-data'  id="handleform" method="post">
                     @csrf
                     <input type="hidden" name="client_id" value="{{$client_id}}">
                    <div class="row">
                        <div class="col-md-4 offsetbox">
                            <div class="row">  
                                <div class="form-group">
                                    <label>Event Name</label>
                                    <input type="text" name="event_name" id="event_name" class="form-control" placeholder="Event Name">
                                    <span id="event_name_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Select Course</label>
                                    <select id="courseselect" name="course" class="form-control">
                                        <option value="">--Select Course--</option>
                                        @foreach($courses as $course)
                                          <option value="{{$course->id}}">{{$course->courseName}}</option>
                                        @endforeach
                                    </select>    
                                    <span id="courseselect_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Select Employees</label>
                                    <select name="employees" id="employeeselect" class="form-control js-example-tokenizer" multiple="multiple">
                                      @foreach($employess as $employee)
                                          <option value="{{$employee->id}}">{{$employee->firstname." ".$employee->lastname}}</option>
                                        @endforeach
                                    </select>
                                    <span id="employeeselect_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Start Date and Time</label>
                                    <input type="datetime-local" name="start_date" id="start_date" class="form-control" placeholder="Start Date and Time">
                                    <span id="start_date_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>End Date and Time</label>
                                    <input type="datetime-local" name="end_date" id="end_date" class="form-control" placeholder="End Date and Time">
                                    <span id="end_date_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Select Consultant</label>
                                    <select id="consultant" name="consultant" class="form-control">
                                        <option value="">--Select Consultant--</option>
                                        @foreach($consultants as $consultant)
                                          <option value="{{$consultant->id}}">{{$consultant->firstname." ".$consultant->lastname}}</option>
                                        @endforeach
                                    </select>    
                                    <span id="consultant_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" class="form-control" value="Add Event">
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
                </form>
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
  <!-- /.content-wrapper -->
  @include("components.footer")
 @include("components.script")
<!-- page script -->
<script>
  $(function () {
    $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
    })

    $("#handleform").submit(function(){
        var is_validate = true;
        var event_name = $("#event_name").val();
        var event_name_err = $("#event_name_err");
        var courseselect = $("#courseselect").val();
        var courseselect_err = $("#courseselect_err");
        var employeeselect = $("#employeeselect").val();
        var employeeselect_err = $("#employeeselect_err");
        var start_date = $("#start_date").val();
        var start_date_err = $("#start_date_err");
        var end_date = $("#end_date").val();
        var end_date_err = $("#end_date_err");
        var consultant = $("#consultant").val();
        var consultant_err = $("#consultant_err");
        
        if(event_name==''){
            is_validate=false;
            event_name_err.html("Please enter Client name");
        }  
        else{
            event_name_err.html("");
        }

        if(courseselect==''){
            is_validate=false;
            courseselect_err.html("Please select course");
        }  
        else{
          courseselect_err.html("");
        }

        if(employeeselect==''){
            is_validate=false;
            employeeselect_err.html("Please select employee.");
        }  
        else{
            employeeselect_err.html("");
        }
        if(start_date==''){
            is_validate=false;
            start_date_err.html("Please enter start date.");
        }  
        else{
            start_date_err.html("");
        }
        if(end_date==''){
            is_validate=false;
            end_date_err.html("Please enter end date.");
        }  
        else{
            end_date_err.html("");
        }

        if(consultant==''){
            is_validate=false;
            consultant_err.html("Please select consultatant");
        }  
        else{
          consultant_err.html("");
        }


        return is_validate;
    })

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
