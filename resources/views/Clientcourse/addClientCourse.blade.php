@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Course
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Add Course</li>
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
                 <form action="{{route('addclientcoursepost')}}" enctype='multipart/form-data'  id="handleform" method="post">
                     @csrf
                     <input type="hidden" name="client_id" value="{{$client_id}}">
                    <div class="row">
                        <div class="col-md-4 offsetbox">
                            <div class="row">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <input type="text" name="course_name" id="course_name" value="{{old('course_name')}}" class="form-control" placeholder="Course Name">
                                    <span id="course_name_err"  class="err_text">{{ $errors->first('course_name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Course ID</label>
                                    <input type="text" name="courseId" id="course_id" value="{{old('course_id')}}" class="form-control" placeholder="Course ID">
                                    <span id="course_id_err" class="err_text">{{ $errors->first('courseId') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Employee</label>
                                    <br>
                                    <a href="about:blank" id="addmoreempoyee">Add Employee</a>
                                </div>
                                <div class="form-group">
                                    <label>Consultant Name</label>
                                    <select type="text" name="consultantId" id="consultantId" value="{{old('consultantId')}}" class="form-control" placeholder="Consultant">
                                    @foreach ($consultants as $consultant)
                                      <option value="{{$consultant->id}}">{{$consultant->first_name." ".$consultant->last_name}}</option>
                                    @endforeach  
                                  </select>
                                    <span id="consultantId_err" class="err_text">{{ $errors->first('consultantId') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Preassignment Link</label>
                                    <input type="text" name="preassignment_link" id="preassignment_link" value="{{old('preassignment_link')}}" class="form-control" placeholder="Pre Assignment Link">
                                    <span id="preassignment_link_err" class="err_text">{{ $errors->first('preassignment_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Post Assignment Link</label>
                                    <input type="text" name="postassignment_link" id="postassignment_link" value="{{old('postassignment_link')}}" class="form-control" placeholder="Post Assignment Link">
                                    <span id="postassignment_link_err" class="err_text">{{ $errors->first('postassignment_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Registration Link</label>
                                    <input type="text" name="registration_link" id="registration_link" value="{{old('registration_link')}}" class="form-control" placeholder="Registration Link">
                                    <span id="pregistration_link_err" class="err_text">{{ $errors->first('registration_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Workshop Link</label>
                                    <input type="text" name="workshop_link" id="workshop_link" value="{{old('workshop_link')}}" class="form-control" placeholder="Worksheet Link">
                                    <span id="workshop_link_err" class="err_text">{{ $errors->first('workshop_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>InfoSheet Link</label>
                                    <input type="text" name="infosheet_link" id="infosheet_link" value="{{old('infosheet_link')}}" class="form-control" placeholder="InfoSheet Link">
                                    <span id="infosheet_link_err" class="err_text">{{ $errors->first('infosheet_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Calender Link</label>
                                    <input type="text" name="calender_link" id="calender_link" value="{{old('calender_link')}}" class="form-control" placeholder="Calender Link">
                                    <span id="calender_link_err" class="err_text">{{ $errors->first('calender_link') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Evolution</label>
                                    <input type="text" name="evolution" id="evolution" value="{{old('evolution')}}" class="form-control" placeholder="Evolution">
                                    <span id="evolution_err" class="err_text">{{ $errors->first('evolution') }}</span>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                   <div class="col-md-6">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" id="start_date" value="{{old('start_date')}}" class="form-control" placeholder="Start Date">
                                    <span id="start_date_err" class="err_text">{{ $errors->first('start_date') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                    <label>Start Time</label>
                                    <input type="time" name="start_time" id="start_time" value="{{old('start_time')}}" class="form-control" placeholder="Start Time">
                                    <span id="start_time_err" class="err_text">{{ $errors->first('start_time') }}</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="row">
                                   <div class="col-md-6">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" id="end_date" value="{{old('end_date')}}" class="form-control" placeholder="Last Date">
                                    <span id="end_date_err" class="err_text">{{ $errors->first('end_date') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                    <label>End Time</label>
                                    <input type="time" name="end_time" id="end_time" value="{{old('end_time')}}" class="form-control" placeholder="Last Time">
                                    <span id="end_time_err" class="err_text">{{ $errors->first('end_time') }}</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" id="city" value="{{old('city')}}" class="form-control" placeholder="City">
                                    <span id="city_err" class="err_text">{{ $errors->first('city') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" name="country" id="country" value="{{old('country')}}" class="form-control" placeholder="Country">
                                    <span id="country_err" class="err_text">{{ $errors->first('country') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Training Type</label>
                                    <select class="form-control" name="training_type" id="training_type">
                                      <option value="virtual">Virtual</option>
                                      <option value="classroom">Classroom</option>
                                      <option value="elearning">e-Learning</option>
                                    </select>  
                                    <span id="course_id_err" class="err_text">{{ $errors->first('training_type') }}</span>
                                </div> 
                                <div class="form-group">
                                    <label>Language of Faciliates</label>
                                    <div class="col">
                                      <input type="checkbox" id="facilates_arabic" class="language_of_facilates" name="facilates_arabic"> <label for="facilates_arabic">Arabic</label>
                                    </div>
                                    <div class="col">
                                      <input type="checkbox" id="facilates_english" class="language_of_facilates" name="facilates_english"> <label for="facilates_english">English</label>
                                    </div>
                                    <div class="col">
                                      <input type="checkbox" id="facilates_both" class="language_of_facilates" name="facilates_both"> <label for="facilates_both">Both</label>
                                    </div>
                                    <span id="facilates_err" class="err_text">{{ $errors->first('facilates_err') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Language of Material</label>
                                    <div class="col">
                                      <input type="checkbox" id="material_arabic" class="language_of_material" name="material_arabic"> <label for="material_arabic">Arabic</label>
                                    </div>
                                    <div class="col">
                                      <input type="checkbox"  id="material_english" class="language_of_material" name="material_english"> <label for="material_english">English</label>
                                    </div>
                                    <span id="material_err" class="err_text">{{ $errors->first('material_err') }}</span>
                                </div>
                                <div class="form-group">
                                    <label>Notice</label>
                                    <TextArea type="text" name="notice" id="notice" value="{{old('notice')}}" class="form-control" placeholder="Notice"></TextArea>
                                    <span id="notice_err" class="err_text">{{ $errors->first('notice') }}</span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" class="form-control" value="Add Course">
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
@include("components.footer")
 @include("components.script")
<!-- page script -->
<script>
  $(function () {
     $("#handleform").submit(function(){
        var is_validate = true;
        var course_name = $("#course_name").val();
        var course_name_err = $("#course_name_err");
        var course_id = $("#course_id").val();
        var course_id_err = $("#course_id_err");
                
        var consultantId = $("#consultantId").val();
        var consultantId_err = $("#consultantId_err");
        var preassignment_link = $("#preassignment_link").val();
        var preassignment_link_err = $("#preassignment_link_err");
        var postassignment_link = $("#postassignment_link").val();
        var postassignment_link_err = $("#postassignment_link_err");
        var evolution = $("#evolution").val();
        var evolution_err = $("#evolution_err");
        var start_date = $("#start_date").val();
        var start_date_err = $("#start_date_err");
        var start_time = $("#start_time").val();
        var start_time_err = $("#start_time_err");
        var end_date = $("#end_date").val();
        var end_date_err = $("#end_date_err");
        var end_time = $("#end_time").val();
        var end_time_err = $("#end_time_err");
        var city = $("#city").val();
        var city_err = $("#city_err");
        var country = $("#country").val();
        var country_err = $("#country_err");
        var training_type = $("#training_type").val();
        var training_type_err = $("#training_type_err");
        var notice = $("#notice").val();
        var notice_err = $("#notice_err");
       
        if(course_name==''){
            is_validate=false;
            course_name_err.html("Please enter Course name");
        }  
        else{
            course_name_err.html("");
        }
        
        if(course_id==''){
            is_validate=false;
            course_id_err.html("Please enter Course ID");
        }  
        else{
            course_id_err.html("");
        }

        if(consultantId==''){
            is_validate=false;
            consultantId_err.html("Please select Consultant.");
        }  
        else{
            consultantId_err.html("");
        }

        if(preassignment_link==''){
            is_validate=false;
            preassignment_link_err.html("Please enter Pre-assignment Link");
        }  
        else{
          preassignment_link_err.html("");
        }

        if(postassignment_link==''){
            is_validate=false;
            postassignment_link_err.html("Please enter Post-assignment Link");
        }  
        else{
           postassignment_link_err.html("");
        }

        if(evolution==''){
            is_validate=false;
            evolution_err.html("Please enter evoulution");
        }  
        else{
            evolution_err.html("");
        }

        if(start_date==''){
            is_validate=false;
            start_date_err.html("Please enter start date");
        }  
        else{
            start_date_err.html("");
        }

        if(start_time==''){
            is_validate=false;
            start_time_err.html("Please enter start time");
        }  
        else{
            start_time_err.html("");
        }

        if(end_date==''){
            is_validate=false;
            end_date_err.html("Please enter end date");
        }  
        else{
            end_date_err.html("");
        }

        if(end_time==''){
            is_validate=false;
            end_time_err.html("Please enter end time");
        }  
        else{
            end_time_err.html("");
        }

        jQuery('.employee_firstname').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please Enter First Name");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        jQuery('.employee_lastname').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please Enter Last Name");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        jQuery('.employee_email').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please enter email.");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        jQuery('.employee_mobile').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please enter Mobile No.");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        jQuery('.employee_gender').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please select gender.");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        return is_validate;
    })

    var employees_count = 0;

    $("#addmoreempoyee").click(function(e){
      e.preventDefault();
      $("#removeemployee"+employees_count).hide();
      employees_count++;
      var employees_tmp = `<div id="form_group${employees_count}" class="employee-group">
                          <label>#${employees_count}</label> <span class="float-r" id="removeemployee${employees_count}" ><a href="about:blank" class="removeemployee">remove</a></span>
                          <input class="employee_firstname form-control" type="text" name="employee_firstname[]" value="" placeholder="First Name">
                          <span class="employee_err err_text"></span>
                          <input class="employee_lastname form-control" type="text" name="employee_lastname[]" value="" placeholder="Last Name">
                          <span class="employee_err err_text"></span>
                          <input class="employee_email form-control" type="email" name="employee_email[]" value="" placeholder="Email">
                          <span class="employee_err err_text"></span>
                          <input class="employee_mobile form-control" type="number" name="employee_mobile[]" value="" placeholder="Mobile">
                          <span class="employee_err err_text"></span>
                          <select class="employee_gender form-control" type="text" name="employee_gender[]" value="" placeholder="Gender">
                            <option value="">--Select Gender--</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                          </select>
                          <span class="employee_err err_text"></span>
                          </div>`;
      $(this).before( employees_tmp );
      if(employees_count==30)
      $(this).hide();
    })

    $(document).on("click", ".removeemployee", function(e){
      e.preventDefault();
      $("#form_group"+employees_count).remove();
      employees_count--;
      $("#removeemployee"+employees_count).show();
      $( "#addmoreempoyee" ).show();
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
