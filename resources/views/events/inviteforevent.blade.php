@include("components/header")
@include("components/sidebar")
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event Invitation
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">event invitation</li>
      </ol>
    </section>

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
                     <input type="hidden" name="course_id" value="">
                    <div class="row">
                        <div class="col-md-4">
                           <div class="row">
                               <div class="col-md-12">
                                    <span><b>Client Name :</b> {{$course_client->name}} </span>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12">
                                    <span><b>Client Email :</b> {{$course_client->email}} </span>
                               </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                               <div class="col-md-12">
                                    <span><b>Consultant Name :</b> {{$course_consultant->first_name." ".$course_consultant->last_name}} </span>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12">
                                    <span><b>Consultant Email :</b> {{$course_consultant->email}} </span>
                               </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">  
                            <div class="col-md-12">
                               <label>Select employees</label>
                               <select class="form-control 4colactive" id="employees_select" name="multicheckbox[]" multiple="multiple">
                                   @foreach ($course_employees as $key => $employee)
                                       <option value="{{$employee->id}}">{{$employee->firstname." ".$employee->lastname}}</option>
                                   @endforeach
                               </select>  
                               <span id="email_employees_err" class="err_text"></span>
                               </div>  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offsetbox">
                                <div class="row">
                                   <div class="form-group">
                                       <label for="" class="labelheading">CC </label>
                                       <input type="text" name="email_cc" id="email_cc" class="email_cc email_input_f form-control" placeholder="Email CC">
                                       <span id="email_cc_err" class="err_text"></span>
                                    </div>
                               </div>
                               <div class="row">
                                   <div class="form-group">
                                       <label for="" class="labelheading">BCC </label>
                                       <input type="text" name="email_bcc" id="email_bcc" class="email_bcc email_input_f form-control" placeholder="Email BCC">
                                       <span id="email_bcc_err" class="err_text"></span>
                                    </div>
                               </div>
                               <div class="row">
                                   <div class="form-group">
                                       <label for="" class="labelheading">Subject</label>
                                       <input type="text" name="email_subject" id="email_subject" class="email_subject email_input_f form-control" placeholder="Email Subject">
                                       <span id="email_subject_err" class="err_text"></span>
                                    </div>
                               </div>
                               <div class="row">
                                   <div class="form-group">
                                       <label for="" class="labelheading">Select Template</label>
                                       <select id="templateselect" class="form-control">
                                           <option value=""> --- Select Template -- </option>
                                            @foreach ($inviteTypes as $inviteType)
                                                <option value="{{$inviteType->id}}">{{$inviteType->name}}</option>
                                            @endforeach
                                        </select>   
                                        
                                        <span id="email_body_err" class="err_text"></span>
                                        <a href="" id="edittembtn" class="btn btn-primary">Edit template</a>
                                    </div>
                               </div>
                               <div class="row">
                               <label>Schedule Date and Time </label>
                                   <div class="col-md-12">
                                       <div class="row">
                                           <div class="col-md-6">
                                                <input type="date" id="schedule_date" class="form-control email_input_f" value="" max="{{$course->start_date}}" placeholder="Select date">
                                           </div>
                                           <div class="col-md-6">
                                                <input type="time" id="schedule_time" class="form-control email_input_f" value="" placeholder="Select time">
                                           </div>
                                       </div>
                                       <span id="schedule_time_err" class="err_text"></span>
                                   </div>
                                   
                               </div><br>
                               <div class="row">
                                    <input type="submit" id="formbtn" class="btn btn-primary" value="Send">
                                    <input type="button" id="schedulebtn" class="btn btn-primary" value="Scedule Mail">
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

 @include("components.script")

