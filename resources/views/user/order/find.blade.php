@extends('user.layout')

@section('content')
    <div class="section" style="min-height:400px;padding-top:100px">
        <div class="container">
            <!-- row -->
				<div class="row">
					<div class="col-md-12">
                        <div class="newsletter">
                            <p>See your <strong>Orders</strong></p>
                            <form method="GET" action="{{ route('orders.index') }}">
                                <input name="phone" class="input" type="tel" placeholder="Enter Your phone number">
                                <button type="submit" class="newsletter-btn"><i class="fa fa-envelope"></i> List All</button>
                            </form>
                        </div>
					</div>
				</div>
				<!-- /row -->
        </div>
    </div>
@endsection