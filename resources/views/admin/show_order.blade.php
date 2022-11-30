
@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid p-5">

            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Show Order
                    </h3>
                </div>
                <div class="container">
                    <div class="row" style="padding:20px;">
                        <div class="col-md-6">
                            <div class="panel panel-default panel-height">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><i class="fa fa-shopping-cart"></i> <b>Order Details</b></h6>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><button class="btn btn-info btn-xs"><i
                                                        class="fa fa-calendar fa-fw"></i></button></td>
                                            <td> {{$order->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info btn-xs"><i
                                                        class="fa fa-credit-card fa-fw"></i></button></td>
                                        
                                           <td> {{$order->payment_method}}</td>
                                          
                                           <td> </td>
                                         
                                           
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info btn-xs"><i
                                                        class="fa 	fa fa-hashtag fa-fw"></i></button></td>
                                            <td>{{$order->grand_total}}$</td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info btn-xs"><i
                                                        class="fa fa-exclamation-circle fa-fw"></i></button></td>
                                            <td>{{$order->status}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default panel-height">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><i class="fa fa-user"></i> <b>Customer Details</b></h6>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="width: 1%;"><button class="btn btn-info btn-xs"><i
                                                        class="fa fa-user fa-fw"></i></button></td>
                                            <td> {{$order->customer->first_name}} {{$order->customer->last_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info btn-xs"><i
                                                        class="fa fa-envelope fa-fw"></i></button></td>
                                            <td><a href="mailto:{{$order->customer->user->email}}">{{$order->customer->user->email}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info btn-xs"><i
                                                        class="fa fa-phone fa-fw"></i></button></td>
                                            <td>{{$order->customer->phone}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="padding-left: 10px;"><i class="fa fa-info-circle"></i> Order {{$order->invoice_no}}</h3>
                     
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                        
                                    <td class="text-left">
                                     
                                        <p><b>Notes: </b>{!! $order->note !!}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left">Product</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                <tr>
                                    <td class="text-left">{{ $item->product->name }}
                                    </td>
                                    <td class="text-right">{{ $item->quantity }}</td>
                                    <td class="text-right">{{ $item->product->price }}$</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- /.card-header -->

            </div>
            <!-- /.card -->

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection