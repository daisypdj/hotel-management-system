@extends("layouts.backoffice.admin.main-admin")

@section('title')
Nouvelle réceptionniste
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
                    <h1 class="fs-2 mb-2">Nouvelle réceptionniste</h1>
                    <p class="text-muted">Ce compte pourra scanner les QR codes de paiement à la réception.</p>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="vstack gap-4" action="{{ route('admin.receptionnistes.store') }}" method="post">
                        @csrf
                        <div class="card shadow">
                            <div class="card-header border-bottom">
                                <h5 class="mb-0">Informations de la réceptionniste</h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Nom</label>
                                        <input type="text" required name="name" value="{{ old('name') }}" class="form-control" placeholder="Entrer le nom">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" type="email" required value="{{ old('email') }}" placeholder="Entrer l'email">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Téléphone</label>
                                        <input class="form-control" name="phone" required type="number" value="{{ old('phone') }}" placeholder="Entrer le numéro de téléphone">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Mot de passe</label>
                                        <input class="form-control" name="password" type="password" required placeholder="Entrer le mot de passe">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary mb-0"><i class="bi bi-plus-lg me-1"></i>Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main content END -->

</main>
@endsection
