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
							<li><a href="">Áo</a></li>
							<li><a href="">Áo Khoác</a></li>
							<li><a href="">Quần</a></li>
							<li><a href="">Phụ Kiện</a></li>
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
				<div class="I-slider">
					<div class="wrapper">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">

						  	<ol class="carousel-indicators">
							    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							    <li data-target="#myCarousel" data-slide-to="1"></li>
							    <li data-target="#myCarousel" data-slide-to="2"></li>
							    <li data-target="#myCarousel" data-slide-to="3"></li>
						  	</ol>

						  	<div class="carousel-inner">
							    <div class="item active">
							      	<img src="images/banner_01.png">
							    </div>
							    <div class="item">
							      	<img src="images/banner_02.png">
							    </div>
							    <div class="item">
							      	<img src="images/banner_03.png">
							    </div>
							    <div class="item">
							      	<img src="images/banner_04.png">
							    </div>
						  	</div>

						  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left"></span>
							    <span class="sr-only">Previous</span>
						  	</a>
						  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right"></span>
							    <span class="sr-only">Next</span>
						  	</a>
						</div>
					</div>
				</div>
				<div class="I-sub_category">
					<div class="wrapper">
						<div class="sub_category_wrapper">
							<div class="sub_category_list_item">
								<a href="#" class="sub_category_item">
									Áo
								</a>
								<a href="#" class="sub_category_item">
									Áo Khoác
								</a>
								<a href="#" class="sub_category_item">
									Quần 
								</a>
								<a href="#" class="sub_category_item">
									Phụ Kiện
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="I-flash_deal">
					<div class="wrapper">
						<div class="flash_deal_wrapper">
							<div class="flash_deal_header">
								<div class="title">
									Giảm Giá Shock
									<time>Đến 23:59:59 - 03/04/2020</time>
								</div>
								<div class="buy_all">
									<a href="">Mua Tất Cả</a>
								</div>
							</div>
							<div class="flash_deal_content">
								<div class="flash_deal_list_item">
									<a href="" class="flash_deal_item skin_item">
										<div class="item_image">
											<img src="images/jogger.png">
										</div>
										<div class="item_title">
											Jogger
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="flash_deal_item skin_item">
										<div class="item_image">
											<img src="images/somi.png">
										</div>
										<div class="item_title">
											somi
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="flash_deal_item skin_item">
										<div class="item_image">
											<img src="images/croptop.png">
										</div>
										<div class="item_title">
											croptop
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="flash_deal_item skin_item">
										<div class="item_image">
											<img src="images/phong.png">
										</div>
										<div class="item_title">
											phong
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="flash_deal_item skin_item">
										<div class="item_image">
											<img src="images/thun.png">
										</div>
										<div class="item_title">
											thun
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="flash_deal_item skin_item">
										<div class="item_image">
											<img src="images/sweater.png">
										</div>
										<div class="item_title">
											sweater
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="I-best_searching">
					<div class="wrapper">
						<div class="best_searching_wrapper">
							<div class="best_searching_header">
								<div class="title">
									Tìm kiếm phổ biến
								</div>
							</div>
							<div class="best_searching_content">
								<div class="best_searching_list_item">
									<div class="best_searching_item">
										<div class="image">
											<img src="images/sweater.png">
										</div>
										<div class="content">
											<div class="title">
												sweater
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/somi.png">
										</div>
										<div class="content">
											<div class="title">
												somi
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/thun.png">
										</div>
										<div class="content">
											<div class="title">
												thun
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/croptop.png">
										</div>
										<div class="content">
											<div class="title">
												croptop
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/sweater.png">
										</div>
										<div class="content">
											<div class="title">
												sweater
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/jogger.png">
										</div>
										<div class="content">
											<div class="title">
												jogger
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/sweater.png">
										</div>
										<div class="content">
											<div class="title">
												sweater
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/somi.png">
										</div>
										<div class="content">
											<div class="title">
												somi
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
									<div class="best_searching_item">
										<div class="image">
											<img src="images/khoac_01.png">
										</div>
										<div class="content">
											<div class="title">
												khoac_01
											</div>
											<div class="count_item">
												11.111 Sản Phẩm
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="I-gallery">
					<div class="wrapper">
						<div class="gallery_wrapper">
							<div class="gallery_header">
								<div class="title">
									Bộ Sưu Tập
								</div>
								<div class="show_more">
									<a href="">Xem thêm</a>
								</div>
							</div>
							<div class="gallery_content">
								<div class="gallery_list_item">
									<div class="gallery_item">
										<div class="content">
											<div class="title">
												Combo Mùa Đông
											</div>
											<div class="count_item">
												11.111 Combo
											</div>
										</div>
										<div class="listimage">
											<div class="image">
												<img src="images/item_01.png">
											</div>
											<div class="image">
												<img src="images/item_02.png">
											</div>
											<div class="image">
												<img src="images/item_03.png">
											</div>
										</div>
									</div>
									<div class="gallery_item">
										<div class="content">
											<div class="title">
												Combo Mùa Đông
											</div>
											<div class="count_item">
												11.111 Combo
											</div>
										</div>
										<div class="listimage">
											<div class="image">
												<img src="images/item_01.png">
											</div>
											<div class="image">
												<img src="images/item_02.png">
											</div>
											<div class="image">
												<img src="images/item_03.png">
											</div>
										</div>
									</div>
									<div class="gallery_item">
										<div class="content">
											<div class="title">
												Combo Mùa Đông
											</div>
											<div class="count_item">
												11.111 Combo
											</div>
										</div>
										<div class="listimage">
											<div class="image">
												<img src="images/item_01.png">
											</div>
											<div class="image">
												<img src="images/item_02.png">
											</div>
											<div class="image">
												<img src="images/item_03.png">
											</div>
										</div>
									</div>
									<div class="gallery_item">
										<div class="content">
											<div class="title">
												Combo Mùa Đông
											</div>
											<div class="count_item">
												11.111 Combo
											</div>
										</div>
										<div class="listimage">
											<div class="image">
												<img src="images/item_01.png">
											</div>
											<div class="image">
												<img src="images/item_02.png">
											</div>
											<div class="image">
												<img src="images/item_03.png">
											</div>
										</div>
									</div>
									<div class="gallery_item">
										<div class="content">
											<div class="title">
												Combo Mùa Đông
											</div>
											<div class="count_item">
												11.111 Combo
											</div>
										</div>
										<div class="listimage">
											<div class="image">
												<img src="images/item_01.png">
											</div>
											<div class="image">
												<img src="images/item_02.png">
											</div>
											<div class="image">
												<img src="images/item_03.png">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="I-category">
					<div class="wrapper">
						<div class="category_wrapper">
							<div class="category_header">
								<div class="title">
									Danh mục ngành hàng
								</div>
								<div class="show_more">
									<a href="">Xem thêm</a>
								</div>
							</div>
							<div class="category_content">
								<div class="category_list_item">
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/jogger.png">
											</div>
										</div>
										<div class="title">
											Jogger
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/pull.png">
											</div>
										</div>
										<div class="title">
											Pull
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/somi.png">
											</div>
										</div>
										<div class="title">
											Sơ mi
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/croptop.png">
											</div>
										</div>
										<div class="title">
											Croptop
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/phong.png">
											</div>
										</div>
										<div class="title">
											Phông
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/thun.png">
											</div>
										</div>
										<div class="title">
											Thun
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/sweater.png">
											</div>
										</div>
										<div class="title">
											Sweater
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/khoac_01.png">
											</div>
										</div>
										<div class="title">
											khoac_01
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/khoac_02.png">
											</div>
										</div>
										<div class="title">
											khoac_02
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/somi.png">
											</div>
										</div>
										<div class="title">
											Sơ mi
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/quan_01.png">
											</div>
										</div>
										<div class="title">
											quan_01
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/phong.png">
											</div>
										</div>
										<div class="title">
											Phông
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/quan_02.png">
											</div>
										</div>
										<div class="title">
											quan_02
										</div>
									</div>
									<div class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="images/quan_03.png">
											</div>
										</div>
										<div class="title">
											quan_03
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="I-for_user">
					<div class="wrapper">
						<div class="for_user_wrapper">
							<div class="for_user_header">
								<div class="title">
									Dành Cho bạn
								</div>
							</div>
							<div class="for_user_content">
								<div class="for_user_list_item">
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/jogger.png">
										</div>
										<div class="item_title">
											Jogger
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/somi.png">
										</div>
										<div class="item_title">
											somi
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/croptop.png">
										</div>
										<div class="item_title">
											croptop
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/phong.png">
										</div>
										<div class="item_title">
											phong
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/thun.png">
										</div>
										<div class="item_title">
											thun
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/sweater.png">
										</div>
										<div class="item_title">
											sweater
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/phong.png">
										</div>
										<div class="item_title">
											phong
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/thun.png">
										</div>
										<div class="item_title">
											thun
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/quan_01.png">
										</div>
										<div class="item_title">
											quan_01
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/quan_02.png">
										</div>
										<div class="item_title">
											quan_02
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/quan_03.png">
										</div>
										<div class="item_title">
											quan_03
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
									<a href="" class="for_user_item skin_item">
										<div class="item_image">
											<img src="images/quan_04.png">
										</div>
										<div class="item_title">
											quan_04
										</div>
										<div class="item_prices">
											160.000 đ
										</div>
										<div class="item_origin_prices">
											<span class="origin">900.000</span><span class="discount">-50%</span>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				
			</div>
		</div>
	</body>
	<script src="js/bootstrap3.js"></script>
	<script src="js/effect_custom.js"></script>
</html>


