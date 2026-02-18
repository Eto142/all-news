@include('admin.header')
@include('admin.navbar')
<main class="admin-main-content">
    <div class="admin-card">
        <h2 class="admin-card-title mb-4">Manage Chats</h2>
        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Last Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ optional($user->supports->first())->message ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.support.chat', $user->id) }}" class="btn-admin btn-admin-sm btn-admin-primary">View Chat</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No chats found.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@include('admin.footer')
