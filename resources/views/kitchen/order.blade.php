@extends('layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-12 col-sm-6 d-flex justify-content-between">
            <h1 class="m-0">Kitchen Admin Dashboard</h1>
            <div>
              <form action="logout" method="POST">
                @csrf
                <button class="btn btn-info" type="submit">Logout</button>
              </form>
            </div>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Order List</h3>                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @if (session('message'))
                        <div class="alert alert-success">
                          {{ session('message') }}
                        </div>
                      @endif
                        <table id="orders" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Dish Name</th>
                              <th>Table Number</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($orders as $order)
                              <tr>
                                <td> {{ $order->dish->name }} </td>
                                <td> {{ $order->table_id }} </td>
                                <td> {{ $status[$order->status] }} </td>
                                <td>
                                  <div>
                                    <a href="/order/{{ $order->id }}/ready" class="btn btn-primary">Ready</a>
                                    <a href="/order/{{ $order->id }}/approve" class="btn btn-info">Approve</a>
                                    <a href="/order/{{ $order->id }}/cancel" class="btn btn-danger">Cancel</a>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
<script src="plugins/jquery/jquery.min.js"></script>
<script>
    $(function () {
        $('#orders').DataTable({
            "paging": true,
            "searching":false,
            "lengthChange": false,
            "pageLength":10,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>