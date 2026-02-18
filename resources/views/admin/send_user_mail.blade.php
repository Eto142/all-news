@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Send Email</span>
        </nav>
        <h1 class="page-title">Send Email</h1>
        <p class="page-subtitle">Send a custom email to a user</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn-admin btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>
</div>

<!-- Send Email Form -->
<div style="max-width: 700px;">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">
                <i class="bi bi-envelope-fill"></i>
                Compose Email
            </h3>
        </div>
        
        <div class="admin-card-body">
            <form action="{{ route('admin.send-user-email') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Recipient Email</label>
                    <input type="email" name="email" class="form-input" value="{{ $userEmail }}" placeholder="Enter recipient email" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-input" placeholder="Enter email subject" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-textarea" rows="8" placeholder="Enter your message here..." required></textarea>
                </div>

                <button type="submit" class="btn-admin btn-admin-primary w-100">
                    <i class="bi bi-send-fill"></i>
                    Send Email
                </button>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')
