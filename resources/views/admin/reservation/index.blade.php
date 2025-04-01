@extends("layouts.backoffice.admin.main-admin")

@section('title')
Liste des reservations
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/dropzone/css/dropzone.css') }}">
@section('content')

<main>

    <!-- Widget START -->
    <div class="row g-4">



        <div class="card shadow mt-5">
            <!-- Card header START -->
            <div class="card-header border-bottom">
                <h5 class="card-header-title">Reservations</h5>
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body">
                <!-- Search and select START -->
                <div class="row g-3 align-items-center justify-content-between mb-3">
                    <!-- Search -->
                    <div class="col-md-8">
                        <form class="rounded position-relative">
                            <input class="form-control pe-5" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn border-0 px-3 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6"></i></button>
                        </form>
                    </div>

                    <!-- Select option -->
                    <div class="col-md-3">
                        <!-- Short by filter -->
                        <form>
                            <select class="form-select js-choice" aria-label=".form-select-sm">
                                <option value="">Sort by</option>
                                <option>Free</option>
                                <option>Newest</option>
                                <option>Oldest</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- Search and select END -->

                <!-- Table head -->
                <div class="bg-light rounded p-3 d-none d-lg-block">
                    <div class="row row-cols-7 g-4">
                        <div class="col"><h6 class="mb-0">Reserver par</h6></div>
                        <div class="col"><h6 class="mb-0">De</h6></div>
                        <div class="col"><h6 class="mb-0">Au</h6></div>
                        <div class="col"><h6 class="mb-0">Hotel</h6></div>
                        <div class="col"><h6 class="mb-0">Prix</h6></div>
                        <div class="col"><h6 class="mb-0">Numero Chambre</h6></div>
                        <div class="col"><h6 class="mb-0">Action</h6></div>
                    </div>
                </div>

                @foreach ($reservations as $reservation)
                <div class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4">
                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Reserver par:</small>
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->

                            <!-- Info -->
                            <div class="ms-2">
                                <h6 class="mb-0 fw-light">{{ $reservation->name }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">De:</small>
                        <h6 class="mb-0 fw-normal">{{ $reservation->check_in }}</h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Au:</small>
                        <h6 class="mb-0 fw-normal">{{ $reservation->check_out }}</h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Hotel:</small>
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs flex-shrink-0">
                                <img class="avatar-img rounded-circle" src="{{ asset($reservation->Room_profile) }}" alt="avatar">
                            </div>
                            <!-- Info -->
                            <div class="ms-2">
                                <h6 class="mb-0 fw-light">{{ $reservation->hotel_name }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Prix:</small>
                        <h6 class="text-success mb-0">{{ $reservation->total_price }} XAF</h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Numero Chambre:</small>
                        <div class="badge bg-success bg-opacity-10 text-success">{{ $reservation->room_id }}</div>
                    </div>

                    <!-- Data item -->
                    <div class="col"><a href="#" class="btn btn-sm btn-light mb-0">View</a></div>
                </div>
                @endforeach
                <!-- Table data -->






            </div>
            <!-- Card body END -->

            <!-- Card footer START -->

            <!-- Card footer END -->
        </div>
        <!-- Rooms END -->

        <!-- Upcoming Arrival START -->

        <!-- Reviews END -->
    </div>
    <!-- Widget END -->
</main>
@endsection
