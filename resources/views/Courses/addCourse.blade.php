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
                 <form action="{{route('addcourse')}}" enctype='multipart/form-data'  id="handleform" method="post">
                     @csrf
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
