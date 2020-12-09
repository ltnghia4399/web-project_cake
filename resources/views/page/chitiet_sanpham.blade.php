@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$product_detail->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
								@if($product_detail->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
							<img src="source/image/product/{{$product_detail->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$product_detail->name}}</p>
								<p class="single-item-price">
									@if($product_detail->promotion_price == 0)
										<span class="flash-sale">{{number_format($product_detail->unit_price)}} VND</span>
									@else
										<span class="flash-del">{{number_format($product_detail->unit_price)}} VND</span>
										<span class="flash-sale">{{number_format($product_detail->promotion_price)}} VND</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$product_detail->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$product_detail->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
							@foreach($relative_product as $relative_pr)
							<div class="col-sm-4">
								<div class="single-item">
								@if($relative_pr->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
									<div class="single-item-header">
										<a href="{{route('chitiet_sanpham',$relative_pr->id)}}"><img src="source/image/product/{{$relative_pr->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$relative_pr->name}}</p>
										<p class="single-item-price">
										@if($relative_pr->promotion_price == 0)
												<span class="flash-sale">{{number_format($relative_pr->unit_price)}} VND</span>
										@else
												<span class="flash-del">{{number_format($relative_pr->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($relative_pr->promotion_price)}} VND</span>
										@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="space40">&nbsp;</div>
						</div>
						<div class="row">{{$relative_product->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/assets/dest/images/products/sales/1.png" alt=""></a>
									<div class="media-body">
										Sample Woman Top
										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							@foreach($new_product as $new_pr)
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitiet_sanpham',$new_pr->id)}}"><img src="source/image/product/{{$new_pr->image}}" alt="" heigh="250px"></a>
									<div class="media-body">
										{{$new_pr->name}}
										@if($new_pr->promotion_price == 0)
												<span class="flash-sale">{{number_format($new_pr->unit_price)}} VND</span>
										@else
												<span class="flash-del">{{number_format($new_pr->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($new_pr->promotion_price)}} VND</span>
										@endif
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection