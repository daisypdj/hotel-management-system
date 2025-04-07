@extends("layouts.backoffice.admin.main-admin")

@section('title')
Liste des clients
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/dropzone/css/dropzone.css') }}">
@section('content')

<main>
@session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

@session('danger')
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
@endsession
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
               
                <!-- Search and select END -->

                <!-- Table head -->
                <div class="bg-light rounded p-3 d-none d-lg-block">
                    <div class="row row-cols-7 g-4">
                        <div class="col"><h6 class="mb-0">Nom</h6></div>
                        <div class="col"><h6 class="mb-0">Email</h6></div>
                        <div class="col"><h6 class="mb-0">Telephone</h6></div>
                        <div class="col"><h6 class="mb-0">Action</h6></div>
                    </div>
                </div>

                @foreach ($customers as $customer)
                <div class="row row-cols-xl-7 align-items-lg-center border-bottom g-4 px-2 py-4">
                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Nom:</small>
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->

                            <!-- Info -->
                            <div class="ms-2">
                                <h6 class="mb-0 fw-light">{{ $customer->name }}</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Email:</small>
                        <h6 class="mb-0 fw-normal">{{ $customer->email }}</h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Telephone:</small>
                        <h6 class="mb-0 fw-normal">{{ $customer->phone }}</h6>
                    </div>

                  

                    <!-- Data item -->
                   

                    <!-- Data item -->
                  

                    <!-- Data item -->
                    <div class="col">
                        <form method="POST" action="{{ route('admin.customers.destroy',$customer->id) }}" onsubmit="return confirm('Etes vous sur?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger mb-0"><i class="bi bi-trash"></i>Delete</button>
                        </form>
                    </div>
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
