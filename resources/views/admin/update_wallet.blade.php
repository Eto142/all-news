@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Update Wallet</span>
        </nav>
        <h1 class="page-title">Update Wallet</h1>
        <p class="page-subtitle">Manage cryptocurrency wallet addresses</p>
    </div>
</div>

<!-- Wallet Selection Form -->
<div style="max-width: 500px;">
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title">
                <i class="bi bi-wallet2"></i>
                Select Wallet to Update
            </h3>
        </div>
        
        <div class="admin-card-body">
            <form action="{{ route('admin.choose.wallet') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Select Wallet Type</label>
                    <select class="form-select" name="method">
                        <option value="usdt">USDT (Tether)</option>
                        <option value="btc">Bitcoin</option>
                        <option value="eth">Ethereum</option>
                    </select>
                </div>

                <button type="submit" class="btn-admin btn-admin-primary w-100">
                    <i class="bi bi-arrow-right"></i>
                    Update Selected Wallet
                </button>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')
