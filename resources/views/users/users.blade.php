@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{route('adduser')}}" class="float-r"><button class="btn float-right btn-primary">Add User</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto">
              <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                  <th>Sr.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User type</th>
                  <th>Access tabs Names</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $key =>  $user)
                <tr>
                  <td class="serialnumberRow">{{($key+1)}}</td>
                  <td>{{$user->first_name.' '.$user->last_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->user_type==1?"Normal":"Consultant"}}</td>
                  <td>{{$user->accessTabs!=''?str_replace(',', ', ', $user->accessTabs):'-'}}</td>
                  <td class="ActionBtnRow">{!!(auth()->user()->id!=$user->id)?'<a class="linktxt" href="'.route('deleteuser', $user->id).'"><button class="btn btn-danger">Delete</button></a>':''!!}</td>
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
  @include("components.footer")
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
</body>
</html>
