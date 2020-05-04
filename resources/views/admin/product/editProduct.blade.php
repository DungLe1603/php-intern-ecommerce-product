@extends('admin.layouts.content')

@section('content')
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
                <h2>Update Product</h2>
                <a href="{{route('admin.listAllProducts')}}" class="btn btn-primary">Back</a>
                <form action="{{route('admin.updateProduct',$product->id)}}" method="post">
                    @csrf
                    @method('put')
                    <table class="table-condensed">
                        <tr class="form-group">
                            <th class="col-md-5 float-left"><label for="">Product Name: </label></th>
                            <td class="col-md-7 float-left"><input type="text" name="product_name"
                                                                   value="{{$product->product_name}}"
                                                                   placeholder="Enter Product Name"
                                                                   style="width: 98%; margin-left: 2%"></td>
                        </tr>
                        <tr class="form-group">
                            <th class="col-md-5 float-left"><label for="">Quantity: </label></th>
                            <td class="col-md-7 float-left"><input class="" type="text" name="quantity"
                                                                   value="{{$product->quantity}}"
                                                                   placeholder="Enter Product Name"
                                                                   style="width: 98%; margin-left: 2%"></td>
                            <td>
                                @if($errors->any())
                                    @foreach($errors->get('quantity') as $messages)
                                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr class="form-group">
                            <th class="col-md-5 float-left"><label for="">Description: </label></th>
                            <td class="col-md-7 float-left"><textarea id="editor1" name="description" cols="30"
                                                                      rows="5"
                                                                      class="form-control form-control-lg">{{$product->description}}</textarea>
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
                            <th class="col-md-5 float-left"><label for="">Configuration: </label></th>
                            <td class="col-md-7 float-left"><textarea id="editor2" name="configuration" cols="30"
                                                                      rows="5"
                                                                      class="form-control form-control-lg">{{$product->configuration}}</textarea>
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
                            <th class="col-md-5 float-left"><label for="">Price: </label></th>
                            <td class="col-md-7 float-left"><input class="" type="text" name="price"
                                                                   value="{{$product->price}}"
                                                                   placeholder="Enter Product Name"
                                                                   style="width: 98%; margin-left: 2%"></td>
                            <td>
                                @if($errors->any())
                                    @foreach($errors->get('price') as $messages)
                                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <input class="" type="hidden" name="created_at" value="{{$product->created_at}}"
                               placeholder="Enter Product Name" style="width: 98%; margin-left: 2%">
                    </table>
                    <button class="btn btn-primary">Update</button>
                </form>
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
