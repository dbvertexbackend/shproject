@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">add users</li>
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
                 <form action="{{route('adduser')}}" id="handleform" method="post">
                     @csrf
                    <div class="row">
                    <div class="col-md-4 offsetbox">
                      <div class="row">
                        
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label>Select User</label>
                                 <select class="form-control" id="module_user" name="module_user">
                                     <option value="1">Normal User</option>
                                     <option value="2">Consultant User</option>
                                </select>    
                             </div>
                          </div>
                         </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offsetbox">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                        <div class="col-md-6" id="user_module_check">
                                            <input type="checkbox"  name="user_module"> User
                                        </div>          
                                        <div class="col-md-6" id="client_module_check" >
                                            <input type="checkbox" name="client_module"> Client
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6" id="course_module_check">
                                            <input type="checkbox"   name="course_module"> Course
                                        </div>           
                                        <div class="col-md-6" id="att_module_check">
                                            <input type="checkbox"  name="attendance_module"> Attendance
                                        </div>
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="row">

                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                    <span id="first_name_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                    <span id="last_name_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="email">
                                    <span id="email_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Mobile No.</label>
                                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                                    <span id="mobile_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                                    <span id="password_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="passsword" name="confirm_password" id="confirm_password"  class="form-control" placeholder="Confirm Password">
                                    <span id="confirm_password_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" class="form-control" value="Add user">
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
  @include("components.footer")<!-- jQuery 3 -->
 @include("components.script")
<!-- page script -->
<script>
  $(function () {
    $("#module_user").change(function(){   
        if($(this).val()==2){
            $("#user_module_check").hide();
            $("#client_module_check").hide();
            $("#course_module_check").hide();
            $("#att_module_check").show();
        }
        if($(this).val()==1){
            $("#user_module_check").show();
            $("#client_module_check").show();
            $("#course_module_check").show();
            $("#att_module_check").show();
        }
    });

    $("#handleform").submit(function(){
        var is_validate = true;
        var first_name = $("#first_name").val();
        var first_name_err = $("#first_name_err");
        var last_name = $("#last_name").val();
        var last_name_err = $("#last_name_err");
        var email = $("#email").val();
        var email_err = $("#email_err");
        var mobile = $("#mobile").val();
        var mobile_err = $("#mobile_err");
        var password = $("#password").val();
        var password_err = $("#password_err");
        var confirm_password = $("#confirm_password").val();
        var confirm_password_err = $("#confirm_password_err");
        
        if(first_name==''){
            is_validate=false;
            first_name_err.html("Please enter first name");
        }  
        else{
            first_name_err.html("");
        }

        if(last_name==''){
            is_validate=false;
            last_name_err.html("Please enter last name");
        }  
        else{
            last_name_err.html("");
        }

        if(email==''){
            is_validate=false;
            email_err.html("Please enter email.");
        }  
        else{
            email_err.html("");
        }

        if(mobile==''){
            is_validate=false;
            mobile_err.html("Please enter Mobile");
        }  
        else{
            mobile_err.html("");
        }

        if(password==''){
            is_validate=false;
            password_err.html("Please enter Password");
        }  
        else{
            password_err.html("");
        }

        if(confirm_password==''){
            is_validate=false;
            confirm_password_err.html("Please enter Confirm Password");
        }  
        else{
            if(password!=confirm_password){
                is_validate=false;
                confirm_password_err.html("Confirm password not matched.");
            }
            else
            confirm_password_err.html("");
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
