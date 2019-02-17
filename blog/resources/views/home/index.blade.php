@extends('layouts.home')
@section('content')

		<div id="fh5co-main">
			<aside id="fh5co-hero" class="js-fullheight">
				<div class="flexslider js-fullheight">
					<ul class="slides">
						<li style="background-image: url({{asset('resources/views/home/style/images/img_bg_1.jpg')}});">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
										<div class="slider-text-inner">
											<h1>Welcome PengJK Blog</h1>
											<p><a class="btn btn-primary btn-learn" href="#">Learn More<i class="icon-arrow-right3"></i></a></p>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li style="background-image: url({{asset('resources/views/home/style/images/img_bg_2.jpg')}});">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
										<div class="slider-text-inner">
											<h1>Welcome PengJK Blog</h1>
											<p><a class="btn btn-primary btn-learn" href="#">Learn More<i class="icon-arrow-right3"></i></a></p>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li style="background-image: url({{asset('resources/views/home/style/images/img_bg_3.jpg')}});">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
										<div class="slider-text-inner">
											<h1>Welcome PengJK Blog</h1>
											<p><a class="btn btn-primary btn-learn" href="#">Learn More<i class="icon-arrow-right3"></i></a></p>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
			  	</div>
			</aside>


			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">最新推荐</h2>
				<div class="row row-bottom-padded-md">

					@foreach($data as $d)

						<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<a href="{{url('art/'.$d->art_id)}}" class="blog-img"><img src="{{url($d->art_thumb)}}" class="img-responsive" alt="" style="width: 286px;height: 160px;"></a>
								<div class="desc">
									<h3><a href="{{url('art/'.$d->art_id)}}">{{$d->art_title}}</a></h3>
									<span><small> {{$d->art_editor}} </small> / <small> {{date('Y-m-d',$d->art_time)}} </small> / <small> {{$d->art_view}} </small></span>

									<a href="{{url('art/'.$d->art_id)}}" class="lead">阅读全文<i class="icon-arrow-right3"></i></a>
								</div>
							</div>
						</div>

					@endforeach


				</div>
			</div>
@endsection

	
