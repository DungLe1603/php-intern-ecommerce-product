@extends('user.layout')

@section('content')
    <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{url('products')}}">Home</a></li>
							<li class="active">Checkout</li>
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
                    <form action="{{url('order')}}" method="POST">
                        @csrf
                        <div class="col-md-7">
                            
                            <!-- Billing Details -->
                            <div class="billing-details">
                                <div class="section-title">
                                    <h3 class="title">Billing address</h3>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="fullname" placeholder="Full Name">
                                    @error('fullname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" type="email" name="email" placeholder="Email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Address">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="input" type="tel" name="phone" placeholder="Telephone">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /Billing Details -->

                            <!-- Order notes -->
                            <div class="order-notes">
                                <textarea class="input" name="order_notes" placeholder="Order Notes"></textarea>
                            </div>
                            <!-- /Order notes -->
                        </div>

                        <!-- Order Details -->
                        <div class="col-md-5 order-details">
                            <div class="section-title text-center">
                                <h3 class="title">Your Order</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>PRODUCT</strong></div>
                                    <div><strong>TOTAL</strong></div>
                                </div>
                                <div class="order-products">
                                    @foreach (Cart::getContent() as $item)
                                        <div class="order-col">
                                            <div>{{$item->quantity}}x {{$item->name}}</div>
                                            <div>${{$item->price}}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="order-col">
                                    <div>Shiping</div>
                                    <div><strong>FREE</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>TOTAL</strong></div>
                                    <div><strong class="order-total">${{Cart::getTotal()}}</strong></div>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="input-radio">
                                    <input type="radio" name="invoice" value="download" id="payment-1">
                                    <label for="payment-1">
                                        <span></span>
                                        Direct download
                                    </label>
                                    <div class="caption">
                                        <p>Download the invoice directly from the website.</p>
                                    </div>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="invoice" value="email" id="payment-2">
                                    <label for="payment-2">
                                        <span></span>
                                        Email
                                    </label>
                                    <div class="caption">
                                        <p>Receive the invoice in email.</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn order-submit">Place order</button>
                        </div>
                        <!-- /Order Details -->  
                    </form>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection