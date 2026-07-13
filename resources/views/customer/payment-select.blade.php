<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Paiement de la réservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <style>
        .payment-hero{
            background: linear-gradient(135deg,#0d6efd 0%,#0dcaf0 100%);
            border-radius: 1rem;
            color: #fff;
        }
        .step-pill{
            display:flex; align-items:center; gap:.5rem;
            font-size:.85rem; opacity:.85;
        }
        .step-pill .num{
            width:22px;height:22px;border-radius:50%;
            background:rgba(255,255,255,.25);
            display:inline-flex;align-items:center;justify-content:center;
            font-weight:600;font-size:.75rem;
        }
        .step-pill.active{opacity:1;}
        .method-card{
            border:2px solid #e9ecef; border-radius:.9rem; cursor:pointer;
            transition:all .15s ease-in-out; height:100%;
        }
        .method-card:hover{ border-color:#0d6efd; transform:translateY(-2px); box-shadow:0 .5rem 1rem rgba(0,0,0,.08); }
        .method-card.selected{ border-color:#0d6efd; background:#f0f7ff; box-shadow:0 .5rem 1rem rgba(13,110,253,.15); }
        .method-card input{ position:absolute; opacity:0; }
        .method-icon{
            width:48px;height:48px;border-radius:.6rem;
            display:flex;align-items:center;justify-content:center;
            font-size:1.4rem; color:#fff;
        }
        .summary-card{ border-radius:1rem; border:1px solid #e9ecef; position:sticky; top:1rem; }
    </style>
</head>
<body>
<main>
<section class="pt-4 pb-5">
    <div class="container">

        <!-- Hero / stepper -->
        <div class="payment-hero p-4 mb-4">
            <h1 class="fs-4 mb-1"><i class="bi bi-credit-card-2-front me-2"></i>Finaliser votre réservation</h1>
            <p class="mb-3 opacity-75">Choisissez comment vous souhaitez régler votre séjour.</p>
            <div class="d-flex flex-wrap gap-4">
                <div class="step-pill"><span class="num">✓</span> Réservation créée</div>
                <div class="step-pill active"><span class="num">2</span> Paiement</div>
                <div class="step-pill"><span class="num">3</span> QR code</div>
                <div class="step-pill"><span class="num">4</span> Validation à la réception</div>
            </div>
        </div>

        @if(session('payment_error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('payment_error') }}
            </div>
        @endif

        <div class="row g-4">
            <!-- Payment methods -->
            <div class="col-lg-8">
                <form method="POST" action="{{ route('customer.payment.process', $reservation->id) }}" id="paymentForm">
                    @csrf

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="method-card p-3 d-block">
                                <input type="radio" name="method" value="orange_money" required>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="method-icon" style="background:#ff7900;"><i class="bi bi-phone"></i></div>
                                    <div>
                                        <h6 class="mb-0">Orange Money</h6>
                                        <small class="text-muted">Paiement mobile</small>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="method-card p-3 d-block">
                                <input type="radio" name="method" value="mtn_money" required>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="method-icon" style="background:#ffcc00;color:#212529;"><i class="bi bi-phone"></i></div>
                                    <div>
                                        <h6 class="mb-0">MTN Mobile Money</h6>
                                        <small class="text-muted">Paiement mobile</small>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="method-card p-3 d-block">
                                <input type="radio" name="method" value="carte" required>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="method-icon" style="background:#0d6efd;"><i class="bi bi-credit-card"></i></div>
                                    <div>
                                        <h6 class="mb-0">Carte bancaire</h6>
                                        <small class="text-muted">Visa / Mastercard</small>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <label class="method-card p-3 d-block">
                                <input type="radio" name="method" value="especes" required>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="method-icon" style="background:#198754;"><i class="bi bi-cash-coin"></i></div>
                                    <div>
                                        <h6 class="mb-0">Espèces</h6>
                                        <small class="text-muted">Paiement à la réception</small>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3" id="phoneWrapper" style="display:none;">
                        <label class="form-label">Numéro de téléphone à débiter</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Ex: 6XX XXX XXX">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-lock-fill me-2"></i>Payer {{ number_format($reservation->total_price,0,',',' ') }} XAF
                    </button>
                </form>
            </div>

            <!-- Order summary -->
            <div class="col-lg-4">
                <div class="summary-card p-4">
                    <h5 class="mb-3">Récapitulatif</h5>
                    <ul class="list-group list-group-borderless">
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span><i class="bi bi-building me-1"></i>Hôtel</span>
                            <span class="fw-semibold">{{ $hotel->hotel_name ?? '—' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span><i class="bi bi-calendar-check me-1"></i>Arrivée</span>
                            <span class="fw-semibold">{{ $reservation->check_in }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span><i class="bi bi-calendar-x me-1"></i>Départ</span>
                            <span class="fw-semibold">{{ $reservation->check_out }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0 border-top pt-3 mt-2">
                            <span class="fs-6">Total à payer</span>
                            <span class="fs-5 text-primary fw-bold">{{ number_format($reservation->total_price,0,',',' ') }} XAF</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<script>
    document.querySelectorAll('.method-card input').forEach(function(radio){
        radio.addEventListener('change', function(){
            document.querySelectorAll('.method-card').forEach(c => c.classList.remove('selected'));
            this.closest('.method-card').classList.add('selected');

            var phoneWrapper = document.getElementById('phoneWrapper');
            if(this.value === 'orange_money' || this.value === 'mtn_money'){
                phoneWrapper.style.display = 'block';
            } else {
                phoneWrapper.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>
