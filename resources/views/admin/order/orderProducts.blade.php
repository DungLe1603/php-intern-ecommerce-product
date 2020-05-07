@extends('admin.layouts.content')
@section('title','Order Product')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="card" style="width: 18rem;">
                    <div class="card-header bg bg-secondary"><h3>Order Product</h3></div>
                    <div class="card-body">
                        <h5 class="card-title"><span
                                class="font-weight-bold">Customer Name: {{$orderProduct->first()->order->customer_name}}</span>
                        </h5>
                        <p class="card-text"><span
                                class="font-weight-bold">Address: </span>{{$orderProduct->first()->order->address}}</p>
                        <p class="card-text"><span
                                class="font-weight-bold">Phone: </span>{{$orderProduct->first()->order->phone}}</p>
                        <h6 class="card-text"><span
                                class="font-weight-bold">Total: </span>${{number_format($orderProduct->first()->order->total_price)}}
                        </h6>
                        <a href="{{route('admin.order.index')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item mx-5">
                    </li>
                </ul>
                <div>
                    <table class="table table-hover text-center">
                        <thead class="btn-info">
                        <tr>
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderProduct as $key => $value)
                            <tr>
                                <td>{{$key +1}}</td>
                                @foreach($products as $item)
                                    @if($item->id == $value->product_id)
                                        <td>{{$item->product_name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$value->quantity}}</td>
                                <td>{{$value->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
        CKEDITOR.replace('editor2');
    </script>
@endsection
