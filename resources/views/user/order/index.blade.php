@extends('user.layout')

@section('content')
    <div class="section">
        <div class="container" style="min-height: 400px">
            <!-- row -->
				<div class="row">
					<div class="col-md-12">
                        <div class="newsletter">
                            <table class="table">
                                <tr>
                                    <th>Order Number</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Invoice</th>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>${{ $order->total_price }}</td>
                                        <td><a href="{{ route('orders.download', $order->id) }}">Download</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
					</div>
				</div>
				<!-- /row -->
        </div>
    </div>
@endsection