<!DOCTYPE html>
<html>
	<head>
		<title>CLOTHER_SHOP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" href="{{ asset('user/css/bootstrap3.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style-overview.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/item.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
		<script src="{{ asset('user/js/jquery-3.4.1.min.js') }}"></script>
	</head>
	<body> 
		<div class="main">
			<div class="header">
				<div class="wrapper">
					<div class="navigation_respon">
						<div class="navigation_respon_icon">
							<i class="fas fa-bars"></i>
						</div>
					</div>
					<div class="I-respon_category">
						<div class="respon_search">
							<input type="" name="" placeholder="Tìm kiếm tại Style Shop">
							<a href="#"><i class="fas fa-search"></i></a>
						</div>
						<ul>
							<?php foreach ($categories as $key => $value): ?>
								<li><a href=""><?php echo $value->category_name ?></a></li>
							<?php endforeach ?>
						</ul>
						<div class="user_login">
			            	@guest
								<a href="{{ route('customer.login') }}">Đăng Nhập</a>
			            	@else
			            	<div class="user_wrapper">
								<a href="/customer_update">Thông Tin Cá Nhân</a>
								<a href="">Lịch Sử Giao Dịch</a>
								<a href="{{ route('logout') }}"
			                       onclick="event.preventDefault();
			                                     document.getElementById('logout-form').submit();">
			                        Đăng Xuất
			                    </a>
			                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                        @csrf
			                    </form>
			            	</div>
			            	@endguest
			            	<a href="{{ route('customer.checkout') }}">Đi tới giỏ hàng</a>
						</div>
					</div>
					<div class="logo">
						<a href="/">Style Shop</a>
					</div>
					<div class="search">
						<input type="" name="" placeholder="Tìm kiếm tại Style Shop">
						<a href="#"><i class="fas fa-search"></i></a>
					</div>
					<div class="shopping_cart">
						<a href="{{ route('customer.checkout') }}" class="shopping_cart_icon">
							<div class="count">
								@if ( Session::has('cart') )
									<?php echo $amount_item; ?>
								@else
									0
								@endif
							</div>
							<div class="icon">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</a>
						<div class="login_wrapper">
			            	@guest
								<a href="{{ route('customer.login') }}">Đăng Nhập</a>
			            	@else
			            	<a><i class="fas fa-user"></i></a>
			            	<div class="user_wrapper">
								<div class="username">
									@if(Session::has('customer'))
										<?php echo Session::get('customer')->customer['username'] ?>
									@endif 
								</div>
								<a href="/customer_update">Thông Tin Cá Nhân</a>
								<a href="">Lịch Sử Giao Dịch</a>
								<a href="{{ route('logout') }}"
			                       onclick="event.preventDefault();
			                                     document.getElementById('logout-form').submit();">
			                        Đăng Xuất
			                    </a>
			                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                        @csrf
			                    </form>
			            	</div>
			            	@endguest
						</div>
					</div>
				</div>
			</div>
			<div class="body">
				@yield('body')
			</div>
			<div class="footer">
				
			</div>
		</div>
	</body>
	<script src="{{ asset('user/js/bootstrap3.js') }}"></script>
	<script src="{{ asset('user/js/effect_custom.js') }}"></script>
</html>


