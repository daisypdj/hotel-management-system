<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Votre QR code de paiement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/font-awesome/css/all.min-1.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons-1.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
        .qr-card{
            border-radius:1.2rem; border:1px solid #e9ecef;
            box-shadow: 0 1rem 3rem rgba(0,0,0,.08);
        }
        #qrcode{ display:inline-block; padding:1rem; background:#fff; border-radius:1rem; border:2px dashed #dee2e6; }
        .pulse-dot{
            width:10px;height:10px;border-radius:50%; background:#ffc107;
            display:inline-block; animation: pulse 1.4s infinite;
        }
        @keyframes pulse{
            0%{ box-shadow:0 0 0 0 rgba(255,193,7,.6); }
            70%{ box-shadow:0 0 0 10px rgba(255,193,7,0); }
            100%{ box-shadow:0 0 0 0 rgba(255,193,7,0); }
        }
        .success-check{
            width:90px;height:90px;border-radius:50%;
            background:#198754;color:#fff;
            display:flex;align-items:center;justify-content:center;
            font-size:2.5rem; margin:0 auto 1rem auto;
            animation: pop .3s ease-out;
        }
        @keyframes pop{ from{ transform:scale(.5); opacity:0; } to{ transform:scale(1); opacity:1; } }
    </style>
</head>
<body class="bg-light">
<main>
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card qr-card p-4 p-md-5 text-center">

                    <!-- WAITING STATE -->
                    <div id="waitingState">
                        <span class="badge bg-warning bg-opacity-25 text-warning-emphasis mb-3">
                            <span class="pulse-dot me-1"></span> En attente de validation
                        </span>
                        <h1 class="fs-4 mb-1">Présentez ce QR code à la réception</h1>
                        <p class="text-muted mb-4">La réceptionniste va le scanner pour confirmer votre paiement.</p>

                        <div id="qrcode"></div>

                        <div class="row justify-content-center text-start mt-4">
                            <div class="col-sm-8">
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <span>Hôtel</span>
                                        <span class="fw-semibold"><?php echo e($hotel->hotel_name ?? '—'); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <span>Réservation N°</span>
                                        <span class="fw-semibold">#<?php echo e($reservation->id); ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between px-0">
                                        <span>Montant payé</span>
                                        <span class="fw-semibold text-success"><?php echo e(number_format($reservation->total_price,0,',',' ')); ?> XAF</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- SUCCESS STATE (hidden by default) -->
                    <div id="successState" class="d-none">
                        <div class="success-check"><i class="bi bi-check-lg"></i></div>
                        <h1 class="fs-4 mb-1">🎉 Paiement validé !</h1>
                        <p class="text-muted mb-4">La réceptionniste a confirmé votre paiement le <span id="validatedAt"></span>.</p>
                        <a href="<?php echo e(route('customer.my-reservations.index')); ?>" class="btn btn-primary">
                            Voir mes réservations
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
</main>

<script>
    new QRCode(document.getElementById("qrcode"), {
        text: "<?php echo e($reservation->qr_token); ?>",
        width: 220,
        height: 220,
    });

    const statusUrl = "<?php echo e(route('customer.payment.status', $reservation->id)); ?>";

    const poll = setInterval(function(){
        fetch(statusUrl)
            .then(r => r.json())
            .then(data => {
                if(data.payment_status === 'valide'){
                    clearInterval(poll);
                    document.getElementById('waitingState').classList.add('d-none');
                    document.getElementById('successState').classList.remove('d-none');
                    document.getElementById('validatedAt').textContent = data.validated_at ?? '';
                }
            })
            .catch(() => {});
    }, 3000);
</script>
</body>
</html>
<?php /**PATH C:\laragon\www\hotel-management-system\resources\views/customer/payment-qrcode.blade.php ENDPATH**/ ?>