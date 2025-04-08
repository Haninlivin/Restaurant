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
                      <h3 class="card-title">Dishes</h3>                      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @if (session('message'))
                        <div class="alert alert-success">
                          {{ session('message') }}
                        </div>
                      @endif
                      <div>
                        <a href="/dish/create" class="btn btn-success">Create</a>
                      </div>
                        <table id="dishes" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Dish Name</th>
                              <th>Category Name</th>
                              <th>Created</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($dishes as $dish)
                              <tr>
                                <td> {{ $dish->name }} </td>
                                <td> {{ $dish->category->name }} </td>
                                <td> {{ $dish->created_at }} </td>
                                <td>
                                  <div class="form-row">
                                    <a href="/dish/{{ $dish->id }}/edit" class="btn btn-info" style=" height: 38px; margin-right: 10px; ">Edit</a>
                                    <form action="/dish/{{ $dish->id }}" method="POST">
                                      @csrf
                                      @method('Delete')
                                      <button class="btn btn-danger" onclick="return confirm ('Are you sure want to delete this item?')">Delete</button>
                                    </form>
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
        $('#dishes').DataTable({
            "paging": true,
            "lengthChange": false,
            "pageLength":10,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>