@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Manage Users</span>
        </nav>
        <h1 class="page-title">Manage Users</h1>
        <p class="page-subtitle">View and manage all registered users</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn-admin btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>
        <button type="button" class="btn-admin btn-admin-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-person-plus"></i> New User
        </button>

        @if(session('generated_password') && session('generated_usertag'))
        <div class="alert alert-success mt-3">
            <strong>User Created!</strong><br>
            <span>Password: <code>{{ session('generated_password') }}</code></span><br>
            <span>UserTag: <code>{{ session('generated_usertag') }}</code></span>
        </div>
        @endif
    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.add.user') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <!-- Password input removed: password is now auto-generated and shown after user creation -->
                        <div class="mb-3">
                            <label for="usc_code" class="form-label">USC Code</label>
                            <input type="text" class="form-control" id="usc_code" name="usc_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="GB">United Kingdom</option>
                                <option value="AU">Australia</option>
                                <option value="NG">Nigeria</option>
                                <option value="IN">India</option>
                                <!-- Add more countries as needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <script>
                        function togglePassword() {
                            const pwd = document.getElementById('password');
                            const eye = document.getElementById('passwordEye');
                            if (pwd.type === 'password') {
                                pwd.type = 'text';
                                eye.classList.remove('bi-eye');
                                eye.classList.add('bi-eye-slash');
                            } else {
                                pwd.type = 'password';
                                eye.classList.remove('bi-eye-slash');
                                eye.classList.add('bi-eye');
                            }
                        }
                        </script>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Users Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">
            <i class="bi bi-people-fill"></i>
            All Users
        </h3>
        <span style="color: var(--admin-text-muted); font-size: 14px;">
            {{ isset($users) ? $users->total() : (isset($result) && is_countable($result) ? count($result) : 0) }} users found
        </span>
    </div>
    
    <div class="admin-card-body" style="padding: 0;">
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(($users ?? $result ?? []) as $transaction)
                    <tr>
                        <td>
                            <div class="user-cell">
                                <div class="user-avatar">
                                    <span class="initials">{{ strtoupper(substr($transaction->first_name, 0, 1)) }}{{ strtoupper(substr($transaction->last_name ?? '', 0, 1)) }}</span>
                                </div>
                                <div class="user-info">
                                    <div class="user-name">{{ $transaction->first_name }} {{ $transaction->last_name ?? '' }}</div>
                                    <div class="user-email">
                                        {{ $transaction->email ?? 'No email' }}
                                        <button type="button" class="btn btn-link btn-sm p-0 ms-1" onclick="navigator.clipboard.writeText('{{ $transaction->email }}')" title="Copy Email">
                                            <i class="bi bi-clipboard"></i>
                                        </button>
                                    </div>
                                    @if(isset($transaction->usertag))
                                    <div class="user-usertag">
                                        Tag: <span>{{ $transaction->usertag }}</span>
                                        <button type="button" class="btn btn-link btn-sm p-0 ms-1" onclick="navigator.clipboard.writeText('{{ $transaction->usertag }}')" title="Copy Tag">
                                            <i class="bi bi-clipboard"></i>
                                        </button>
                                    </div>
                                    @endif
                                    @if(isset($transaction->plain_password) && $transaction->plain_password)
                                    <div class="user-password">
                                        Password: <span>{{ $transaction->plain_password }}</span>
                                        <button type="button" class="btn btn-link btn-sm p-0 ms-1" onclick="navigator.clipboard.writeText('{{ $transaction->plain_password }}')" title="Copy Password">
                                            <i class="bi bi-clipboard"></i>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M j, Y') }}</div>
                            <small style="color: var(--admin-text-muted);">{{ \Carbon\Carbon::parse($transaction->created_at)->format('g:i A') }}</small>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.profile', $transaction->id) }}" class="action-btn view" title="View Profile">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.send-user-mail', $transaction->id) }}" class="action-btn email" title="Send Email">
                                    <i class="bi bi-envelope"></i>
                                </a>
                                <form action="{{ route('admin.delete', $transaction->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete" title="Delete User" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="empty-state-title">No users found</div>
                                <div class="empty-state-text">There are no registered users yet.</div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.footer')
