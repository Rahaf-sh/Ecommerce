
@extends('admin.layouts.app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Units</li>
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
                <h3 class="card-title">Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Invoice NO</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Customer</th>
                    <th>Note</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th class="text-center">Show</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->invoice_no}}</td>
                    <td>{{$order->grand_total}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
                    <td>{{$order->note}}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }} </td>
                    <td>{{ $order->updated_at->format('Y-m-d H:i:s') }} </td>
                    <td class="text-center"><a href="{{ url('admin/orders/show/'.$order->id) }}" class="btn btn-info "><i class="fa fa-eye"></i></a></td>
                  
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
@endsection