<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Statements — BankingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --bg-1: #071733;
            --bg-2: #0f2a54;
            --accent: #d4af37;
            --muted: rgba(255, 255, 255, 0.85);
            --card-bg: rgba(113, 47, 47, 0.02)
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

        .form-control.bg-dark,
        .form-select.bg-dark {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--muted);
        }

        .form-control.bg-dark:focus,
        .form-select.bg-dark:focus {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--accent);
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
        }

        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
            background: #aba7a71c; /* requested subtle translucent gray */
        }

        .table {
            color: var(--muted);
            border-color: rgba(255, 255, 255, 0.04);
            margin-bottom: 0;
        }

        .table thead {
            background: rgba(7, 23, 51, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
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

        .table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.02);
            transition: background 0.2s ease;
        }

        .table tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            background: #aba7a71c;
        }

        .transaction-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 0.75rem;
        }

        .icon-income {
            background: rgba(16, 185, 129, 0.1);
            color: #a7f3d0;
        }

        .icon-expense {
            background: rgba(239, 68, 68, 0.1);
            color: #fca5a5;
        }

        .icon-transfer {
            background: rgba(59, 130, 246, 0.1);
            color: #93c5fd;
        }

        .text-success-custom {
            color: #a7f3d0 !important;
        }

        .text-danger-custom {
            color: #fca5a5 !important;
        }

        .badge-filter {
            background: rgba(255, 255, 255, 0.05);
            color: var(--muted);
            border: 1px solid rgba(255, 255, 255, 0.08);
            font-size: 0.75rem;
            padding: 0.4rem 0.75rem;
        }

        .badge-filter.active {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border-color: var(--accent);
        }

        .pagination .page-link {
            background-color: transparent;
            border-color: rgba(255, 255, 255, 0.1);
            color: var(--muted);
        }

        .pagination .page-link:hover {
            background-color: rgba(212, 175, 55, 0.1);
            border-color: var(--accent);
            color: #fff;
        }

        .pagination .page-link.active {
            background-color: linear-gradient(90deg, var(--accent), #ffd66b);
            border-color: var(--accent);
            color: #071733;
        }
      
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Header -->
                <div class="mb-4">
                    <a href="{{ route('dashboard.view') }}" class="text-white-50 text-decoration-none small"><i class="bi bi-arrow-left me-1"></i>Back to Dashboard</a>
                    <h1 class="h3 mt-2 mb-1">Account Statements</h1>
                    <p class="text-white-50 mb-0">View and manage your transaction history</p>
                </div>

                <!-- Filters Card -->
                <div class="card card-pro p-4 mb-4 ">
                    <h6 class="section-title mb-3">Filters</h6>
                    <div class="row g-3">
                        <div class="col-md-4 ">
                            <label class="form-label">Date Range</label>
                            <input type="date" class="form-control bg-dark text-white" value="2025-11-22">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">To Date</label>
                            <input type="date" class="form-control bg-dark text-white" value="2025-11-22">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Transaction Type</label>
                            <select class="form-select bg-dark text-white">
                                <option selected>All Transactions</option>
                                <option>Income</option>
                                <option>Expenses</option>
                                <option>Transfers</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-12">
                            <button class="btn btn-gold btn-sm me-2"><i class="bi bi-funnel me-1"></i>Apply Filters</button>
                            <button class="btn btn-outline-light btn-sm"><i class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                        </div>
                    </div>
                </div>

                <!-- Summary Stats -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="card card-pro p-3 text-center">
                            <small class="text-white-50">Total Income</small>
                            <h6 class="mt-2 text-success-custom">+$15,200.00</h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-pro p-3 text-center">
                            <small class="text-white-50">Total Expenses</small>
                            <h6 class="mt-2 text-danger-custom">-$8,450.75</h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-pro p-3 text-center">
                            <small class="text-white-50">Transfers</small>
                            <h6 class="mt-2 text-success-custom">12 transactions</h6>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-pro p-3 text-center">
                            <small class="text-white-50">Net Balance</small>
                            <h6 class="mt-2 text-success-custom">+$6,749.25</h6>
                        </div>
                    </div>
                </div>

                <!-- Transactions Table -->
                <div class="card card-pro p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="section-title mb-0">Recent Transactions</h6>
                        <button class="btn btn-outline-light btn-sm"><i class="bi bi-download me-1"></i>Download PDF</button>
                    </div>

                    <div class="table-responsive ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-white-50">Nov 22, 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="transaction-icon icon-income"><i class="bi bi-arrow-down"></i></span>
                                            <div>
                                                <div class="fw-bold">Salary Deposit</div>
                                                <small class="text-white-50">From Employer Inc.</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-filter">Income</span></td>
                                    <td><span class="text-success-custom fw-bold">+$5,200.00</span></td>
                                    <td class="">$12,450.50</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td class="text-white-50">Nov 21, 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="transaction-icon icon-expense"><i class="bi bi-arrow-up"></i></span>
                                            <div>
                                                <div class="fw-bold">Grocery Store</div>
                                                <small class="text-white-50">Walmart Supermarket</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-filter">Expense</span></td>
                                    <td><span class="text-danger-custom fw-bold">-$85.50</span></td>
                                    <td>$7,250.50</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td class="text-white-50">Nov 20, 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="transaction-icon icon-transfer"><i class="bi bi-arrow-left-right"></i></span>
                                            <div>
                                                <div class="fw-bold">Transfer to Savings</div>
                                                <small class="text-white-50">Account transfer</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-filter">Transfer</span></td>
                                    <td><span class="text-danger-custom fw-bold">-$1,000.00</span></td>
                                    <td>$7,336.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td class="text-white-50">Nov 19, 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="transaction-icon icon-expense"><i class="bi bi-arrow-up"></i></span>
                                            <div>
                                                <div class="fw-bold">Electricity Bill</div>
                                                <small class="text-white-50">Utility Payment</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-filter">Expense</span></td>
                                    <td><span class="text-danger-custom fw-bold">-$125.00</span></td>
                                    <td>$8,336.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td class="text-white-50">Nov 18, 2025</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="transaction-icon icon-income"><i class="bi bi-arrow-down"></i></span>
                                            <div>
                                                <div class="fw-bold">Freelance Payment</div>
                                                <small class="text-white-50">From Client XYZ</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge badge-filter">Income</span></td>
                                    <td><span class="text-success-custom fw-bold">+$1,500.00</span></td>
                                    <td>$8,461.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
