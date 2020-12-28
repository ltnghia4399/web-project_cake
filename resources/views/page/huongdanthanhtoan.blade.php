@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Hướng dẫn thanh toán</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Hướng dẫn thanh toán</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">Phương thức thanh toán</h2>
				<div class="space35">&nbsp;</div>

				<div class="history-slider">
					<div class="history-navigation" style="text-align:center;">
						<a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center" style="font-size:15px; text-align:center;">Giao dịch trực tiếp</span></a>
						<a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center" style="font-size:15px; text-align:center;">Thanh toán Momo</span></a>
						<a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center" style="font-size:15px; text-align:center;">Chuyển khoản Sacombank</span></a>
					</div>

					<div class="history-slides">
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/image/payment/1.jpg" alt="" style="width:470px; height:320px;">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Giao dịch trực tiếp.</h5>
								<p>
									Khu II, Đại học Cần Thơ,<br />
									Ninh Kiều, CT<br />
									Cần Thơ
								</p>
								<div class="space20">&nbsp;</div>
								<p>Mua hàng tại các đại lí của CT313H trên khắp cả nước Việt Nam</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
							<img src="source/image/payment/2.jpg" alt="" style="width:470px; height:320px;">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Thanh toán Momo</h5>
								<p>
									+84 123 45 678,<br />
								</p>
								<div class="space20">&nbsp;</div>
								<p>Thanh toán nhanh chóng trực tiếp thông qua ứng dụng Momo.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
							<img src="source/image/payment/3.png" alt="" style="width:470px; height:320px;">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Chuyển khoản qua ngân hàng Sacombank</h5>
								<p>
									Lại Trung Nghĩa,<br />
									Số tài khoản 070113075552<br />
									Sacombank, Cần Thơ
								</p>
								<div class="space20">&nbsp;</div>
								<p>Thanh toán bằng phương thức chuyển khoản qua ngân hàng Sacombank. Sau đó chụp biên lai để xác nhận giao dịch</p>
							</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection