@extends('user.layout')

@section('content')
    <div class="section" style="min-height:400px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 text-center">
                    <form method="GET" action="{{ route('orders.index') }}">
                        <div class="section-title">
                            <h3 class="title">See your orders</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input class="primary-btn order-submit" type="submit" value="List All">
                        </div>
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
@endsection