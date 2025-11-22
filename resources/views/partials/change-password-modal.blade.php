<div>
    <!-- Change Password Modal (Bootstrap) - navy/gold theme -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="background: linear-gradient(120deg, #071713 0%, #0f2a54 50%); border:1px solid rgba(255,255,255,0.04); color: rgba(255,255,255,0.85);">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="changePasswordLabel" style="color:#fff">Change Password</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>
                <style>
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

                <div class="modal-body">
                    <form id="changePasswordForm" method="POST" action="{{ route('password.change.action') }}">
                        @csrf
                    
                        <div class="mb-3">
                            <label class="form-label small muted">Current password</label>
                            <input name="current_password" id="current_password" type="password" placeholder="Current Password"
                                class="form-control bg-dark text-white" required minlength="8">
                            @error('current_password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small muted">New password</label>
                            <input name="password" id="password" type="password" placeholder="New Password"
                                class="form-control bg-dark text-white" required minlength="8">
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small muted">Confirm new password</label>
                            <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" type="password"
                                class="form-control bg-dark text-white" required minlength="8">
                                @error('password_confirmation')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-gold">Update password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
