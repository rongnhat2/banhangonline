@extends('user.layout')
@section('body')
	<div class="I-category">
		<div class="wrapper">
			<div class="category_wrapper">
				<div class="category_header">
					<div class="title">
						Danh mục chi tiết
					</div>
				</div>
				<div class="category_content">
					<div class="category_list_item">
						<?php foreach ($sub_category as $key => $value): ?>
							<a href="{{ route('customer.subcategory', ['id' => $this_category->id, 's_id' => $value->id]) }}" class="category_item">
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
	<div class="body_content_wrapper body_category">
		<div class="wrapper">
			<div class="body_category_aside">
				<div class="I-body_category">
					<div class="title">
						Danh Mục Chính
					</div>
					<div class="content">
						<ul>
							<li><a href="{{ route('customer.allcategory') }}">Tất Cả Danh Mục</a></li>
							<?php foreach ($categories as $key => $value): ?>
								<li><a href="{{ route('customer.category', ['id' => $value->id]) }}"><?php echo $value->category_name ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="body_category_content">
				<div class="I-sub_category_list">
					<div class="title">
						<div class="name">
							Danh mục  : <span><a href="{{ route('customer.category', ['id' => $this_category->id]) }}" style="color: #000;"><?php echo $this_category->category_name ?></a><?php echo "   ----   " ?><?php echo $this_sub_category->sub_category_name ?></span>
						</div>
						<div class="count">
					        	<?php if (empty ($count_item->total)): ?>
						        	<?php echo 'Hiện chưa có sản phẩm nào được bày bán' ?>
					        	<?php else:  ?>
					        		Số lượng sản phẩm : <?php echo $count_item->total ?>
						        <?php endif ?>
						</div>
					</div>
					<div class="content">
						<div class="sub_category_list_item">
							<div class="for_user_list_item">
								<?php foreach ($item as $key => $value): ?>
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
		</div>
	</div>
@endsection()


