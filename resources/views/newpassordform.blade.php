<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Password — BankingApp</title>
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
                                    <div class="h6 mb-0" style="color:var(--muted)">Create a new password</div>
                                    <small class="text-white-50">Set a secure password for your account</small>
                                </div>
                            </div>
                            <div class="text-end">
                               
                                <div><h1"
                                        class="btn btn-sm btn-outline-light mt-1">Contact</h1></div>
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        <form method="POST" action="{{ route('password.reset.action') }}" class="mt-3">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token ?? '' }}">

                            <div class="mb-3">
                                <label for="password" class="form-label small text-white-50">New password</label>
                                <input id="password" name="password" type="password"
                                    class="form-control form-control-lg bg-transparent text-white"
                                    placeholder="New password" required>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label small text-white-50">Confirm
                                    password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control form-control-lg bg-transparent text-white"
                                    placeholder="Confirm password" required>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-gold"><i
                                        class="bi bi-shield-lock me-2"></i> Set new password</button>
                            </div>
                        </form>

                        <hr class="my-4" style="border-top-color:rgba(255,255,255,0.04)">
                        <div class="small text-white-50 text-center">Remembered your password? <a
                                href="{{ route('signin.view') }}" class="text-decoration-underline text-white-50">Sign in</a>
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
