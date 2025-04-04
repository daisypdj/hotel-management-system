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
Title and Tabs START -->
<section class="pt-0 pb-4">
	<div class="container position-relative">

		<!-- Title and button START -->
		<div class="row">
			<div class="col-12">
				<!-- Meta START -->
				<div class="d-flex justify-content-between">
          <!-- Filter collapse button -->
          <input type="checkbox" class="btn-check" id="btn-check-soft">
          <label class="btn btn-primary-soft btn-primary-check mb-0" for="btn-check-soft" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-controls="collapseFilter">
            <i class="bi fa-fe bi-sliders me-2"></i>Show Filters
          </label>

          <!-- tabs -->
          <ul class="nav nav-pills nav-pills-dark" id="tour-pills-tab" role="tablist">
            <!-- Tab item -->
            <li class="nav-item">
              <a class="nav-link rounded-start rounded-0 mb-0" href="hotel-list.html.htm"><i class="bi fa-fw bi-list-ul"></i></a>
            </li>
            <!-- Tab item -->
            <li class="nav-item">
              <a class="nav-link rounded-end rounded-0 mb-0 active" href="hotel-grid.html.htm"><i class="bi fa-fw bi-grid-fill"></i></a>
            </li>
          </ul>
				</div>
				<!-- Meta END -->
			</div>
		</div>
		<!-- Title and button END -->

		<!-- Collapse body START -->
		<div class="collapse" id="collapseFilter">
			<div class="card card-body bg-light p-4 mt-4 z-index-9">

				<!-- Form START -->
				<form class="row g-4">
					<!-- Input item -->
					<div class="col-md-6 col-lg-4">
						<div class="form-control-borderless">
							<label class="form-label">Enter Hotel Name</label>
							<input type="text" class="form-control form-control-lg">
						</div>
					</div>

					<!-- nouislider item -->
					<div class="col-md-6 col-lg-4">
						<div class="form-control-borderless">
							<label class="form-label">Price Range</label>
							<div class="position-relative">
								<div class="noui-wrapper">
									<div class="d-flex justify-content-between">
										<input type="text" class="text-body input-with-range-min">
										<input type="text" class="text-body input-with-range-max">
									</div>
									<div class="noui-slider-range mt-2" data-range-min='500' data-range-max='2000' data-range-selected-min='700' data-range-selected-max='1500'></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Select item -->
					<div class="col-md-6 col-lg-4">
						<div class="form-size-lg form-control-borderless">
							<label class="form-label">Popular Filters</label>
							<select class="form-select js-choice border-0">
								<option value="">Select Option</option>
								<option>Recently search</option>
								<option>Most popular</option>
								<option>Top rated</option>
							</select>
						</div>
					</div>

					<!-- Customer rating -->
					<div class="col-md-6 col-lg-4">
						<div class="form-control-borderless">
							<label class="form-label">Customer Rating</label>
							<ul class="list-inline mb-0 g-3">
								<!-- 1 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-1">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-1">3+</label>
								</li>
								<!-- 2 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-2">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-2">3.5+</label>
								</li>
								<!-- 3 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-3">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-3">4+</label>
								</li>
								<!-- 4 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-4">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-4">4.5+</label>
								</li>
							</ul>
						</div>	
					</div>

					<!-- Star rating -->
					<div class="col-md-6 col-lg-4">
						<div class="form-control-borderless">
							<label class="form-label">Star Rating</label>
							<ul class="list-inline mb-0 g-3">
								<!-- 1 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-9">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-9">1<i class="bi bi-star-fill"></i></label>
								</li>
								<!-- 2 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-10">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-10">2<i class="bi bi-star-fill"></i></label>
								</li>
								<!-- 3 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-11">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-11">3<i class="bi bi-star-fill"></i></label>
								</li>
								<!-- 4 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-12">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-12">4<i class="bi bi-star-fill"></i></label>
								</li>
								<!-- 4 -->
								<li class="list-inline-item">
									<input type="checkbox" class="btn-check" id="btn-check-13">
									<label class="btn btn-white btn-primary-soft-check" for="btn-check-13">5<i class="bi bi-star-fill"></i></label>
								</li>
							</ul>
						</div>	
					</div>

					<!-- Select item -->
					<div class="col-md-6 col-lg-4">
						<div class="form-size-lg form-control-borderless">
							<label class="form-label">Hotel Type</label>
							<select class="form-select js-choice border-0">
								<option value="">Select Option</option>
								<option>Free Cancellation Available</option>
								<option>Pay At Hotel Available</option>
								<option>Free Breakfast Included</option>
							</select>
						</div>
					</div>

					<!-- Check box item -->
					<div class="col-12">
						<div class="form-control-borderless">
							<label class="form-label">Amenities</label>
							<div class="row g-3">
								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
										<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault">
											Air Conditioning
										</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
										<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault2">
											Room Services
										</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault3">
												Dining
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault4">
												Caretaker
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault5">
												Free Internet
											</label>
									</div>
								</div>
								
								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault6">
												Business Service
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault7">
												Bonfire
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault8">
												Mask
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault9">
												Spa
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault10">
												Swimming pool
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault11">
												Fitness Centre 
											</label>
									</div>
								</div>

								<!-- checkbox -->
								<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault12">
											<label class="form-check-label h6 fw-light mb-0" for="flexCheckDefault12">
												Bar 
											</label>
									</div>
								</div>
							</div> <!-- Row END -->
						</div>
					</div>

					<!-- Button -->
					<div class="text-end align-items-center">
						<button class="btn btn-link p-0 mb-0">Clear all</button>
						<button class="btn btn-dark mb-0 ms-3">Apply filter</button>
					</div>
				</form>
				<!-- Form END -->
			</div>
		</div>
		<!-- Collapse body END -->

	</div>
</section>
<!-- =======================
Title and Tabs END -->

<!-- =======================
Hotel grid START -->
<section class="pt-0">
	<div class="container">
		<div class="row g-4">

			<!-- Card item START -->
			@foreach ($hotels as $hotel)
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
			@endforeach
			<!-- Card item END -->

			<!-- Card item START -->
			<div class="col-md-6 col-xl-4">
				<div class="card shadow p-2 pb-0 h-100">
					<!-- Image -->
					<img src="assets/images/category/hotel/4by3/10.jpg" class="rounded-2" alt="Card image">

					<!-- Card body START -->
					<div class="card-body px-3 pb-0">
						<!-- Rating and cart -->
						<div class="d-flex justify-content-between mb-3">
							<a href="#" class="badge bg-dark text-white"><i class="bi fa-fw bi-star-fill me-2 text-warning"></i>4.0</a>
							<a href="#" class="h6 mb-0 z-index-2"><i class="bi fa-fw bi-bookmark"></i></a>
						</div>

						<!-- Title -->
						<h5 class="card-title"><a href="hotel-detail.html.htm">Courtyard by Marriott New York </a></h5>

						<!-- List -->
						<ul class="nav nav-divider mb-2 mb-sm-3">
							<li class="nav-item">Air Conditioning</li>
							<li class="nav-item">Wifi</li>
							<li class="nav-item">Pool</li>
							<li class="nav-item">More+</li>
						</ul>
					</div>
<!-- =======================
Hotel list END -->

</main>
@endsection

