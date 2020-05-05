<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{route('home')}}">Home</a></li>
                <li class="{{ Request::is('products') ? 'active' : '' }}"><a href="{{route('products.index')}}">Headphones</a></li>
                <li class="{{ Request::is('find-orders') ? 'active' : '' }}"><a href="{{route('orders.find')}}">My orders</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->