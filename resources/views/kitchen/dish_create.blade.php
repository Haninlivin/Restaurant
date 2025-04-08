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
                      <h3 class="card-title">Create New Delicious Dish</h3>
                      <a href="/dish" class="btn btn-default float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                      <form action="/dish" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                           <select name="category" id="" class="form-control">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                            <option value=" {{ $category->id }} "> {{ $category->name }} </option>
                            @endforeach
                           </select>
                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <br>
                            <input type="file" name="image_path">
                        </div>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                      </form>
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