@extends('master')
@section('content')
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tim Kiem</h4>
							<div class="beta-products-details">
								<p class="pull-left">{{count($product)}} styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $pr)
								<div class="col-sm-3">
									<div class="single-item">
									@if($pr->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$pr->id)}}"><img src="source/image/product/{{$pr->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pr->name}}</p>
											<p class="single-item-price">
											@if($pr->promotion_price == 0)
												<span class="flash-sale">{{number_format($pr->unit_price)}} VND</span>
											@else
												<span class="flash-del">{{number_format($pr->unit_price)}} VND</span>
												<span class="flash-sale">{{number_format($pr->promotion_price)}} VND</span>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$pr->id)}}">Detail<i class="fa fa-chevron-right"></i></a>
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