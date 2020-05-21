@extends('user.layout')
@section('body')
				<?php foreach ($categories as $key => $value): ?>
					<div class="I-category">
						<div class="wrapper">
							<div class="category_wrapper">
								<div class="category_header">
									<a href="{{ route('customer.category', ['id' => $value->id]) }}" class="title" style="color: #000;">
										<?php echo $value->category_name ?>
									</a>
								</div>
								<div class="category_content">
									<div class="category_list_item">
										<?php foreach ($sub_category[$value->id] as $sub_category_item): ?>
											<a  href="{{ route('customer.subcategory', ['id' => $value->id, 's_id' => $sub_category_item->id]) }}"  class="category_item">
												<div class="image_wrapper">
													<div class="image">
														<img src="{{ asset($sub_category_item->sub_category_image) }}">
													</div>
												</div>
												<div class="title">
													<?php echo $sub_category_item->sub_category_name ?>
												</div>
											</a>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
@endsection()

