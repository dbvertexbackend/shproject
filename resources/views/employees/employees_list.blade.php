@include("components/header")
@include("components/sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Employees
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Employees</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{route('addemployee', $client_id)}}" class="float-r"><button class="btn btn-primary">Add Employee</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto">
              <table id="example2" class="table table-bordered table-hover table-striped ">
                <thead>
                <tr>
                  <th class="serialnumberRow">Sr.</th>
                  <th>Name</th>
                  <th class="empoloyeeCountRowClient">Gender</th>
                  <th class="ActionBtnRow">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($employees as $key => $employee)
                <tr>
                  <td>{{($key+1)}}</td>
                  <td>{{$employee->firstname." ".$employee->lastname}}</td>
                  <td>{{($employee->gender=='M')?'Male':'Female'}}</td>
                  <td>
                    <a href="{{route('deleteemployee', ['empid'=>$employee->id, 'client_id'=>$client_id])}}"><button class="btn btn-danger">Delete</button></a>
                  </td>
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
</body>
</html>
