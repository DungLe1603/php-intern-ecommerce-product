<!-- Cart -->
<div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Your Cart</span>
        @if (!Cart::isEmpty())
            <div class="qty">{{ Cart::getTotalQuantity() }}</div>
        @endif
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
            @foreach (Cart::getContent() as $item)
            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ Storage::disk('gcs')->url($item->attributes['images']) }}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="{{url('products') . '/' . $item->id}}">{{ $item->name }}</a></h3>
                    <h4 class="product-price"><span class="qty">{{ $item->quantity }} x</span>${{ $item->price }}</h4>
                </div>
                <a href="{{ url('remove-from-cart/'.$item->id) }}">
                    <button class="delete"><i class="fa fa-close"></i></button>
                </a>
            </div>
            @endforeach
        </div>
        <div class="cart-summary">
            <small>{{ Cart::getTotalQuantity() }} Item(s) selected</small>
            <h5>SUBTOTAL: $ {{ Cart::getTotal() }}</h5>
        </div>
        <div class="cart-btns">
            <a href="{{url('cart')}}">View Cart</a>
            <a href="{{url('checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<!-- /Cart -->