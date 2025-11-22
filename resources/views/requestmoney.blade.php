<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Money — BankingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --bg-1: #071733;
            --bg-2: #0f2a54;
            --accent: #d4af37;
            --muted: rgba(255, 255, 255, 0.9);
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

        .form-label { color: var(--muted); font-weight: 600; }

        .form-control,
        .form-select {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.06);
            color: var(--muted);
        }

        .summary-card {
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
            border: 1px solid rgba(255,255,255,0.04);
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
       .table thead th {
            color: #ffffffff;
            font-weight: 600;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            background: #aba7a71c;
        }
           .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            background: #aba7a71c;
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
        .small-muted { color: rgba(255,255,255,0.7); }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('dashboard.view') }}" class="text-white-50 text-decoration-none small"><i class="bi bi-arrow-left me-1"></i>Back to Dashboard</a>
                <h1 class="h3 mt-2 mb-1">Request Money</h1>
                <p class="small-muted mb-0">Send a payment request to contacts — quick, secure and trackable.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card card-pro p-4">
                    <h5 class="mb-3 text-white">Create Request</h5>

                    <form id="requestForm" action="#" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Recipient</label>
                            <select class="form-select bg-dark text-white " name="recipient" required>
                                <option class="border-0"  value="">Select recipient or enter phone/email</option>

                                @php $allUsers = \App\Models\User::orderBy('name')->get(); @endphp
                                @forelse($allUsers as $u)
                                    <option  value="{{ $u->id }}" @if(auth()->check() && auth()->id() === $u->id) selected @endif>{{ $u->name }} — {{ $u->email }}@if(auth()->check() && auth()->id() === $u->id) (you)@endif</option>
                                @empty
                                    <option disabled>No users found</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text "style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.04); color: var(--muted);">$</span>
                                    <input type="number" step="0.01" class="form-control bg-dark text-white" name="amount" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Due Date (optional)</label>
                                <input type="date" class="form-control bg-dark text-white" name="due_date">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message (optional)</label>
                            <textarea class="form-control bg-dark text-white" rows="3" name="note" placeholder="Add a note, e.g., 'Dinner last night'"></textarea>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-gold">Request Money</button>
                            <button type="button" class="btn btn-outline-light" onclick="document.getElementById('requestForm').reset()">Reset</button>
                        </div>
                    </form>
                </div>

                <div class="card card-pro p-4 mt-3">
                    <h6 class="mb-3 text-white">Recent Requests</h6>
                    <div class="table-responsive">
                        <table class="table table-borderless text-white-75 mb-0 table-bg">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>To</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-white-50">Nov 20, 2025</td>
                                    <td class="text-white">Jane Doe</td>
                                    <td class="text-success">$120.00</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                </tr>
                                <tr>
                                    <td class="text-white-50">Nov 18, 2025</td>
                                    <td class="text-white">John Smith</td>
                                    <td class="text-danger">$45.50</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card summary-card p-4">
                    <h6 class="mb-3 text-white">Request Summary</h6>
                    <div class="mb-2 small-muted">Recipient</div>
                    <div class="fw-bold mb-3 text-white-50">— Not selected —</div>

                    <div class="d-flex justify-content-between small-muted mb-1">Amount</div>
                    <div class="fw-bold mb-3 text-white-50">$0.00</div>

                    <div class="d-flex justify-content-between small-muted mb-1">Fee</div>
                    <div class="mb-3 text-white-50">$0.00</div>

                    <hr class="border-light">

                    <div class="d-flex justify-content-between">
                        <div class="small-muted">Total</div>
                        <div class="fw-bold text-white-50">$0.00</div>
                    </div>

                    <div class="mt-4">
                        <small class="small-muted">Tip: Requests expire after 14 days. You can cancel pending requests anytime.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
