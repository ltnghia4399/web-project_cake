<div id="header" style="background-color:#101F37;">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="{{route('lienhe')}}" style="color:white;"><i class="fa fa-home"></i>Khu II, Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ</a></li>
						<li><a href="{{route('gioithieu')}}" style="color:white;"><i class="fa fa-phone"></i> +84 12 345 678</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
							<li><a href="{{route('trangchu')}}" style="color:white;"> <i class="fa fa-user"></i>Chào bạn {{Auth::user()->full_name}}</a></li>
							<li><a href="{{route('dangxuat')}}" style="color:white;">Đăng xuất</a></li>
						@else
							<li><a href="{{route('dangky')}}" style="color:white;">Đăng kí</a></li>
							<li><a href="{{route('dangnhap')}}" style="color:white;"> <i class="fa fa-user"></i>Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<!-- <div class="pull-left">
					<a href="{{route('trangchu')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="100px" alt=""></a>
				</div> -->
				<div class="pull-left">
					<h5 class="location">{{$data['name']}}, {{$data['sys']['country']}}</h5>
					<div class="time">
						<p>{{$day}}</p>
						<p id="time"></p>
						<p>Thời tiết : <img class="location" src="http://openweathermap.org/img/w/{{$data['weather'][0]['icon']}}.png" alt=""></p> 
						<p>Nhiệt độ : 30&deg C</p>
					</div>
				</div>
				<div style="margin-left: 25%;margin-right: auto;width: 60em;">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
					        <input type="text" value="" name="search_key" id="s" placeholder="Nhập từ khóa..."/>
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select" style="color:white;"><i class="fa fa-shopping-cart"></i> Giỏ hàng 
								({{Session('cart')->totalQty}}) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
							@foreach($product_cart as $pr_cart)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoagiohang',$pr_cart['item']['id'])}}"><i class="fa fa-times" ></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$pr_cart['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$pr_cart['item']['name']}}</span>
											@if($pr_cart['item']['promotion_price'] != 0)
												<span class="cart-item-amount">{{$pr_cart['qty']}}*<span>{{number_format($pr_cart['item']['promotion_price'])}} VND</span></span>
											@else
												<span class="cart-item-amount">{{$pr_cart['qty']}}*<span>{{number_format($pr_cart['item']['unit_price'])}} VND</span></span>
											@endif
										</div>
									</div>
								</div>
							@endforeach
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} VND</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@else
						<div class="cart">
							<div class="beta-select"  style="color:white;"><i class="fa fa-shopping-cart"></i> Giỏ hàng 
									(Trống) <i class="fa fa-chevron-down"></i></div>
						</div>
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('trangchu')}}">Danh mục sản phẩm</a>
							<ul class="sub-menu">
							@foreach($product_typeASP as $pr_type)
								<li><a href="{{route('loai_sanpham',$pr_type->id)}}">{{$pr_type->name}}</a></li>
							@endforeach
							</ul>
						</li>
						<li><a href="{{route('huongdanthanhtoan')}}">Hình thức thanh toán</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ hợp tác</a></li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->