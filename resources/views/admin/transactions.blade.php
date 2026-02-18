@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Transactions</span>
        </nav>
        <h1 class="page-title">Manage Transactions</h1>
        <p class="page-subtitle">View and manage all user transactions</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn-admin btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>
    </div>
</div>

<!-- Transactions Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title">
            <i class="bi bi-arrow-left-right"></i>
            Transaction History
        </h3>
        <span style="color: var(--admin-text-muted); font-size: 14px;">
            {{ count($user_transactions) }} transactions found
        </span>
    </div>
    
    <div class="admin-card-body" style="padding: 0;">
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($user_transactions as $transaction)
                    <tr>
                        <td>
                            <span style="font-family: monospace; font-size: 13px;">{{ $transaction->transaction_ref }}</span>
                        </td>
                        <td>
                            <span class="status-badge" style="background: rgba(99, 102, 241, 0.15); color: var(--admin-primary);">
                                {{ $transaction->transaction_type }}
                            </span>
                        </td>
                        <td style="max-width: 200px;">{{ $transaction->transaction_description }}</td>
                        <td>
                            <strong>{{ number_format($transaction->transaction_amount, 2) }}</strong>
                        </td>
                        <td>
                            @if($transaction->transaction_status == '1')
                                <span class="status-badge active">Completed</span>
                            @elseif($transaction->transaction_status == '0')
                                <span class="status-badge pending">Pending</span>
                            @elseif($transaction->transaction_status == '2')
                                <span class="status-badge inactive">Failed</span>
                            @endif
                        </td>
                        <td>
                            <div>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M j, Y') }}</div>
                            <small style="color: var(--admin-text-muted);">{{ \Carbon\Carbon::parse($transaction->created_at)->format('g:i A') }}</small>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="bi bi-arrow-left-right"></i>
                                </div>
                                <div class="empty-state-title">No transactions found</div>
                                <div class="empty-state-text">There are no transactions yet.</div>
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
