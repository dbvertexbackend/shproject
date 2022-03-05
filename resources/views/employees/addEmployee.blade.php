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
                 <form action="{{route('addemployeepost')}}" id="handleform" method="post">
                     @csrf
                    <input type="hidden" name="client_id" value="{{$client_id}}"> 
                    <div class="row">
                        <div class="col-md-4 offsetbox">
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
                                    <input type="mobile" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                                    <span id="mobile_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" id="gender" class="form-control" placeholder="gender">
                                      <option value="">--Select Gender--</option>
                                      <option value="M">Male</option>
                                      <option value="F">Female</option>
                                    </select>
                                    <span id="gender_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" class="form-control" value="Add Employee">
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
        var gender = $("#gender").val();
        var gender_err = $("#gender_err");
        
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

        if(gender==''){
            is_validate=false;
            gender_err.html("Please enter gender.");
        }  
        else{
          gender_err.html("");
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
