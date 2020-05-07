@extends('admin.layouts.content')
@section('title','List Products')

@section('content')
    <script type="text/javascript" src="{{asset('lte\js\delete_product.js')}}"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <form action="{{route('admin.products.importProduct')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="file"
                                   accept=".xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                   name="file">
                            <button type="submit" class="btn btn-primary">Import Excel Product</button>
                        </form>

                        @if($errors->any())
                            @foreach($errors->get('file') as $messages)
                                <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                            @endforeach
                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <i class="fa fa-print" style="font-size:24px"></i>
                            <a href="{{asset('lte/excel/products.xlsx')}}">Download excel template</a>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div>
                    <div id="successMessage">
                        {{--show message success--}}
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="navbar navbar-expand navbar-white navbar-light">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                        class="fas fa-bars"></i></a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{route('admin.products.create')}}"
                                   class="nav-link btn btn-success text-white font-weight-bold">Create</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item d-none d-sm-inline-block ">
                                <a href="{{route('admin.products.exportProduct')}}">
                                    <i class="fas fa-file-excel" style="font-size:20px"> List Product</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <table class="table table-group">
                        <thead class="text-primary">
                        <tr>
                            <th>STT</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Configuration</th>
                            <th>Price</th>
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
                                <td>{!!$value->description!!}</td>
                                <td>{!!$value->configuration!!}</td>
                                <td>{{$value->price}}</td>
                                <td><img src="{{\Storage::disk('gcs')->url($value->images)}}" alt="Product Image"
                                         style="width: 50px;height: 50px"></td>
                                <td><a href="{{route('admin.products.edit',$value->id)}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a></td>
                                <td>
                                    <form action="{{route('admin.products.destroy',$value->id)}}" method="post">
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
                    <div class="">
                        {{$products->onEachSide(1)->links()}}
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
        CKEDITOR.replace('editor2');
    </script>
@endsection
