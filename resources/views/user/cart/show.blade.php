@extends('user.layout')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- Order Details -->
            <div class="col-md-12 order-details">
                <div class="section-title text-center">
                    <p><i class="fa fa-shopping-cart"></i></p>
                    <h3 class="title">Your cart</h3>
                </div>
                <table>
                    <tr>
                        <th>PRODUCT</th>
                        <th>QUANTITY</th>
                        <th>PRICE</th>
                    </tr>
                    @foreach (Cart::getContent()->sort() as $item)
                        <tr>
                            <td>
                                <a href="{{ route('products.show', $item->id) }}">{{$item->name}}</a>
                            </td>
                            <td>
                                <div class="input-number quantity-control">
                                    <input id="{{$item->id}}" onchange="updateQuantity(this)" type="number" value="{{$item->quantity}}">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </td>
                            <td>
                                x ${{$item->price}}
                            </td>
                            <td>
                                <a href="{{ route('cart.remove', $item->id) }}">
                                    <i class="fa fa-close"></i>
                                </a>
                            </td>
                    @endforeach
                </table>
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total">${{Cart::getTotal()}}</strong></div>
                    </div>
                </div>
                
                <a href="{{ route('orders.create') }}" class="primary-btn order-submit">Checkout</a>
            </div>
            <!-- /Order Details -->
        </div>
    </div>
</div>
<script src="/electro/js/cart.js"></script>
@endsection
