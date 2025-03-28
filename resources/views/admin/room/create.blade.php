@extends("layouts.backoffice.admin.main-admin")

@section('title')
Ajouter une chambre
@endsection
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/choices/css/choices.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/dropzone/css/dropzone.css') }}">
@section('content')

<main>

    <!-- =======================
    Page Banner START -->
    <section class="pt-4 pt-md-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto text-center">
                    <h1 class="fs-2 mb-2">Nouvelle chambre</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page Banner END -->

    <!-- =======================
    Main content START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <form class="vstack gap-4" action="{{ route('admin.rooms.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Owner Detail START -->
                        <div class="card shadow">
                            <!-- Card header -->
                            <div class="card-header border-bottom">
                                <h5 class="mb-0"> Detail</h5>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Owner name -->
                                    <div class="col-12">
                                        <label class="form-label">Hotel</label>
                                        <select name="hotel" class="form-select js-choice">
                                            @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Room Type</label>
                                        <select name="type" class="form-select js-choice">
                                            @foreach ($room_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Room Price</label>
                                        <input placeholder="Enter the price of the room" type="number" name="price" class="form-control" required>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- Owner Detail END -->

                        <!-- Cab Detail START -->
                        <div class="card shadow">
                            <!-- Card header -->
                            <div class="card-header border-bottom">
                                <h5 class="mb-0">Media</h5>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Car name -->



                                    <!-- Image Gallery -->
                                    <div class="col-12">
                                        <label class="form-label">Room Image*</label>
                                        <div class="dropzone dropzone-custom" data-dropzone='{"maxFiles": 5, "addRemoveLinks": false}'>
                                            <div class="dz-message needsclick">


                                            </div>
                                            <input type="file" name="image" required>
                                        </div>
                                        <p class="small mb-0 mt-2"><b>Note:</b>Only JPG, JPEG and PNG. The suggested dimensions are 600px * 450px. The largest image will be cropped to the 4:3 format to fit our thumbnails/presentations..</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Cab Detail END -->

                        <!-- Driver Detail START -->

                        <!-- Driver Detail END -->

                        <!-- Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary mb-0">Add Room</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main content END -->

    </main>
    <script src="{{ asset('assets/vendor/choices/js/choices.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropzone/js/dropzone.js') }}"></script>
@endsection