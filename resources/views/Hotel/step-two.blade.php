@extends('layouts.frontoffice.main')

@section('title')
liste des Chambres
@endsection

@section('content')
<main>

    <!-- =======================
    Main Banner START -->
    <section class="pt-0">
        <div class="container">
            <!-- Background image -->
            <div class="rounded-3 p-3 p-sm-5" style="background-image: url(assets/images/bg/05.jpg); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                <!-- Banner title -->
                <div class="row my-2 my-xl-5">
                    <div class="col-md-8 mx-auto">
                        <h1 class="text-center text-white">

                        @if($rooms->count() > 0)
                            {{ $rooms->count() }} Chambres disponibles
                        @else
                            Aucune chambre disponible
                        @endif
                        </h1>
                    </div>
                </div>

               
                <!-- Booking from END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Main Banner END -->


    <!-- =======================
    Title and Tabs END -->

    <!-- =======================
    Hotel grid START -->
    <section class="pt-0">
        <div class="container">
            <div class="row g-4">

                @forelse ($rooms as $room)
                    <!-- Card item START -->
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
                                    <div><img style="width: 100%; height: 200px;" src="{{ asset($room->Room_profile) }}" alt="Card image"></div>


                                </div>
                            </div>
                            <!-- Slider END -->

                            <!-- Card body START -->
                            <div class="card-body px-3 pb-0">
                                <!-- Rating and cart -->
                                <div class="d-flex justify-content-between mb-3">
                                    <a href="#" class="badge bg-dark text-white"><i class="bi fa-fw bi-star-fill me-2 text-warning"></i>4.5</a>
                                    <a href="#" class="h6 mb-0 z-index-2"><i class="bi fa-fw bi-bookmark"></i></a>
                                </div>

                                <!-- Title -->
                                <h5 class="card-title"><a href="hotel-detail.html.htm">Chambre numero {{ $room->id }}</a></h5>

                                <!-- List -->
                                
                            </div>
                            <!-- Card body END -->

                            <!-- Card footer START-->
                            <div class="card-footer pt-0">
                                <!-- Price and Button -->
                                <div class="d-sm-flex justify-content-sm-between align-items-center">
                                    <!-- Price -->
                                    <div class="d-flex align-items-center">
                                        <h6 class="fw-normal text-success mb-0 me-1">{{ $room->price }} XAF</h6>
                                        <span class="mb-0 me-2">/day</span>

                                    </div>
                                    <!-- Button -->

                                    <div class="mt-2 mt-sm-0">
                                        <a href="{{ route('step-three',$room->id) }}" class="btn btn-sm btn-primary-soft mb-0 w-100">Book now<i class="bi bi-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card item END -->
                @empty
                    Aucune chambre disponible
                @endforelse



        </div>
    </section>
    <!-- =======================
    Hotel grid END -->

    </main>
@endsection