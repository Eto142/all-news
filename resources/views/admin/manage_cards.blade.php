@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Cards</span>
        </nav>
        <h1 class="page-title">Manage Cards</h1>
        <p class="page-subtitle">View and manage user payment cards</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn-admin btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>
</div>

<!-- Cards Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">
            <i class="bi bi-credit-card-2-front-fill"></i>
            Card History
        </h3>
        <span style="color: var(--admin-text-muted); font-size: 14px;">
            {{ count($user_cards) }} cards found
        </span>
    </div>
    
    <div class="admin-card-body" style="padding: 0;">
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Card Number</th>
                        <th>CVC</th>
                        <th>Expiry</th>
                        <th>Email</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user_cards as $card)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div class="stat-icon" style="width: 36px; height: 36px; border-radius: 8px;">
                                    <i class="bi bi-credit-card-fill" style="font-size: 16px;"></i>
                                </div>
                                <span style="font-family: monospace; letter-spacing: 1px;">**** **** **** {{ substr($card->card_number, -4) }}</span>
                            </div>
                        </td>
                        <td>
                            <span style="font-family: monospace;">{{ $card->card_cvc }}</span>
                        </td>
                        <td>
                            <span style="font-family: monospace;">{{ $card->card_expiry }}</span>
                        </td>
                        <td>
                            <span class="user-email" style="max-width: 180px; display: block;">{{ $card->email }}</span>
                        </td>
                        <td>
                            <div>{{ \Carbon\Carbon::parse($card->created_at)->format('M j, Y') }}</div>
                            <small style="color: var(--admin-text-muted);">{{ \Carbon\Carbon::parse($card->created_at)->format('g:i A') }}</small>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                                <div class="empty-state-title">No cards found</div>
                                <div class="empty-state-text">There are no saved cards yet.</div>
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
