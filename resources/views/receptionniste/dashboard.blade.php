<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Receptioniste dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

    <style>
        .topbar{
            background: linear-gradient(135deg,#0d6efd 0%,#0dcaf0 100%);
            border-radius: 1rem; color:#fff;
        }
        #reader{ border-radius: 1rem; overflow:hidden; border:1px solid #e9ecef; }
        .scan-result{
            border-radius:1rem; padding:1.25rem;
            border-left:5px solid #198754; background:#f0fff4;
        }
        .scan-result.error{ border-left-color:#dc3545; background:#fff5f5; }
        .scan-result.info{ border-left-color:#ffc107; background:#fffbea; }
        .stat-card{ border-radius:1rem; border:1px solid #e9ecef; }
    </style>
</head>
<body class="bg-light">
<main>
<section class="pt-4 pb-5">
    <div class="container">

        <div class="topbar p-4 mb-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h1 class="fs-4 mb-1"><i class="bi bi-qr-code-scan me-2"></i>Payment Validation</h1>
                <p class="mb-0 opacity-75">Scan the QR code presented by the guest at the reception desk</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-light btn-sm"><i class="bi bi-box-arrow-right me-1"></i>logout</button>
            </form>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-lg-3">
                <div class="card stat-card card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon-xl bg-warning rounded-3 text-white"><i class="bi bi-hourglass-split"></i></div>
                        <div class="ms-3">
                            <h4 class="mb-0">{{ $enAttenteCount }}</h4>
                            <span>Pending Payement</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card stat-card card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon-xl bg-success rounded-3 text-white"><i class="bi bi-check2-circle"></i></div>
                        <div class="ms-3">
                            <h4 class="mb-0">{{ $valideAujourdhui }}</h4>
                            <span>Validate today</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Scanner -->
            <div class="col-lg-6">
                <div class="card border p-3">
                    <h5 class="mb-3"><i class="bi bi-camera-video me-1"></i>Scanner</h5>
                    <div id="reader"></div>
                    <div id="scanResult" class="scan-result info mt-3">
                        <i class="bi bi-info-circle me-1"></i> Place the customer QR code infront of the camera
                </div>
            </div>

            <!-- Recent validations -->
            <div class="col-lg-6">
                <div class="card border p-3 h-100">
                    <h5 class="mb-3"><i class="bi bi-clock-history me-1"></i>Recent validations</h5>
                    <ul class="list-group list-group-flush" id="recentList">
                        @forelse($recentValidations as $r)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h6 class="mb-0">Réservation #{{ $r->id }}</h6>
                                    <small class="text-muted">{{ optional($r->validated_at)->format('d/m/Y H:i') }}</small>
                                </div>
                                <span class="badge bg-success bg-opacity-10 text-success">{{ number_format($r->total_price,0,',',' ') }} XAF</span>
                            </li>
                        @empty
                            <li class="list-group-item px-0 text-muted">No validation for the moment.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<script>
    const resultBox = document.getElementById('scanResult');
    const validateUrl = "{{ route('receptionniste.validate-qr') }}";
    const csrfToken = "{{ csrf_token() }}";
    let lastToken = null;
    let lastScanTime = 0;

    function showResult(type, message){
        resultBox.className = 'scan-result mt-3 ' + type;
        resultBox.innerHTML = '<i class="bi ' + (type === 'success' ? 'bi-check-circle' : (type === 'error' ? 'bi-x-circle' : 'bi-info-circle')) + ' me-1"></i> ' + message;
    }

    function onScanSuccess(decodedText){
        const now = Date.now();
        // Évite de renvoyer 10x la même requête pendant que la caméra
        // continue de lire le même QR code sous les yeux du client.
        if(decodedText === lastToken && (now - lastScanTime) < 4000){
            return;
        }
        lastToken = decodedText;
        lastScanTime = now;

        showResult('info', 'Vérification en cours...');

        fetch(validateUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ token: decodedText }),
        })
        .then(r => r.json())
        .then(data => {
            if(data.success){
                showResult('success', data.message + (data.reservation ? ' — ' + data.reservation.client + ' (' + data.reservation.hotel + ')' : ''));
                if(navigator.vibrate) navigator.vibrate(150);
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center px-0';
                li.innerHTML = '<div><h6 class="mb-0">Réservation #' + data.reservation.id + '</h6><small class="text-muted">à l\'instant</small></div>' +
                                '<span class="badge bg-success bg-opacity-10 text-success">' + data.reservation.montant + ' XAF</span>';
                document.getElementById('recentList').prepend(li);
            } else {
                showResult(data.already ? 'info' : 'error', data.message);
            }
        })
        .catch(() => showResult('error', "Erreur de connexion, réessayez."));
    }

    const html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start(
        { facingMode: "environment" },
        { fps: 10, qrbox: { width: 250, height: 250 } },
        onScanSuccess
    ).catch(() => {
        showResult('error', "Impossible d'accéder à la caméra. Vérifiez les autorisations du navigateur.");
    });
</script>
</body>
</html>
