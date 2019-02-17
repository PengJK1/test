@extends('layouts.home')
@section('content')

		<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">全部文章</h2>
				<div class="row row-bottom-padded-md">
					@foreach($data as $d)
						<div class="col-md-3 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
							<div class="blog-entry">
								<a href="{{url('art/'.$d->art_id)}}" class="blog-img"><img src="{{url($d->art_thumb)}}" class="img-responsive" alt="{{$d->art_title}}" style="width: 286px;height: 160px;"></a>
								<div class="desc">
									<h3><a href="{{url('art/'.$d->art_id)}}">{{$d->art_title}}</a></h3>
									<span><small> {{$d->art_editor}} </small> / <small> {{date('Y-m-d',$d->art_time)}} </small> / <small> {{$d->art_view}} </small></span>
									<p></p>
									<a href="{{url('art/'.$d->art_id)}}" class="lead">阅读全文 <i class="icon-arrow-right3"></i></a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<div class="page">
					{{$data->links()}}
				</div>
			</div>
		
		
@endsection
