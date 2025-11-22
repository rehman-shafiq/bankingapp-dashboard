<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Card — BankingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --bg-1: #071733;
            --bg-2: #0f2a54;
            --accent: #d4af37;
            --muted: rgba(255, 255, 255, 0.92)
        }

        body {
            background: linear-gradient(120deg, var(--bg-1) 0%, var(--bg-2)60%);
            color: var(--muted);
            font-family: Inter, system-ui, Segoe UI, Roboto, Arial;
            min-height: 100vh;
            padding: 2rem 1rem
        }

        .card-pro {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.04)
        }

        .btn-gold {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border: none;
            font-weight: 600
        }

        .form-label {
            color: var(--muted);
            font-weight: 600
        }

        .form-control,
        .form-select {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            color: var(--muted)
        }

        .card-preview {
            background: linear-gradient(135deg, #0b355f, #0f2a54);
            border-radius: 12px;
            padding: 1.25rem;
            color: #fff;
            min-height: 160px
        }

        .chip {
            width: 48px;
            height: 36px;
            background: linear-gradient(90deg, #ffd66b, #d4af37);
            border-radius: 6px
        }
         input[type=number] {
            -moz-appearance: textfield;
            /* Firefox */
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            /* Chrome, Safari, Edge */
            margin: 0;
        }
          .form-control::placeholder {
            color: rgba(155, 154, 154, 0.85);
            opacity: 1;
        }

        .form-control:-ms-input-placeholder {
            color: rgba(87, 87, 87, 0.85);
        }

        .form-control::-ms-input-placeholder {
            color: rgba(87, 87, 87, 0.85);
        }

        .muted-sm {
            color: rgba(255, 255, 255, 0.75)
        }

        @media (max-width:767px) {
            .card-preview {
                min-height: 140px
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('dashboard.view') }}" class="text-white-50 text-decoration-none small"><i
                        class="bi bi-arrow-left me-1"></i>Back to Dashboard</a>
                <h1 class="h3 mt-2 mb-1">Add New Card</h1>
                <p class="muted-sm mb-2">Securely add debit or credit card to your account.</p>
                @includeIf('partials.auth-info')
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card card-pro p-4">
                    <h5 class="mb-3 text-white">Card Details</h5>
                    <form id="addCardForm" action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Cardholder Name</label>
                            <input class="form-control bg-dark text-white" name="card_name" placeholder="Full name as on card" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Card Number</label>
                            <input class="form-control bg-dark text-white" type="number" name="card_number" id="cardNumber"
                                placeholder="1234 5678 9012 3456" maxlength="19" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label">Expiry</label>
                                <input class="form-control bg-dark text-white" name="expiry" id="cardExpiry" placeholder="MM/YY"
                                    maxlength="5" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">CVV</label>
                                <input class="form-control bg-dark text-white" name="cvv" id="cardCvv" placeholder="***"
                                    maxlength="4" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Card Type</label>
                            <select class="form-select bg-dark text-white" name="card_type">
                                <option>Visa</option>
                                <option>Mastercard</option>
                                <option>Amex</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-gold">Add Card</button>
                            <button type="button" class="btn btn-outline-light"
                                onclick="document.getElementById('addCardForm').reset(); updatePreview();">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-pro p-4">
                    <h6 class="mb-3 text-white">Card Preview</h6>
                    <div class="card-preview d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="chip"></div>
                            <div class="text-end small muted-sm">BankingApp</div>
                        </div>

                        <div>
                            <div id="previewNumber" class="h5 fw-bold mt-3">•••• •••• •••• ••••</div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <div class="muted-sm small">Cardholder</div>
                                    <div id="previewName" class="fw-bold">Full Name</div>
                                </div>
                                <div class="text-end">
                                    <div class="muted-sm small">Expires</div>
                                    <div id="previewExpiry" class="fw-bold">MM/YY</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <small class="text-white-50 d-block mt-3">Your card details are stored securely.</small>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Small preview updater
        function formatCardNumber(v) {
            return v.replace(/\D/g, '').replace(/(.{4})/g, '$1 ').trim()
        }

        function updatePreview() {
            const num = document.getElementById('cardNumber').value || '';
            const name = document.querySelector('[name="card_name"]').value || 'Full Name';
            const exp = document.getElementById('cardExpiry').value || 'MM/YY';
            document.getElementById('previewNumber').textContent = num ? formatCardNumber(num) : '•••• •••• •••• ••••';
            document.getElementById('previewName').textContent = name;
            document.getElementById('previewExpiry').textContent = exp;
        }
        document.addEventListener('input', function(e) {
            if (['cardNumber', 'cardExpiry'].includes(e.target.id) || e.target.name === 'card_name')
        updatePreview();
        });
        updatePreview();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
