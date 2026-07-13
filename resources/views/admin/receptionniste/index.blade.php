@extends("layouts.backoffice.admin.main-admin")

@section('title')
Liste des réceptionnistes
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
            <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-header-title mb-0">Réceptionnistes</h5>
                <a href="{{ route('admin.receptionnistes.create') }}" class="btn btn-sm btn-primary mb-0">
                    <i class="bi bi-plus-lg me-1"></i>Créer une réceptionniste
                </a>
            </div>
            <!-- Card header END -->

            <!-- Card body START -->
            <div class="card-body">
                <!-- Table head -->
                <div class="bg-light rounded p-3 d-none d-lg-block">
                    <div class="row row-cols-4 g-4">
                        <div class="col"><h6 class="mb-0">Nom</h6></div>
                        <div class="col"><h6 class="mb-0">Email</h6></div>
                        <div class="col"><h6 class="mb-0">Téléphone</h6></div>
                        <div class="col"><h6 class="mb-0">Action</h6></div>
                    </div>
                </div>

                @forelse ($receptionnistes as $receptionniste)
                <div class="row row-cols-xl-4 align-items-lg-center border-bottom g-4 px-2 py-4">
                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Nom:</small>
                        <div class="d-flex align-items-center">
                            <div class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle me-2">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <h6 class="mb-0 fw-light">{{ $receptionniste->name }}</h6>
                        </div>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Email:</small>
                        <h6 class="mb-0 fw-normal">{{ $receptionniste->email }}</h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <small class="d-block d-lg-none">Téléphone:</small>
                        <h6 class="mb-0 fw-normal">{{ $receptionniste->phone }}</h6>
                    </div>

                    <!-- Data item -->
                    <div class="col">
                        <form method="POST" action="{{ route('admin.receptionnistes.destroy',$receptionniste->id) }}" onsubmit="return confirm('Êtes-vous sûr ?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger mb-0"><i class="bi bi-trash"></i> Supprimer</button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-muted mt-3">Aucune réceptionniste enregistrée pour le moment.</p>
                @endforelse
            </div>
            <!-- Card body END -->
        </div>
    </div>
    <!-- Widget END -->
</main>

@endsection
