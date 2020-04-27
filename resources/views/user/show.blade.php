@extends('user.layout')

@section('content')
    <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="{{url('products')}}">Headphones</a></li>
							<li class="active">{{$product->product_name}}</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-1">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="/electro/img/product01.png" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product details -->
					<div class="col-md-5 col-md-push-2">
						<div class="product-details">
							<h2 class="product-name">{{ $product->product_name }}</h2>
							<div>
								<h3 class="product-price">${{ $product->price }} </h3>
								<span class="product-available">{{ $product->quantity }} in Stock</span>
							</div>
							<p>{{ $product->description }}</p>

							<div class="product-options">
								<label>
									Color : {{ $product->colors }}
								</label>
							</div>
                            @if (!Cart::get($product->id))
                                <div class="add-to-cart">
                                    <a href="{{url('add-to-cart') . '/' . $product->id}}">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </a>
                                </div>    
                            @else
                                <div class="add-to-cart">
                                    <label><i class="fa fa-shopping-cart"></i> Already in the cart</label>
                                </div>   
                            @endif
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Configuration</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{ $product->configuation }}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection