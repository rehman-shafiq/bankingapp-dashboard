<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money — BankingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --bg-1: #071733;
            --bg-2: #0f2a54;
            --accent: #d4af37;
            --muted: rgba(255, 255, 255, 0.85);
            --card-bg: rgba(255, 255, 255, 0.02)
        }

        body {
            background: linear-gradient(120deg, var(--bg-1) 0%, var(--bg-2) 60%);
            color: var(--muted);
            font-family: Inter, system-ui, Segoe UI, Roboto, Arial;
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .card-pro {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.04);
        }

        .btn-gold {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border: none;
            font-weight: 600;
        }

        .form-control.bg-dark {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--muted);
        }

        .form-control.bg-dark:focus {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--accent);
            color: var(--muted);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .form-label {
            color: var(--muted);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .section-title {
            color: #fff;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .transfer-step {
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 12px;
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border-radius: 50%;
            font-weight: 700;
            font-size: 0.875rem;
            margin-right: 0.75rem;
        }

        .step-title {
            display: inline-block;
            color: #fff;
            font-weight: 600;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.875rem;
        }

        .summary-value {
            color: #fff;
            font-weight: 600;
        }

        .input-group-text {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--muted);
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <!-- Header -->
                <div class="mb-4">
                    <a href="{{ route('dashboard.view') }}" class="text-white-50 text-decoration-none small"><i
                            class="bi bi-arrow-left me-1"></i>Back to Dashboard</a>
                    <h1 class="h3 mt-2 mb-1">Transfer Money</h1>
                    <p class="text-white-50 mb-0">Send money to your contacts securely</p>
                </div>

                <!-- Transfer Form -->
                <div class="card card-pro p-4 mb-4">
                    <form id="transferForm">
                        @csrf

                        <!-- Step 1: Select Recipient -->
                        <div class="transfer-step"
                            style="background: var(--card-bg); border: 1px solid rgba(255, 255, 255, 0.04);">
                            <div class="mb-3">
                                <span class="step-number">1</span>
                                <span class="step-title">Select Recipient</span>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Recipient Account</label>
                                <select name="recipient_id" id="recipientSelect"
                                    class="form-select form-control bg-dark text-white" required>
                                    <option value="" selected disabled>Choose a contact</option>
                                    @php $allUsers = \App\Models\User::orderBy('name')->get(); @endphp
                                    @forelse($allUsers as $u)
                                        <option value="{{ $u->id }}"
                                            @if (auth()->check() === $u->id) selected @endif>{{ $u->name }} —
                                            ****5678 </option>
                                    @empty
                                        <option disabled>No users found</option>
                                    @endforelse
                                </select>
                                @error('recipient_id')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 2: Enter Amount -->
                        <div class="transfer-step"
                            style="background: var(--card-bg); border: 1px solid rgba(255, 255, 255, 0.04);">
                            <div class="mb-3">
                                <span class="step-number">2</span>
                                <span class="step-title">Enter Amount</span>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Amount to Transfer</label>
                                <div class="input-group">
                                    <span class="input-group-text"
                                        style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.04); color: var(--muted);">$</span>
                                    <input type="number" name="amount" id="amountInput"
                                        class="form-control bg-dark text-white" placeholder="0.00" min="0.01"
                                        step="0.01" required>
                                </div>
                                <small class="text-white-50 d-block mt-2">Available balance: <strong
                                        class="text-white">$12,450.50</strong></small>
                                @error('amount')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Step 3: Add Note (Optional) -->
                        <div class="transfer-step"
                            style="background: var(--card-bg); border: 1px solid rgba(255, 255, 255, 0.04);">
                            <div class="mb-3">
                                <span class="step-number">3</span>
                                <span class="step-title">Add Note <span class="text-white-50">(Optional)</span></span>
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Transfer Note</label>
                                <textarea name="note" id="noteInput" class="form-control bg-dark text-white" placeholder="e.g. Payment for dinner"
                                    rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Summary -->
                        <div class="card card-pro p-4 mb-4"
                            style="background: linear-gradient(180deg, rgba(212,175,55,0.05), rgba(212,175,55,0.02));">
                            <h6 class="section-title" style="margin-bottom: 1rem;">Transfer Summary</h6>
                            <div class="summary-item">
                                <span class="summary-label">Recipient</span>
                                <span class="summary-value" id="summaryRecipient">—</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Amount</span>
                                <span class="summary-value" id="summaryAmount">$0.00</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Transfer Fee</span>
                                <span class="summary-value text-white-50">Free</span>
                            </div>
                            <div class="summary-item"
                                style="border-top: 1px solid rgba(255, 255, 255, 0.1); padding-top: 1rem; margin-top: 0.5rem;">
                                <span class="summary-label">Total</span>
                                <span class="summary-value" id="summaryTotal">$0.00</span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex gap-3">
                            <a href="{{ route('dashboard.view') }}" class="btn btn-outline-light flex-grow-1">Cancel</a>
                            <button type="submit" class="btn btn-gold flex-grow-1" id="submitBtn">
                                <i class="bi bi-check me-2"></i>Confirm Transfer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            const recipientSelect = document.getElementById('recipientSelect');
            const amountInput = document.getElementById('amountInput');
            const summaryRecipient = document.getElementById('summaryRecipient');
            const summaryAmount = document.getElementById('summaryAmount');
            const summaryTotal = document.getElementById('summaryTotal');

            const recipientMap = {
                '1': 'John Doe — ****5678',
                '2': 'Jane Smith — ****1234',
                '3': 'Mike Johnson — ****9012',
                '4': 'Sarah Williams — ****3456'
            };

            function updateSummary() {
                const recipient = recipientSelect.value;
                const amount = parseFloat(amountInput.value) || 0;

                summaryRecipient.textContent = recipient ? (recipientMap[recipient] || '—') : '—';
                summaryAmount.textContent = '$' + amount.toFixed(2);
                summaryTotal.textContent = '$' + amount.toFixed(2);
            }

            recipientSelect.addEventListener('change', updateSummary);
            amountInput.addEventListener('input', updateSummary);
        })();
    </script>
</body>

</html>
