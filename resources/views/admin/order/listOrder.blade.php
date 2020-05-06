@extends('admin.layouts.content')
@section('title','Order')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <h3>List Order</h3>
                <div>
                    <div class="nav">
                        <div class="nav-item">
                            {{$orders->onEachSide(1)->links()}}
                        </div>
                    </div>
                    <table class="table table-group">
                        <thead class="text-primary">
                        <tr>
                            <th>STT</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Notes</th>
                            <th>Created At</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $key => $value)
                            <tr>
                                <td>{{$key+$orders->firstItem()}}</td>
                                <td>{{$value->customer_name}}</td>
                                <td>{{$value->phone}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->address}}</td>
                                <td>{{$value->total_price}}</td>
                                <td>{{$value->order_notes}}</td>
                                <td>{{$value->created_at}}</td>
                                <td><a href="{{route('admin.orderProduct',$value->id)}}">
                                        <button class="btn btn-primary">Info</button>
                                    </a></td>
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
