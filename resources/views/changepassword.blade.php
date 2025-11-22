<div>
    <!-- Change Password Modal (Bootstrap) - navy/gold theme -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); border:1px solid rgba(255,255,255,0.04);">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="changePasswordLabel" style="color:#fff">Change Password</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="changePasswordForm" method="POST" {{-- action="{{ route('password.change.action') }} --}}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label small muted">Current password</label>
                            <input name="current_password" type="password" class="form-control bg-dark text-white" required minlength="8">
                            @error('current_password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small muted">New password</label>
                            <input name="password" type="password" class="form-control bg-dark text-white" required minlength="8">
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small muted">Confirm new password</label>
                            <input name="password_confirmation" type="password" class="form-control bg-dark text-white" required minlength="8">
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