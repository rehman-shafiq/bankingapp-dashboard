<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password — BankingApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --bg-1: #071733;
            --bg-2: #0f2a54;
            --accent: #d4af37;
            --muted: rgba(255, 255, 255, 0.85)
        }

        html,
        body {
            height: 100%;
            margin: 0
        }

        body {
            background: linear-gradient(120deg, var(--bg-1) 0%, var(--bg-2) 60%);
            color: var(--muted);
            font-family: Inter, system-ui, Segoe UI, Roboto, Arial
        }

        .auth-wrap {
            min-height: 100vh;
            display: flex;
            align-items: center
        }

        .auth-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.04);
            box-shadow: 0 12px 36px rgba(2, 6, 23, 0.6)
        }

        .brand-mark {
            width: 44px;
            height: 44px;
            background: linear-gradient(45deg, var(--accent), #ffd66b);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #071733;
            font-weight: 700;
            font-size: 20px
        }

        .form-control:focus {
            box-shadow: 0 6px 20px rgba(0, 0, 0, .25)
        }

        .btn-gold {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border: none
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
    <main class="auth-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="card auth-card rounded-4 p-4 p-md-5">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="brand-mark"><i class="bi bi-lock"></i></div>
                                <div>
                                    <div class="h6 mb-0" style="color:var(--muted)">Reset password</div>
                                    <small class="text-white-50">We'll help you regain access</small>
                                </div>
                            </div>
                            <div class="text-end">
                                {{-- <small class="text-white-50">Remember password?</small> --}}
                                <div><a href="{{ route('signin.view') }}" class="btn btn-sm btn-outline-light mt-1">Sign
                                        in</a></div>
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <p class="text-white-50 small mt-3">Enter your email address and we'll send you a link to reset
                            your password.</p>

                        <form method="GET" action="{{ route('forget.password.action') }}" class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label small text-white-50">Email address</label>
                                <input id="email" name="email" type="email"
                                    class="form-control form-control-lg bg-transparent text-white"
                                    placeholder="you@company.com" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-gold"><i class="bi bi-envelope me-2"></i>
                                    Send reset link</button>
                            </div>
                        </form>

                        <hr class="my-4" style="border-top-color:rgba(255,255,255,0.04)">

                        <div class="small text-white-50 text-center">
                            Didn't receive an email? Check your spam folder or <a href="{{ route('signin.view') }}"
                                class="text-decoration-underline text-white-50">try signing in again</a>.
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
