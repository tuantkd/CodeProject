@extends('Customer.master')
@section('title', 'Xem thông tin')
@section('noidung_tailieu')


	<div class="panel panel-info">
		<div class="panel-heading">
			<h2 class="panel-title">THÔNG TIN</h2>
		</div>
		<div class="panel-body">
			@if(isset($infos))
				@foreach($infos as $value)
					{!! $value->content !!}
				@endforeach
			@endif
		</div>
	</div>

	<style></style>

 
@endsection