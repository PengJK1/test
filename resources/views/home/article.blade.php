@extends('layouts.home')
@section('content')
		<div id="fh5co-main">
			<div class="fh5co-narrow-content">
				<div class="row">
					<div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
						<a href="javascript:history.go(-1)" >返回</a>
					</div>
				</div>
				<div class="row row-bottom-padded-md">
					<div class="row-md-6 animate-box" data-animate-effect="fadeInLeft">
						<h1 class="fh5co-heading" style="text-align:center">{{$field->art_title}}</h1>
						<h1 class="fh5co-heading" style="text-align:center"><span ><small> {{$field->art_editor}} </small> / <small> {{date('Y-m-d',$field->art_time)}} </small> / <small> {{$field->art_view}} </small></span></h1>
						
						<div style="color: #000000">{!!$field->art_content!!}</div>
						<p style="color: #000000;"></p>
					</div>
					<!--
						上一篇

						下一篇
					-->
					<div class="row">
						<div class="row-md-4 animate-box" data-animate-effect="fadeInLeft" style="text-align: center;">
						@if($article['pre'])
							上一篇：<a href="{{url('art/'.$article['pre']->art_id)}}">{{$article['pre']->art_title}}</a>
						@else
							<span>没有上一篇了</span>
						@endif
						<br />
						@if($article['next'])
							下一篇：<a href="{{url('art/'.$article['next']->art_id)}}">{{$article['next']->art_title}}</a>
						@else
							<span>没有下一篇了</span>
						@endif
						</div>
					</div>
					
				</div>
			</div>

	
@endsection

