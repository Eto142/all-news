@include('admin.header')
@include('admin.navbar')

<div class="container-fluid px-2 px-md-4 mt-5">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
        <h2 class="mb-0 fw-bold text-primary">Membership Upgrade Requests</h2>
        @if(session('status'))
            <div class="alert alert-success mb-0 px-4 py-2">{{ session('status') }}</div>
        @endif
    </div>
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>User</th>
                            <th class="d-none d-sm-table-cell">Previous</th>
                            <th>Requested</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Requested At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($upgrades as $upgrade)
                            <tr>
                                <td>
                                    <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-2">
                                        <span class="fw-semibold">{{ $upgrade->user->first_name ?? 'N/A' }} {{ $upgrade->user->last_name ?? '' }}</span>
                                        <span class="badge bg-secondary d-inline d-sm-none">{{ $upgrade->previous_membership ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="d-none d-sm-table-cell">{{ $upgrade->previous_membership ?? '-' }}</td>
                                <td><span class="fw-semibold text-primary">{{ $upgrade->new_membership }}</span></td>
                                <td><span class="text-success">${{ number_format($upgrade->amount, 2) }}</span></td>
                                <td>
                                    @if($upgrade->status == 1)
                                        <span class="badge bg-success">Approved</span>
                                    @elseif($upgrade->status == 0)
                                        <span class="badge bg-warning">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td class="d-none d-md-table-cell">{{ $upgrade->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    @if($upgrade->status == 0)
                                    <div class="d-flex gap-2 flex-wrap">
                                        <form method="POST" action="{{ route('admin.upgrades.approve', $upgrade->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-admin btn-admin-success btn-admin-sm px-3"><i class="bi bi-check-circle"></i> Approve</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.upgrades.reject', $upgrade->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-admin btn-admin-danger btn-admin-sm px-3"><i class="bi bi-x-circle"></i> Reject</button>
                                        </form>
                                    </div>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">No upgrade requests found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4 px-3 pb-3 d-flex justify-content-center justify-content-md-end">
                {{ $upgrades->links() }}
            </div>
        </div>
    </div>
</div>

@include('admin.footer')