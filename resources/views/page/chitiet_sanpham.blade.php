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
							<div class="space50">&nbsp;</div>
							<hr style="height:2px;border-width:0;color:gray;background-color:gray;">
							<p style="font-weight:bold; font-size:25px;">MUA NGAY <a class="add-to-cart" href="{{route('themgiohang',$product_detail->id)}}"><i class="fa fa-shopping-cart"></i></a></p>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Nhận xét (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$product_detail->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>Không có nhận xét</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>

						<div class="row">
							@foreach($relative_product as $relative_pr)
							<div class="col-sm-4">
								<div class="single-item">
								@if($relative_pr->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
									<div class="single-item-header">
										<a href="{{route('chitiet_sanpham',$relative_pr->id)}}"><img src="source/image/product/{{$relative_pr->image}}" alt="" height="150px"></a>
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
										@if(Auth::check())
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$relative_pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
										@else
											<a class="add-to-cart pull-left" href="{{route('chitiet_sanpham',$relative_pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
										@endif
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$relative_pr->id)}}">Details <i class="fa fa-chevron-right"></i></a>
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
						<h3 class="widget-title">Sản phẩm mới cập nhật</h3>
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