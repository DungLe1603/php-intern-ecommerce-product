<!DOCTYPE html>
<html lang="en">
	<head>
		@include('user.layouts.head')
    </head>
	<body>
		@include('user.layouts.header')

		@include('user.layouts.nav')

		@include('user.layouts.flash')

		@yield('content')

		@include('user.layouts.footer')
	</body>
</html>