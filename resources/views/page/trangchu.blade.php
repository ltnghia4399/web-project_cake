@extends('master')
@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
								@foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
													</div>
												</div>

						        </li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					
					<div class="col-sm-3">
							<ul class="aside-menu">
								@foreach($product as $pr)
									<li><a href="{{route('loai_sanpham',$pr->id)}}">{{$pr->name}}</a></li>
								@endforeach
							</ul>
					</div>

					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Game mới cập nhật</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{$new_product->total()}} sản phẩm hiện có</p>
								<a class="pull-right" href="{{route('gamemoi')}}">Xem tất cả</a>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $new_pr)
								<div class="col-sm-3">
									<div class="single-item">
									@if($new_pr->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$new_pr->id)}}"><img src="source/image/product/{{$new_pr->image}}" alt="" height="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;">{{$new_pr->name}}</p>
											<p class="single-item-price">
											@if($new_pr->promotion_price == 0)
												<br>
												<span class="flash-sale">{{number_format($new_pr->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($new_pr->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($new_pr->promotion_price)}} VND</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$new_pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@else
												<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$new_pr->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
								@endforeach
							</div>
							<div class="row">
								<div class="col-12 text-center">
									{{$new_product->links()}}
								</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Game khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{$sale_product->total()}} sản phẩm hiện có</p>
								<a class="pull-right" href="{{route('gamekhuyenmai')}}">Xem tất cả</a>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sale_product as $sale_pr)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$sale_pr->id)}}"><img src="source/image/product/{{$sale_pr->image}}" alt="" height="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;">{{$sale_pr->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{number_format($sale_pr->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($sale_pr->promotion_price)}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$sale_pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@else
												<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$sale_pr->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
								
							@endforeach
							</div>
							<div class="row">
								<div class="col-12 text-center">
									{{$sale_product->links()}}
								</div>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Game giá tốt</h4>
							<hr style="height:1px;border-width:0;color:gray;background-color:gray;">
							<h6>Dưới 100.000đ</h6>
							<div class="beta-products-details">
							<p class="pull-left">{{$below_100->total()}} sản phẩm hiện có</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($below_100 as $bl_100)
								<div class="col-sm-3">
									<div class="single-item">
										@if($bl_100->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$bl_100->id)}}"><img src="source/image/product/{{$bl_100->image}}" alt="" height="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;">{{$bl_100->name}}</p>
											<p class="single-item-price">
											@if($bl_100->promotion_price == 0)
												<br>
												<span class="flash-sale">{{number_format($bl_100->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($bl_100->unit_price)}} VND</span>
												<br>
												<span class="flash-sale">{{number_format($bl_100->promotion_price)}} VND</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$bl_100->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@else
												<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$bl_100->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
								
							@endforeach
							</div>
							<div class="row">
								<div class="col-12 text-center">
									{{$below_100->links()}}
								</div>
							</div>

							<hr style="height:1px;border-width:0;color:gray;background-color:gray;">
							<h6>Dưới 200.000đ</h6>
							<div class="beta-products-details">
							<p class="pull-left">{{$below_200->total()}} sản phẩm hiện có</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($below_200 as $bl_200)
								<div class="col-sm-3">
									<div class="single-item">
										@if($bl_200->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$bl_200->id)}}"><img src="source/image/product/{{$bl_200->image}}" alt="" height="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;">{{$bl_200->name}}</p>
											<p class="single-item-price">
											@if($bl_200->promotion_price == 0)
												<br>
												<span class="flash-sale">{{number_format($bl_200->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($bl_200->unit_price)}} VND</span>
												<br>
												<span class="flash-sale">{{number_format($bl_200->promotion_price)}} VND</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$bl_200->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@else
												<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$bl_200->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
								
							@endforeach
							</div>
							<div class="row">
								<div class="col-12 text-center">
									{{$below_200->links()}}
								</div>
							</div>

							<hr style="height:1px;border-width:0;color:gray;background-color:gray;">
							<h6>Dưới 250.000đ</h6>
							<div class="beta-products-details">
							<p class="pull-left">{{$below_250->total()}} sản phẩm hiện có</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($below_250 as $bl_250)
								<div class="col-sm-3">
									<div class="single-item">
										@if($bl_250->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$bl_250->id)}}"><img src="source/image/product/{{$bl_250->image}}" alt="" height="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;">{{$bl_250->name}}</p>
											<p class="single-item-price">
											@if($bl_250->promotion_price == 0)
												<br>
												<span class="flash-sale">{{number_format($bl_250->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($bl_250->unit_price)}} VND</span>
												<br>
												<span class="flash-sale">{{number_format($bl_250->promotion_price)}} VND</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$bl_250->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@else
												<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$bl_250->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="space40">&nbsp;</div>
								</div>
								
							@endforeach
							</div>
							<div class="row">
								<div class="col-12 text-center">
									{{$below_250->links()}}
								</div>
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->
    @endsection