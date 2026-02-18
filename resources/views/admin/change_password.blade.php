@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Change Password</span>
        </nav>
        <h1 class="page-title">Change Password</h1>
        <p class="page-subtitle">Update your admin account password</p>
    </div>
</div>

<!-- Change Password Form -->
<div style="max-width: 500px;">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">
                <i class="bi bi-key-fill"></i>
                Update Password
            </h3>
        </div>
        
        <div class="admin-card-body">
            <form action="{{ route('admin.update.password') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="oldPasswordInput" class="form-label">Current Password</label>
                    <input type="password" name="old_password" id="oldPasswordInput"
                        class="form-input @error('old_password') is-invalid @enderror"
                        placeholder="Enter your current password">
                    @error('old_password')
                        <small style="color: var(--admin-danger); margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="newPasswordInput" class="form-label">New Password</label>
                    <input type="password" name="new_password" id="newPasswordInput"
                        class="form-input @error('new_password') is-invalid @enderror"
                        placeholder="Enter your new password">
                    @error('new_password')
                        <small style="color: var(--admin-danger); margin-top: 4px; display: block;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="confirmNewPasswordInput"
                        class="form-input" placeholder="Re-enter your new password">
                </div>

                <button type="submit" class="btn-admin btn-admin-primary w-100" style="margin-top: 8px;">
                    <i class="bi bi-check-lg"></i>
                    Update Password
                </button>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')
