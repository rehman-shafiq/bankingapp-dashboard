<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings — BankingApp</title>
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

        html,
        body {
            height: 100%;
            margin: 0;
            background: linear-gradient(120deg, var(--bg-1) 0%, var(--bg-2) 60%);
            color: var(--muted);
            font-family: Inter, system-ui, Segoe UI, Roboto, Arial
        }

        .container-fluid {
            padding-top: 1.25rem
        }

        .card-pro {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid rgba(255, 255, 255, 0.04);
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.4)
        }

        .section-title {
            color: #fff;
            font-weight: 600
        }

        .muted {
            color: var(--muted)
        }

        .btn-gold {
            background: linear-gradient(90deg, var(--accent), #ffd66b);
            color: #071733;
            border: none
        }

        .form-control.bg-dark {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--muted)
        }

        .nav-side {
            background: rgba(7, 23, 51, 0.6);
            border-right: 1px solid rgba(255, 255, 255, 0.04);
            min-height: 80vh;
            padding: 1.25rem;
            border-radius: 12px
        }

        .nav-side .nav-link {
            color: var(--muted);
            padding: .5rem 0;
            border-left: 3px solid transparent
        }

        .nav-side .nav-link.active {
            color: #fff;
            border-left-color: var(--accent);
            background: rgba(212, 175, 55, 0.06);
            border-radius: 6px;
            padding-left: .75rem
        }

        @media (max-width:991.98px) {
            .nav-side {
                min-height: auto;
                margin-bottom: 1rem
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row gx-4">
            <div class="col-lg-3">
                <div class="nav-side card-pro p-3">
                    <div class="d-flex align-items-center mb-3 gap-3">
                        <div
                            style="width:48px;height:48px;background:linear-gradient(45deg,var(--accent),#ffd66b);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#071733;font-weight:700">
                            BA</div>
                        <div>
                            <div class="fw-bold">BankingApp</div>
                            <div class="small muted">Account settings</div>
                        </div>
                    </div>

                    <nav class="nav flex-column">
                        <a class="nav-link active" href="#profile">Profile</a>

                        {{-- <a class="nav-link" href="#security">Security</a>
                        <a class="nav-link" href="#notifications">Notifications</a>
                        <a class="nav-link" href="#preferences">Preferences</a> --}}
                        <a class="nav-link text-danger mt-3" href="#">Delete account</a>
                    </nav>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card-pro p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="mb-0 section-title">Settings</h4>
                            <small class="muted">Manage your profile, security and app preferences</small>
                        </div>
                          
                            <div>
                                <form method="POST" action="{{ route('setting.upload.profile.picture.action') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                 <a class="btn btn-outline-light me-2" href="{{ route('dashboard.view') }}">Cancel</a>
                                <button class="btn btn-gold" type="submit">Save changes</button>
                            </div>
                    </div>

                    <!-- Profile Section -->
                    <section id="profile" class="mb-4">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-3 text-center">
                                <div id="avatarContainer"
                                    style="width:120px;height:120px;border-radius:12px;background:var(--card-bg);display:inline-flex;align-items:center;justify-content:center;overflow:hidden">
                                    @php
                                        $avatar = auth()->user()->profile_picture;
                                        $avatarUrl = $avatar ? asset('storage/profile_pictures/' . $avatar) : null;
                                    @endphp

                                    <img id="avatarPreview"
                                        src="{{ $avatarUrl ?? 'data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'120\' height=\'120\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=%22%23FFFFFF%22 stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'><path d=\'M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\'></path><circle cx=\'12\' cy=\'7\' r=\'4\'></circle></svg>' }}"
                                        alt="avatar"
                                        style="width:100%;height:100%;object-fit:cover;display:block;cursor:pointer">
                                </div>
                                <div class="mt-3">
                                  
                                        <input type="file" id="profile_picture" name="profile_picture"
                                            accept="image/*" style="display:none">

                                    {{--     <button type="submit" id="changeAvatarBtn"
                                            class="btn btn-outline-light btn-sm">
                                            Update Profile Picture
                                        </button> --}}

                                        <div class="small muted mt-2" id="avatarFilename"></div>
                                        @error('profile_picture == ``')
                                            <p class="text-danger small mt-1">{{ $message }}</p>
                                        @enderror
                                    </form>
                                </div>


                            </div>
                            <div class="col-md-9">
                                <h6 class="mb-3 section-title">Profile</h6>
                                <form method="GET" action="{{ route('setting.profile.update.action') }}">
                                    @csrf

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small muted">Name</label>
                                            <input type="text" name="name" class="form-control form-control-lg bg-dark"
                                                value="{{ auth()->user()->name ?? 'UserName' }}" required>
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label small muted">Email</label>
                                            <input type="email" name="email" class="form-control form-control-lg bg-dark"
                                                value="{{ auth()->user()->email ?? 'UserEmail' }}" required>
                                            @error('email')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-gold mt-3 w-100"  type="submit">Save Profile</button>
                                </form>
                            </div>
                        </div>
                    </section>

                    <!-- Security Section -->
                    <section id="security" class="mb-4">
                        <h6 class="mb-3 section-title">Security</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card-pro p-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong>Change password</strong>
                                            <div class="small muted">Update your account password regularly</div>
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-pro p-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong>Two-factor authentication</strong>
                                            <div class="small muted">Protect your account with an extra verification
                                                step</div>
                                        </div>
                                        <div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="2fa">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Notifications Section -->
                    <section id="notifications" class="mb-4">
                        <h6 class="mb-3 section-title">Notifications</h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="card-pro p-3 text-center">
                                    <div class="mb-2"><strong>Email</strong></div>
                                    <div class="small muted mb-2">Receive email updates</div>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="emailNotif">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-pro p-3 text-center">
                                    <div class="mb-2"><strong>SMS</strong></div>
                                    <div class="small muted mb-2">Alerts on your phone</div>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="smsNotif">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-pro p-3 text-center">
                                    <div class="mb-2"><strong>Push</strong></div>
                                    <div class="small muted mb-2">Real-time app notifications</div>
                                    <div class="form-check form-switch d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" id="pushNotif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Preferences -->
                    <section id="preferences" class="mb-4">
                        <h6 class="mb-3 section-title">Preferences</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small muted">Currency</label>
                                <select class="form-select form-select-lg bg-dark text-white">
                                    <option selected>USD</option>
                                    <option>EUR</option>
                                    <option>GBP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small muted">Language</label>
                                <select class="form-select form-select-lg bg-dark text-white">
                                    <option selected>English</option>
                                    <option>Spanish</option>
                                    <option>French</option>
                                </select>
                            </div>
                        </div>
                    </section>
                    </form>
                </div>
            </div>
        </div>
    </div>

        @include('partials.change-password-modal')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            // const btn = document.getElementById('changeAvatarBtn');
            const input = document.getElementById('profile_picture');
            const preview = document.getElementById('avatarPreview');
            const filenameEl = document.getElementById('avatarFilename');

            if (!preview || !input) return;

            preview.addEventListener('click', () => input.click());

            input.addEventListener('change', (e) => {
                const file = e.target.files && e.target.files[0];
                if (!file) return;
                if (!file.type.startsWith('image/')) {
                    alert('Please select an image file (png, jpg, gif).');
                    input.value = '';
                    return;
                }

                filenameEl.textContent = file.name;

                // preview
                const url = URL.createObjectURL(file);
                preview.src = url;

                // read base64 and set hidden input inside the existing profile form
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const data = ev.target.result; // data:image/..;base64,...
                    // find the profile form in the same section
                    const profileForm = document.querySelector('#profile form');
                    if (profileForm) {

                        let hidden = profileForm.querySelector('input[name="avatar_data"]');
                        if (!hidden) {
                            hidden = document.createElement('input');
                            hidden.type = 'hidden';
                            hidden.name = 'avatar_data';
                            profileForm.appendChild(hidden);
                        }

                        hidden.value = data;
                    }
                };

                reader.readAsDataURL(file);
            });
        })();
    </script>
</body>

</html>
