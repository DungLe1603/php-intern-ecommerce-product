<!-- HEADER -->
<header>
    <!-- MAIN HEADER -->
    <div id="header">

        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="/electro/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form method="GET" action="{{ route('products.index') }}">
                            <select class="input-select">
                            </select>
                            <input name="slug" class="input" placeholder="Search headphones" value="{{ app('request')->input('slug') }}"                           ">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        
                        @include('user.layouts.cart')

                        @if (!Cart::isEmpty())
                            <div>
                                <a href="{{route('orders.create')}}">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    <span>Checkout</span>
                                </a>
                            </div>
                        @endif

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->