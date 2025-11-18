<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard — BankingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --bg-1: #071733;
            --bg-2: #0f2a54;
            --accent: #d4af37;
            --card-bg: rgba(255, 255, 255, 0.02);
            --text-muted: rgba(255, 255, 255, 0.75)
        }

        html,
        body {
            height: 100%;
            margin: 0;
            background: linear-gradient(120deg, var(--bg-1) 0%, var(--bg-2) 60%);
            color: var(--text-muted);
            font-family: Inter, system-ui, Segoe UI, Roboto, Arial;
            min-height: 100vh
        }

        .sidebar {
            background: rgba(7, 23, 51, 0.6);
            border-right: 1px solid rgba(255, 255, 255, 0.04);
            padding: 2rem 0;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto
        }

        .nav-item {
            margin: 0.5rem 0
        }

        .nav-link {
            color: var(--text-muted);
            padding: 0.75rem 1.5rem;
            border-left: 3px solid transparent;
            transition: all .2s ease
        }

        .nav-link:hover,
        .nav-link.active {
            color: #fff;
            background: rgba(212, 175, 55, 0.1);
            border-left-color: var(--accent)
        }

        .card-dash {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.04);
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.4)
        }

        .balance-card {
            background: linear-gradient(135deg, var(--accent) 0%, #ffd66b 100%);
            color: #071733;
            border: none
        }

        .stat-box {
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.04);
            padding: 1.5rem;
            border-radius: 12px
        }

        .transaction-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            padding: 1rem 0
        }

        .transaction-item:last-child {
            border-bottom: none
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: #a7f3d0
        }

        .badge-danger {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5
        }

        .btn-action {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px
        }

        .btn-action:hover {
            box-shadow: 0 6px 16px rgba(212, 175, 55, 0.2)
        }

        .header-top {
            background: rgba(7, 23, 51, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            padding: 1.5rem
        }
    </style>
</head>

<body>
    <div class="d-flex h-100">
        <!-- Sidebar -->
        <div class="sidebar col-lg-3 col-xl-2">
            <div class="px-3 mb-4">
                <div class="d-flex align-items-center gap-2">
                    <div
                        style="width:36px;height:36px;background:linear-gradient(45deg,var(--accent),#ffd66b);border-radius:8px;display:inline-flex;align-items:center;justify-content:center;color:#071733;font-weight:700">
                        BA</div>
                    <div class="h6 mb-0">BankingApp</div>
                </div>
            </div>

            <nav class="nav flex-column">
                <a class="nav-link active" href="#"><i class="bi bi-house me-2"></i>Dashboard</a>
                <a class="nav-link" href="#"><i class="bi bi-credit-card me-2"></i>Accounts</a>
                <a class="nav-link" href="#"><i class="bi bi-arrow-left-right me-2"></i>Transfers</a>
                <a class="nav-link" href="#"><i class="bi bi-file-earmark me-2"></i>Statements</a>
                <a class="nav-link" href="#"><i class="bi bi-gear me-2"></i>Settings</a>
            </nav>

            <hr style="border-top-color:rgba(255,255,255,0.04)">
            <div class="px-3">
                <a href="{{ route('signin.view') }}" class="btn btn-outline-light btn-sm w-100"><i
                        class="bi bi-box-arrow-left me-2"></i>Sign out</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 d-flex flex-column">
            <!-- Header -->
            <div class="header-top">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="h4 mb-0">Welcome back, {{ auth()->user()->name ?? 'User' }}</h1>
                        <small class="text-white-50">Here's your financial overview</small>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-light btn-sm me-2"><i class="bi bi-bell"></i></button>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-light btn-sm dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('signin.view') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-grow-1 overflow-auto p-4">
                <!-- Balance Card -->
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <div class="card-dash card balance-card p-4 rounded-4">
                            <small class="d-block mb-2">Total Balance</small>
                            <h2 class="h3 mb-0">$12,450.50</h2>
                            <small class="d-block mt-3 text-opacity-75">Card ending in 4242</small>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="stat-box">
                                    <small class="text-white-50">Income</small>
                                    <h6 class="mt-2">$5,200.00</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-box">
                                    <small class="text-white-50">Expenses</small>
                                    <h6 class="mt-2">$2,150.25</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-box">
                                    <small class="text-white-50">Savings</small>
                                    <h6 class="mt-2">$8,450.50</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="stat-box">
                                    <small class="text-white-50">Transfers</small>
                                    <h6 class="mt-2">3 today</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="mb-3">Quick Actions</h6>
                        <div class="d-flex gap-2 flex-wrap">
                            <button class="btn btn-action"><i class="bi bi-arrow-left-right me-2"></i>Send
                                Money</button>
                            <button class="btn btn-action"><i class="bi bi-arrow-down me-2"></i>Request Money</button>
                            <button class="btn btn-action"><i class="bi bi-credit-card me-2"></i>Add Card</button>
                            <button class="btn btn-action"><i class="bi bi-file-earmark-text me-2"></i>View
                                Statement</button>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card-dash card p-4 rounded-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0 text-white">Recent Transactions</h6>
                                <a href="#" class="small text-white-50">View all</a>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:40px;height:40px;background:rgba(16,185,129,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#a7f3d0">
                                            <i class="bi bi-arrow-down"></i>
                                        </div>
                                        <div>
                                            <small class="d-block text-white-50">Salary Deposit</small>
                                            <small class="text-white-50">Today at 9:30 AM</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="d-block text-success">+$5,200.00</small>
                                    </div>
                                </div>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:40px;height:40px;background:rgba(239,68,68,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fca5a5">
                                            <i class="bi bi-arrow-up"></i>
                                        </div>
                                        <div>
                                            <small class="d-block text-white-50">Grocery Store</small>
                                            <small class="text-white-50">Yesterday at 2:15 PM</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="d-block text-danger">-$85.50</small>
                                    </div>
                                </div>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:40px;height:40px;background:rgba(239,68,68,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fca5a5">
                                            <i class="bi bi-arrow-up"></i>
                                        </div>
                                        <div>
                                            <small class="d-block text-white-50">Electricity Bill</small>
                                            <small class="text-white-50">3 days ago</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="d-block text-danger">-$125.00</small>
                                    </div>
                                </div>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div
                                            style="width:40px;height:40px;background:rgba(59,130,246,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#93c5fd">
                                            <i class="bi bi-arrow-left-right"></i>
                                        </div>
                                        <div>
                                            <small class="d-block text-white-50">Transfer to Savings</small>
                                            <small class="text-white-50">5 days ago</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <small class="d-block text-danger">-$1,000.00</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('dashboard.view') }}">

                    <!-- Spending Summary -->
                    <div class="col-lg-4">
                        <div class="card-dash card p-4 rounded-3">
                            <h6 class="mb-3 text-white">Spending by Category</h6>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="text-white-50">Food & Dining</small>
                                    <small class="text-white-50">35%</small>
                                </div>
                                <div class="progress" style="height:6px;background:rgba(255,255,255,0.1)">
                                    <div class="progress-bar"
                                        style="width:35%;background:linear-gradient(90deg,var(--accent),#ffd66b)">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="text-white-50">Shopping</small>
                                    <small class="text-white-50">20%</small>
                                </div>
                                <div class="progress" style="height:6px;background:rgba(255,255,255,0.1)">
                                    <div class="progress-bar" style="width:20%;background:#a7f3d0"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="text-white-50">Utilities</small>
                                    <small class="text-white-50">25%</small>
                                </div>
                                <div class="progress" style="height:6px;background:rgba(255,255,255,0.1)">
                                    <div class="progress-bar" style="width:25%;background:#fca5a5"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between mb-1">
                                    <small class="text-white-50">Entertainment</small>
                                    <small class="text-white-50">20%</small>
                                </div>
                                <div class="progress" style="height:6px;background:rgba(255,255,255,0.1)">
                                    <div class="progress-bar" style="width:20%;background:#93c5fd"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
