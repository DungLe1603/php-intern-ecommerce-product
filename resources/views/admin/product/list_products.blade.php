@extends('admin.layouts.content')

@section('content')
    <script type="text/javascript" src="{{asset('lte\js\delete_product.js')}}"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div>
                    {{--show message success--}}
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="{{route('admin.importProduct')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            @if($errors->any())
                                @foreach($errors->get('file') as $messages)
                                    <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                @endforeach
                            @endif
                        </li>
                        <li class="nav-item">
                            <i class="fa fa-print" style="font-size:24px"></i>
                            <a href="{{asset('lte/excel/products.xlsx')}}">Download excel template</a>
                        </li>
                    </ul>
                    <div class="nav-link bg bg-gradient-light">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                            Create New Product
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <table class="table-condensed">
                                                    <tr class="form-group">
                                                        <th class="col-md-5 float-left"><label for="">Product
                                                                Name: </label></th>
                                                        <td class="col-md-7 float-left"><input type="text"
                                                                                               name="product_name"
                                                                                               placeholder="Enter Product Name"
                                                                                               style="width: 98%; margin-left: 2%">
                                                        </td>
                                                        <td>
                                                            @if($errors->any())
                                                                @foreach($errors->get('product_name') as $messages)
                                                                    <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr class="form-group">
                                                        <th class="col-md-5 float-left"><label for="">Quantity: </label>
                                                        </th>
                                                        <td class="col-md-7 float-left"><input class="" type="text"
                                                                                               name="quantity"
                                                                                               placeholder="Enter Quantity"
                                                                                               style="width: 98%; margin-left: 2%">
                                                        </td>
                                                        <td>
                                                            @if($errors->any())
                                                                @foreach($errors->get('quantity') as $messages)
                                                                    <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr class="form-group">
                                                        <th class="col-md-5 float-left"><label
                                                                for="">Description: </label></th>
                                                        <td class="col-md-7 float-left"><textarea id="editor1"
                                                                                                  name="description"
                                                                                                  cols="20" rows="5"
                                                                                                  class="form-control form-control-lg"></textarea>
                                                        </td>
                                                        <td>
                                                            @if($errors->any())
                                                                @foreach($errors->get('description') as $messages)
                                                                    <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr class="form-group">
                                                        <th class="col-md-5 float-left"><label
                                                                for="">Configuration: </label></th>
                                                        <td class="col-md-7 float-left"><textarea id="editor2"
                                                                                                  name="configuration"
                                                                                                  cols="20" rows="5"
                                                                                                  class="form-control form-control-lg"></textarea>
                                                        </td>
                                                        <td>
                                                            @if($errors->any())
                                                                @foreach($errors->get('configuration') as $messages)
                                                                    <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr class="form-group">
                                                        <th class="col-md-5 float-left"><label for="">Price: </label>
                                                        </th>
                                                        <td class="col-md-7 float-left"><input class="" type="text"
                                                                                               name="price"
                                                                                               placeholder="Enter Price"
                                                                                               style="width: 98%; margin-left: 2%">
                                                        </td>
                                                        <td>
                                                            @if($errors->any())
                                                                @foreach($errors->get('price') as $messages)
                                                                    <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr class="form-group">
                                                        <th class="col-md-5 float-left"><label for="">Image: </label>
                                                        </th>
                                                        <td class="col-md-7 float-left"><input class="" type="file"
                                                                                               name="image"
                                                                                               style="width: 98%; margin-left: 2%">
                                                        </td>
{{--                                                        <td>--}}
{{--                                                            @if($errors->any())--}}
{{--                                                                @foreach($errors->get('price') as $messages)--}}
{{--                                                                    <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>--}}
{{--                                                                @endforeach--}}
{{--                                                            @endif--}}
{{--                                                        </td>--}}
                                                    </tr>
                                                </table>
                                                <button class="btn btn-primary">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav">
                        <div class="float-left">
                            {{$products->onEachSide(1)->links()}}
                        </div>
                        <div class="export float-right">
                            <a href="{{route('admin.exportProduct')}}" class="btn btn-secondary">Export List Product</a>
                        </div>
                    </div>
                    <table class="table-bordered text-center">
                        <thead class="btn-secondary">
                        <tr>
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Configuration</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Images</th>
                            <th colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $value)
                            <tr>
                                <td>{{$key + $products->firstItem()}}</td>
                                <td>{{$value->product_name}}</td>
                                <td>{{$value->quantity}}</td>
                                <td>{{$value->description}}</td>
                                <td>{{$value->configuration}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td><img src="https://storage.googleapis.com/stunited-intern/{{$value->images}}" alt="Product Image" style="width: 50px;height: 50px"></td>

                                <td><a href="{{route('admin.editProduct',$value->id)}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a></td>
                                <td>
                                    <form action="{{route('admin.destroyProduct',$value->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Do you delete it ?')">Delete
                                        </button>
                                    </form>
                                </td>
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
