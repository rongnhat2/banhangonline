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
						<ul>
							<?php foreach ($categories as $key => $value): ?>
								<li><a href=""><?php echo $value->category_name ?></a></li>
							<?php endforeach ?>
							<!-- <li><a href="">Áo Khoác</a></li>
							<li><a href="">Quần</a></li>
							<li><a href="">Phụ Kiện</a></li> -->
						</ul>
						<div class="respon_search">
							<input type="" name="" placeholder="Tìm kiếm tại Style Shop">
							<a href="#"><i class="fas fa-search"></i></a>
						</div>
					</div>
					<div class="logo">
						<a href="">Style Shop</a>
					</div>
					<div class="search">
						<input type="" name="" placeholder="Tìm kiếm tại Style Shop">
						<a href="#"><i class="fas fa-search"></i></a>
					</div>
					<div class="shopping_cart">
		            	@guest
							<a href="{{ route('customer.login') }}">Đăng Nhập</a>
		            	@else
							<a href="{{ route('logout') }}"
		                       onclick="event.preventDefault();
		                                     document.getElementById('logout-form').submit();">
		                        Đăng Xuất
		                    </a>
		                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                        @csrf
		                    </form>
		            	@endguest
						<a href="#" class="shopping_cart_icon">
							<div class="count">
								3
							</div>
							<div class="icon">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</a>
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


