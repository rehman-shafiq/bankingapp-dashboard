<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BankingApp — Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root{
            --bg-1: #071733; /* deep navy */
            --bg-2: #0f2a54; /* dark blue */
            --accent: #d4af37; /* soft gold accent */
            --muted: rgba(255,255,255,0.75);
        }
        html,body{height:100%;margin:0}
        body{
            background: linear-gradient(120deg,var(--bg-1) 0%, var(--bg-2) 60%);
            color:var(--muted);font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            -webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;
        }
        .welcome-hero{min-height:100vh;display:flex;align-items:center}
        .brand-mark{width:48px;height:48px;background:linear-gradient(45deg,var(--accent),#ffd66b);border-radius:10px;display:inline-flex;align-items:center;justify-content:center;color:#071733;font-weight:700}
        .card-pro{background:linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.02));border:1px solid rgba(255,255,255,0.06);box-shadow:0 10px 30px rgba(2,6,23,0.6)}
        .feature{opacity:.95}
        .lead-strong{color:#fff;font-weight:600}
        .accent-dot{width:8px;height:8px;background:var(--accent);border-radius:50%;display:inline-block;margin-right:.6rem}
        @keyframes rise{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
        .enter{animation:rise .55s ease both}
        .btn-gold{background:linear-gradient(90deg,var(--accent),#ffd66b);color:#071733;border:none}
        .btn-gold:focus,.btn-gold:hover{box-shadow:0 8px 20px rgba(212,175,55,.18)}
        @media (max-width:767.98px){.welcome-hero{padding:3rem 0}.feature-list{margin-top:1rem}}
    </style>
</head>
<body>
    <main class="welcome-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 text-lg-start text-center enter">
                    <div class="mb-3 d-inline-flex align-items-center gap-3">
                        <div class="brand-mark">BA</div>
                        <div class="text-start">
                            <div class="h5 mb-0" style="color:var(--muted)">BankingApp</div>
                            <div class="small text-white-50">Digital banking reimagined</div>
                        </div>
                    </div>

                    <h2 class="display-6 fw-bold mt-3" style="color:#fff">Professional banking for modern businesses and customers</h2>
                    <p class="lead mt-3 lead-strong">Secure accounts, instant transfers, insightful reporting — built with enterprise-grade security and polished UX.</p>

                    <ul class="list-unstyled mt-4 feature-list">
                        <li class="mb-2 feature"><span class="accent-dot"></span><strong>Safe & Compliant</strong> — 256-bit encryption & regulatory-ready audit logs.</li>
                        <li class="mb-2 feature"><span class="accent-dot"></span><strong>Fast Transfers</strong> — optimized rails for instant movement of funds.</li>
                        <li class="mb-2 feature"><span class="accent-dot"></span><strong>24/7 Support</strong> — enterprise SLAs and dedicated onboarding.</li>
                    </ul>
                </div>

                <div class="col-lg-5 offset-lg-1 enter">
                    <div class="card card-pro rounded-4 p-4 p-sm-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <div class="text-white-50">Welcome back</div>
                                <small class="text-white-50">Sign in to your account</small>
                            </div>
                            <div class="text-end">
{{--                                 <div class="small text-white-50">New?</div> --}}
                                <a href="{{ route('signup.view') }}" class="btn btn-sm btn-outline-light">Create account</a>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('signin.view') }}" class="btn btn-lg btn-gold"> <i class="bi bi-box-arrow-in-right me-2"></i> Sign In</a>
                            <a href="{{ route('signup.view') }}" class="btn btn-lg btn-outline-light"> <i class="bi bi-person-plus me-2"></i> Sign Up</a>
                        </div>

                        <hr class="my-4" style="border-top-color:rgba(255,255,255,0.04)">

                        <div class="small text-white-50">Trusted by:</div>
                        <div class="d-flex gap-3 flex-wrap align-items-center mt-2">
                            <svg width="86" height="28" role="img" aria-label="ACME" xmlns="http://www.w3.org/2000/svg" class="img-fluid" style="opacity:.95;" viewBox="0 0 86 28">
                                <rect width="86" height="28" fill="#ffffff" rx="4" />
                                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#071733" font-family="Arial, Helvetica, sans-serif" font-size="12" font-weight="700">ACME</text>
                            </svg>

                            <svg width="86" height="28" role="img" aria-label="FIN" xmlns="http://www.w3.org/2000/svg" class="img-fluid" style="opacity:.95;" viewBox="0 0 86 28">
                                <rect width="86" height="28" fill="#ffffff" rx="4" />
                                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#071733" font-family="Arial, Helvetica, sans-serif" font-size="12" font-weight="700">FIN</text>
                            </svg>

                            <svg width="86" height="28" role="img" aria-label="PAY" xmlns="http://www.w3.org/2000/svg" class="img-fluid" style="opacity:.95;" viewBox="0 0 86 28">
                                <rect width="86" height="28" fill="#ffffff" rx="4" />
                                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#071733" font-family="Arial, Helvetica, sans-serif" font-size="12" font-weight="700">PAY</text>
                            </svg>
                        </div>
                    </div>
                    <div class="text-center mt-3 small text-white-50">&copy; {{ date('Y') }} BankingApp</div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
