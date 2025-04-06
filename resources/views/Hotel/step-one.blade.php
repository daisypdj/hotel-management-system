@extends('layouts.frontoffice.main')

@section('title')
Liste des Hotels
@endsection

@section("content")
<main>

<!-- =======================
================
Main Banner END -->

<!-- Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

<!-- =======================

<!-- =======================
Main Banner END -->
	

<!-- =======================
Title and Tabs END -->

<!-- =======================
Hotel grid START -->
<section class="pt-0">
	<div class="container">
		<div class="row g-4">

			<!-- Card item START -->
			@foreach ($hotels as $hotel)

			@if($hotel->rooms->count() > 0)
			<div class="col-md-6 col-xl-4">
				<div class="card shadow p-2 pb-0 h-100">
					<!-- Overlay item -->
					<div class="position-absolute top-0 start-0 z-index-1 m-4">
						<div class="badge bg-danger text-white">30% Off</div>
					</div>

					<!-- Slider START -->
					<div class="tiny-slider arrow-round arrow-xs arrow-dark rounded-2 overflow-hidden">
						<div class="tiny-slider-inner" data-autoplay="false" data-arrow="true" data-dots="false" data-items="1">
							<!-- Image item -->
							<div><img style="width: 100%; height: 200px;" src="{{ asset($hotel->hotel_profile) }}" alt="Card image"></div>
						</div>
					</div>
					<!-- Slider END -->

					<!-- Card body START -->
					<div class="card-body px-3 pb-0">
						<!-- Rating and cart -->
						<div class="d-flex justify-content-between mb-3">
							<a href="#" class="badge bg-dark text-white"><i class="bi fa-fw bi-star-fill me-2 text-warning"></i>{{ $hotel->star_number}}</a>
							<a href="#" class="h6 mb-0 z-index-2"><i class="bi fa-fw bi-bookmark"></i></a>
						</div>

						<!-- Title -->
						<h5 class="card-title"><a href="hotel-detail.html.htm">{{ $hotel->hotel_name }}</a></h5>

						<!-- List -->
					
					</div>
					<!-- Card body END -->

					<!-- Card footer START-->
					<div class="card-footer pt-0">
						<!-- Price and Button -->
						<div class="d-sm-flex justify-content-sm-between align-items-center">
							<!-- Price -->
							<div class="d-flex align-items-center">
							<small><i class="bi bi-geo-alt me-2"></i>{{ $hotel->hotel_town }}</small>



							
								
							</div>
							<!-- Button -->
							<div class="mt-2 mt-sm-0">
							<a href="{{ route('step-two',$hotel->id ) }}" class="btn btn-sm btn-dark mb-0 w-100">Selectionnez</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
			@endforeach
			<!-- Card item END -->


</main>
@endsection

