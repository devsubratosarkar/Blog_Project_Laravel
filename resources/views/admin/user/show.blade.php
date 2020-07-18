@extends('admin.layouts.app')

@section('headSection')
  
<link rel="stylesheet" href="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.css')}}">

@endsection

@section('main-content')

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Laravel Blog Page
         <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Users</h3>
          <a class="col-lg-offset-5 btn btn-success" href="{{ route('user.create') }}">Add New</a>
          @include('includes.messege')
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="box">
            <div class="box-header">
              @include('includes.messege')
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>Assigned Roles</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $row => $user)

                  <tr>
                  <td>{{$row + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>
                    @foreach ($user->roles as $role)
                      {{ $role->name }},
                    @endforeach
                  </td>
                  <td>{{$user->status? 'Active' : 'Inactive' }}</td>
                  <td><a href="{{ route('user.edit',$user->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                  <td>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="post" style="display: none">
                      @csrf
                      @method('DELETE')
                   </form>
                   <a href="" onclick="
                        if(confirm('Are you sure, You want to delete this !')){
                          event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit();
                        }else{
                          event.preventDefault();
                        }"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                </tr>

                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>Assigned Roles</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('footerSection')

<script src="{{ asset('public/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection