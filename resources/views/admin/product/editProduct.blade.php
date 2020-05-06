@extends('admin.layouts.content')
@section('title','Edit Product')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
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
                <!-- Main row -->
                <h2>Update Product</h2>
                <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data"
                      class="form">
                    @csrf
                    @method('put')
                    <table class="table-condensed">
                        <tr class="form-group">
                            <th class="col-md-5 float-left"><label for="">Product Name: </label></th>
                            <td class="col-md-7 float-left">
                                <input type="text" name="product_name"
                                       value="{{$product->product_name}}"
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
                        <tr class="form-group">
                            <th class="col-md-5 float-left"><label for="">Old Image: </label>
                            </th>
                            <td class="col-md-7 float-left">
                                <img src="{{\Storage::disk('gcs')->url($product->images)}}" alt="Product Image"
                                     style="width: 100px;height: 100px">
                            </td>
                        </tr>
                        <tr class="form-group">
                            <th class="col-md-5 float-left"><label for="">Image: </label>
                            </th>
                            <td class="col-md-7 float-left"><input class="" type="file"
                                                                   name="image"
                                                                   style="width: 98%; margin-left: 2%">
                            </td>
                            <td>
                                @if($errors->any())
                                    @foreach($errors->get('image') as $messages)
                                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <input class="" type="hidden" name="old_image" value="{{$product->images}}"
                               placeholder="Enter Product Name" style="width: 98%; margin-left: 2%">
                    </table>
                    <button class="btn btn-primary">Update</button>
                    <a href="{{route('admin.index')}}" class="btn btn-danger">Back</a>
                </form>
            </div>
            <!-- /.row (main row) -->
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
