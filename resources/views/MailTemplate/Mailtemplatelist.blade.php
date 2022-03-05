@include("components/header")
@include("components/sidebar")
  <style>
    .actionBtnRowClients{
      width:80px;
    }
    .savebbtn{
        margin-top:10px;
    }
  </style>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Mail Templates
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Mail Templates</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body" style="overflow-x:auto">
            <div class="row">
                <div class="col-md-12">
                <TextArea rows="12" type="text" name="email_body" id="email_body" class="email_body form-control" placeholder="email_body">{{$template->template}}</TextArea>    
                <span class="err_text" id="template_err"></span>    
                </div>
                <div class="col-md-12">
                <button class="btn btn-primary savebbtn">Save</button>
               
                </div>
              </div>
            </div>
           </div>
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
  })
</script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
    $(function () {
        $(".savebbtn").click(function (e) { 
            e.preventDefault();
            nicEditors.findEditor("email_body").saveContent();
            let template = $("#email_body").val();
            console.log(template);
            let template_id = {{$template->id}};
            if(template==="")
            $("#template_err").html("Empty template cannot be save.");
            $.ajax({
            type: "post",
            url: "{{route('updatetemplateapi')}}",
            data: {"template":template, "template_id":template_id},
            dataType: "json",
            success: function (response) {
                if(response.status){
                    swal("Updated", "Template Successfully updated", "success");
                }
                else{
                    swal("Failed", "Template update failed", "warning");
                }
            }
        });
        });
       
    });
</script>    
</body>
</html>