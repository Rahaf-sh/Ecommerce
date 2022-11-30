
@extends('admin.layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->id }} </td>
                    <td>{{ $category->name}} </td>
                    <td>{{ $category->description}} </td>
                    <td>{{ $category->created_at->format('Y-m-d H:i:s') }} </td>
                    <td>{{ $category->updated_at->format('Y-m-d H:i:s') }} </td>
                    <td class="text-center"><a href="#" class="btn btn-info "><i class="fa fa-edit"></i></a></td>
                    <td class="text-center"><button type="button" class="btn btn-danger " data-toggle="modal"><i class="fa fa-trash"></i></button></td>
                  
                  </tr>
                 @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>

            <!-- /.card -->
@endsection