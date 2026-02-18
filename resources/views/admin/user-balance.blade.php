@include('admin.header')
@include('admin.navbar')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">User Balance</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('admin.user.balance.update', $user->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Wallet Balance</label>
                            <input type="number" step="0.01" name="wallet_balance" class="form-control" value="{{ $balance->wallet_balance ?? '0.00' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Investment Balance</label>
                            <input type="number" step="0.01" name="investment_balance" class="form-control" value="{{ $balance->investment_balance ?? '0.00' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Balances</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
