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
      Add client
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">add client</li>
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
                 <form action="{{route('addclient')}}" method="post" enctype='multipart/form-data'  id="handleform">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 offsetbox">
                            <div class="row">
                                <div class="form-group">
                                    <label>Profile Pic</label>
                                    <input type="file" name="profile_pic" id="profile_pic" class="form-control" accept="image/*">
                                    <span id="profile_err" class="err_text"></span>
                                </div>   
                                <div class="form-group">
                                    <label>Client's Name</label>
                                    <input type="text" name="name" id="client_name" class="form-control" placeholder="Client Name">
                                    <span id="client_name_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Client's Email</label>
                                    <input type="email" name="email" id="client_email" class="form-control" placeholder="Client Email">
                                    <span id="client_email_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                    <label>Other</label>
                                    <input type="text" name="other" id="othertext" class="form-control" placeholder="Other">
                                    <span id="othertext_err" class="err_text"></span>
                                </div>
                                <div class="form-group">
                                  <label>Add Management</label>
                                  <br>  
                                  <a href="about:blank" id="addmoredestination">Add More</a>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" class="form-control" value="Add Client">
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
  @include("components.script")
<!-- page script -->
<script>
  $(function () {
    $("#module_user").change(function(){   
        if($(this).val()==1){
            $("#user_module_check").hide();
            $("#client_module_check").hide();
            $("#course_module_check").hide();
            $("#att_module_check").show();
        }
        else{
            $("#user_module_check").show();
            $("#client_module_check").show();
            $("#course_module_check").show();
            $("#att_module_check").show();
        }
    });

    $("#profile_pic").change((event)=>{
        var files = event.target.files;
        if(files){
        var file = files[0];
        var fileType = (files[0].type).split("/")[0];
        console.log(fileType);
        if(fileType!='image'){
            alert("please select image file only.");
            event.preventDefault();
            $("#profile_pic").val(null);
            $("#profile_pic").reset();
            return false;
        }
        }
    })

   
    $("#handleform").submit(function(){
        var is_validate = true;
        var client_name = $("#client_name").val();
        var client_name_err = $("#client_name_err");
        var client_email = $("#client_email").val();
        var client_email_err = $("#client_email_err");
        var profile_pic = $("#profile_pic");
        var profile_err = $("#profile_err");
        var files = $("#profile_pic").val();
        if(client_name==''){
            is_validate=false;
            client_name_err.html("Please enter client's name");
        }  
        else{
            client_name_err.html("");
        }

        if(client_email==''){
            is_validate=false;
            client_email_err.html("Please enter client's email.");
        }  
        else{
          client_email_err.html("");
        }
        
        if(!files){
            is_validate=false;
            profile_err.html("Please select profile image");
        }
        else{
            profile_err.html("");
        }

        jQuery('.destination_name').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please Enter Designation Name");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        jQuery('.destination_email').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please enter email.");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        jQuery('.destination_mobile').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please enter Mobile No.");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        jQuery('.destination_pos').each(function(index, currentElement) {
           if($(this).val()==""){
             $(this).next().text("Please enter designation.");
             is_validate=false;
           }
           else{
            $(this).next().text("");
           }
        });

        if(client_email!=='')
        $.ajax({
          type: "post",
          url: "{{route('isclientemailexists')}}",
          data: {"email":client_email, "_token":"{{csrf_token()}}"},
          dataType: "json",
          success: function (response) {
            if(response.status)
            client_email_err.text("This email already used.")
            return ((response.status===false)&&is_validate);
          }
        });
        return is_validate;
    })


var destination_count = 0;

$("#addmoredestination").click(function(e){
  e.preventDefault();
  $("#removedestination"+destination_count).hide();
  destination_count++;
  var destination_tmp = `<div id="form_group${destination_count}" class="destination-group">
                      <label>#${destination_count}</label> <span class="float-r" id="removedestination${destination_count}" ><a href="about:blank" class="removedestination">remove</a></span>
                      <input class="destination_name form-control" type="text" name="destination_name[]" value="" placeholder="Name">
                      <span class="designation_err err_text"></span>
                      <input class="destination_email form-control" type="email" name="destination_email[]" value="" placeholder="Email">
                      <span class="designation_err err_text"></span>
                      <input class="destination_mobile form-control" type="number" name="destination_mobile[]" value="" placeholder="Mobile">
                      <span class="designation_err err_text"></span>
                      <input class="destination_pos form-control" type="text" name="destination_pos[]" value="" placeholder="Designation">
                      <span class="designation_err err_text"></span>
                      </div>`;
  $( "#addmoredestination" ).before( destination_tmp );
  if(destination_count==3)
  $(this).hide();
})

$(document).on("click", ".removedestination", function(e){
  e.preventDefault();
  $("#form_group"+destination_count).remove();
  destination_count--;
  $("#removedestination"+destination_count).show();
  $( "#addmoredestination" ).show();
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
@include("components.footer")
</body>
</html>