<script>
$('select[multiple]').multiselect({
    columns: 2,
    selectAll : true,
    placeholder: 'Select employees'
});
</script>
<script>
  $(function () {
    var glob_template = "";  
    $("#schedulebtn").click(function (e) { 
        e.preventDefault();
        var email_subject = $("#email_subject").val();
        var email_employees = $("#employees_select").val().join(',');
        var email_cc = $("#email_cc").val();
        var email_bcc = $("#email_bcc").val();
        var email_body = glob_template;
        var schedule_date = $("#schedule_date").val();
        var schedule_time = $("#schedule_time").val();
        var timing = schedule_date+" "+schedule_time;
        var course_id = {{$course->id}};
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('eventschedulemail')}}",
            data: {course_id:course_id, email_subject:email_subject, email_employees:email_employees, email_cc:email_cc, email_bcc:email_bcc, email_body:email_body, schedule_time:timing},
            success: function (response) {
                $(".err_text").html("");
                if(response.status)
                swal("Scheduled", "Mail scheduled sucessfully done.", "success");
                $(".email_input_f").val("");
                console.log(response);
            }, 
            error: function (err){
            $(".err_text").html("");
            let errors_json = JSON.parse(err.responseText);
            var errors = errors_json.errors;
            $("#email_bcc_err").html(errors.email_bcc?errors.email_bcc[0]:"");
            $("#email_body_err").html(errors.email_body?errors.email_body[0]:"");
            $("#email_cc_err").html(errors.email_cc?errors.email_cc[0]:"");
            $("#email_subject_err").html(errors.email_subject?errors.email_subject[0]:"");
            $("#email_employees_err").html(errors.email_employees?errors.email_employees[0]:"");
            if(schedule_date===''||schedule_time==='')
            $("#schedule_time_err").html("Please select date and time.");
            }
        });
    });
   
    $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
    })

    $("#edittembtn").hide();
    let template_id = $("#templateselect").val();
    if(template_id!=="")
    renderTemplate(template_id);

    function renderTemplate(template_id){
        $("#email_body_err").html("");
        $("#edittembtn").show();
        $("#edittembtn").attr("href", "{{URL::to('/')}}/edittemplate/"+template_id);
        $.ajax({
        type: "post",
        url: "{{route('createinvitationtemplateapi')}}",
        data: {course_id :<?=$course->id?>, template_id : template_id },
        dataType: "text",
        success: function (response) {
            $("#err_text").text("");
            glob_template = response;
            $("#rendertemplate").html(response);
        }
      });
    }

    $("#templateselect").change(function (e) { 
        e.preventDefault();
        let template_id = $("#templateselect").val();
        if(template_id==""){
        $("#rendertemplate").empty();
        $("#edittembtn").hide();
        return false;
        }
        
        renderTemplate(template_id);
    });
    
    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
    
    function clearmessage(){
        $("#email_bcc_err").html("");
        $("#email_body_err").html("");
        $("#email_cc_err").html("");
        $("#email_subject_err").html("");
        $("#email_employees_err").html("");
    }

   
    $("#handleform").submit(function(){
        clearmessage();
        $("#formbtn").prop("disabled", true);
        $("#formbtn").val("Sending...");
        var is_validate = false;
        let employees = $("#employees_select").val().join(',');
        if(employees==""){
            alert("please select atleast one employee");
            $("#formbtn").val("Send");
            $("#formbtn").prop("disabled", false);
            return false;
        }
        let template_id = $("#templateselect").val();
        if(template_id==""){
            alert("please select template");
            $("#formbtn").val("Send");
            $("#formbtn").prop("disabled", false);
            return false;
        }
        
        let email_cc = $("#email_cc").val();
        let email_bcc = $("#email_bcc").val();
        let email_subject = $("#email_subject").val();
        
        if(email_cc!=='')
         if(!isEmail(email_cc)){
            $("#email_cc_err").html("Please enter valid email");
            $("#formbtn").val("Send");
            $("#formbtn").prop("disabled", false);
            return false;
        }
        
        if(email_bcc!=='')
        if(!isEmail(email_bcc)){
            $("#email_bcc_err").html("Please enter valid email");
            $("#formbtn").val("Send");
            $("#formbtn").prop("disabled", false);
            return false;
        }
        
        console.log(template_id);
        $.ajax({
            type: "post",
            url: "{{route('sendinvitationapi')}}",
            data: {course_id:<?=$course->id?>, employees:employees, template_id:template_id, email_cc:email_cc, email_bcc:email_bcc, email_subject:email_subject},
            dataType: "json",
            success: function (response) {
                alert("Email successfully sent to employee email id.");
                // swal("Email Sent", "Email successfully sent to employee email id.", "success");
            },
            error:function(){
                
            },
            complete: function(){
                $("#formbtn").val("Send");
                $("#formbtn").prop("disabled", false);
                swal("Email Sent", "Email successfully sent to employee email id.", "success");
            }
        });
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
  <!-- /.content-wrapper -->
  @include("components.footer")
</body>
</html>
