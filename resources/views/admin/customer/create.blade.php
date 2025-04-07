@extends("layouts.backoffice.admin.main-admin")

@section('title')
New Customer
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
                    <h1 class="fs-2 mb-2">New Customer</h1>
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
                    <form class="vstack gap-4" action="{{ route('admin.customers.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Owner Detail START -->
                        <div class="card shadow">
                            <!-- Card header -->
                            <div class="card-header border-bottom">
                                <h5 class="mb-0"> Customer Detail</h5>
                            </div>

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Owner name -->
                                    <div class="col-12">
                                            <label class="form-label">Nom</label>
                                        <div class="input-group">
                                            <input type="text" required name="name" class="form-control" placeholder="Entrer le nom de l'Hotel">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" type="email" required placeholder="Entrer l'email">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Telephone</label>
                                        <input class="form-control" name="phone" required type="number" placeholder="Enter your phone number" >
                                    </div>
                                    <!-- Contact number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Mot de passe</label>
                                        <input class="form-control" name="password" type="password" required placeholder="Entrer le mot de passe">
                                    </div>

                                   

                                    <!-- City -->

                                </div>
                            </div>
                        </div>
                        <!-- Owner Detail END -->

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
