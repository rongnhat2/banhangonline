@extends('user.layout')
@section('body')
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
								<?php foreach ($categories as $key => $value): ?>
									<a href="{{ route('customer.category', ['id' => $value->id]) }}" class="sub_category_item">
										<?php echo $value->category_name ?>
									</a>
								<?php endforeach ?>
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
									Danh Mục phổ biến
								</div>
							</div>
							<div class="best_searching_content">
								<div class="best_searching_list_item">
									<?php foreach ($category_trending as $key => $value): ?>
										<a href="{{ route('customer.subcategory', ['id' => $value->category_id, 's_id' => $value->id]) }}" class="best_searching_item">
											<div class="image">
												<img src="{{ asset($value->sub_category_image) }}">
											</div>
											<div class="content">
												<div class="title">
													<?php echo $value->sub_category_name ?>
												</div>
												<div class="count_item">
													<?php echo number_format($value->count) ?> Sản Phẩm <br> <?php echo number_format($value->sub_category_view) ?> Lượt Xem
												</div>
											</div>
										</a>
									<?php endforeach ?>
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
									<a href="{{ route('customer.allcombo') }}">Xem thêm</a>
								</div>
							</div>
							<div class="gallery_content">
								<div class="gallery_list_item">
									<?php foreach ($combo as $key => $value): ?>
										<a href="{{ route('customer.subcombo', ['id' => $value->id]) }}" class="gallery_item">
											<div class="content">
												<div class="title">
													<?php echo $value->combo_item_name ?>
												</div>
												<!-- <div class="count_item">
													11.111 Combo
												</div> -->
											</div>
											<div class="listimage">
												<div class="image">
													<img src="{{ asset($value->item_image_01) }}">
												</div>
												<div class="image">
													<img src="{{ asset($value->item_image_02) }}">
												</div>
												<div class="image">
													<img src="{{ asset($value->item_image_03) }}">
												</div>
											</div>
										</a>
									<?php endforeach ?>
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
									<a href="{{ route('customer.allcategory') }}">Xem thêm</a>
								</div>
							</div>
							<div class="category_content">
								<div class="category_list_item">
									<?php foreach ($sub_category as $key => $value): ?>
									<a href="{{ route('customer.subcategory', ['id' => $value->category_id, 's_id' => $value->id]) }}" class="category_item">
										<div class="image_wrapper">
											<div class="image">
												<img src="{{ asset($value->sub_category_image) }}">
											</div>
										</div>
										<div class="title">
											<?php echo $value->sub_category_name ?>
										</div>
									</a>
									<?php endforeach ?>
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
									<?php foreach ($item_random as $key => $value): ?>
										<a href="{{ route('customer.item', ['id' => $value->id]) }}" class="for_user_item skin_item">
											<div class="item_image">
												<img src="{{ asset($value->item_image) }}">
											</div>
											<div class="item_title">
												<?php echo $value->item_name ?>
											</div>
											<div class="item_prices">
												@if ( $value->item_discount != 0 )
													<?php echo number_format($value->item_prices - ($value->item_prices  * $value->item_discount / 100)). " đ" ?> 
												@else
													<?php echo number_format($value->item_prices). " đ" ?> 
												@endif
											</div>
											@if ( $value->item_discount != 0 )
												<div class="item_origin_prices">
													<span class="origin"><?php echo number_format($value->item_prices). " đ" ?> </span><span class="discount"><?php echo $value->item_discount .' %' ?></span>
												</div>
											@endif
										</a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection()


