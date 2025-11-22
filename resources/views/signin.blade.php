<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In — BankingApp</title>
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
            font-weight: 700
        }

        .form-control:focus {
            box-shadow: 0 6px 20px rgba(0, 0, 0, .25)
        }

        .btn-gold {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border: none
        }

        /* Placeholder color rules: ensure placeholder text is white/visible */
  

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
                                <div class="brand-mark">BA</div>
                                <div>
                                    <div class="h6 mb-0" style="color:var(--muted)">BankingApp</div>
                                    <small class="text-white-50">Secure sign in</small>
                                </div>
                            </div>
                            <div class="text-end">
                                {{--  <small class="text-white-50">New here?</small> --}}
                                <div><a href="{{ route('signup.view') }}"
                                        class="btn btn-sm btn-outline-light mt-1">Create
                                        account</a></div>
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form method="POST" action="{{ route('signin.action') }}" class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <label for="login" class="form-label small text-white-50">Email or phone</label>
                                <input id="login" type="text" name="login" value="{{ old('login') }}" required
                                    autofocus class="form-control form-control-lg bg-transparent text-white"
                                    placeholder="Enter Email or phone">
                                @error('login')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label small text-white-50">Password</label>
                                <input id="password" type="password" name="password" required
                                    class="form-control form-control-lg bg-transparent text-white"
                                    placeholder="••••••••">
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label small text-white-50" for="remember">Remember
                                        me</label>
                                </div>
                                <div><a href="{{ route('forget.password.view') }}" class="small text-white-50">Forgot
                                        password?</a></div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-lg btn-gold"><i
                                    class="bi bi-box-arrow-in-right me-2"></i> Sign In</button>
                            </div>
                        </form>

                        <div class="text-center mt-4 small text-white-50">Or sign in with</div>
                        <div class="d-flex gap-2 justify-content-center mt-3">
                            <a href="#" class="btn btn-outline-light btn-sm"><i class="bi bi-google"></i>
                                Google</a>
                            <a href="#" class="btn btn-outline-light btn-sm"><i class="bi bi-github"></i>
                                GitHub</a>
                        </div>

                        <hr class="my-4" style="border-top-color:rgba(255,255,255,0.04)">
                        <div class="small text-white-50 text-center">By signing in you agree to our <a href="#"
                                class="text-decoration-underline text-white-50">Terms</a> and <a href="#"
                                class="text-decoration-underline text-white-50">Privacy</a>.</div>
                    </div>
                    <div class="text-center mt-3 small text-white-50">&copy; {{ date('Y') }} BankingApp</div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
