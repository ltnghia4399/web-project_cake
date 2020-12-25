@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h4 class="inner-title">Game khuyến mãi</h4>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
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
							<h4>Game đang khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($sale_product)}} sản phảm hiện có</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sale_product as $sale_pr)
								<div class="col-sm-4">
									<div class="single-item">
									@if($sale_pr->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$sale_pr->id)}}"><img src="source/image/product/{{$sale_pr->image}}" alt="" height="100px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title" style="text-overflow:ellipsis; white-space:nowrap; overflow:hidden;">{{$sale_pr->name}}</p>
											<p class="single-item-price">
											@if($sale_pr->promotion_price == 0)
												<br>
												<span class="flash-sale">{{number_format($sale_pr->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($sale_pr->unit_price)}} VND</span>
												<br>
												<span class="flash-sale">{{number_format($sale_pr->promotion_price)}} VND</span>
											@endif
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
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection