@extends("layouts.backoffice.admin.main-admin")

@section('title')
Ajouter un Hotel
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
    <!-- =======================
    Page Banner START -->
    <section class="pt-4 pt-md-5 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto text-center">
                    <h1 class="fs-2 mb-2">New Hotel</h1>
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
                    <form class="vstack gap-4" action="{{ route('admin.hotels.store') }}" method="post" enctype="multipart/form-data">
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
                                        <label class="form-label">Hotel Name</label>
                                        <div class="input-group">
                                            <input type="text" required name="hotel_name" class="form-control" placeholder="Enter the hotel name">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="hotel_description" required placeholder="Enter the hotel description"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Localisation</label>
                                        <select name="hotel_town" class="form-select js-choice">
                                            <option value="Douala">Douala</option>
                                            <option value="Yaoundé">Yaoundé</option>
                                            <option value="Bafoussam">Bafoussam</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Star Number</label>
                                        <input class="form-control" name="star_number" required type="number" placeholder="" max="5" min="1" >
                                    </div>
                                    <!-- Contact number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Contact</label>
                                        <input class="form-control" name="hotel_phone" type="text" required placeholder="Enter the phone number">
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" type="email" required placeholder="Enter the email">
                                    </div>

                                    <!-- Address -->
                                    <div class="col-12">
                                        <label class="form-label">Manager Name</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Enter the manager name">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Hotel Password</label>
                                        <input type="password" name="password" class="form-control" required placeholder="Enter the password">
                                    </div>

                                    <!-- City -->

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
                                        <label class="form-label">Hotel Image *</label>
                                        <div class="dropzone dropzone-custom" data-dropzone='{"maxFiles": 5, "addRemoveLinks": false}'>
                                            <div class="dz-message needsclick">


                                            </div>
                                            <input type="file" name="hotel_profile" required>
                                        </div>
                                        <p class="small mb-0 mt-2"><b>Note:</b>Only JPG, JPEG and PNG. The suggested dimensions are 600px * 450px. The largest image will be cropped to 4:3 format to fit our thumbnails/presentations.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Cab Detail END -->

                        <!-- Driver Detail START -->

                        <!-- Driver Detail END -->

                        <!-- Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary mb-0">Ajouter</button>
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
