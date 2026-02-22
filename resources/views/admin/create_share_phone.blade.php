@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Create Facebook Share for phone number</span>
        </nav>
        <h1 class="page-title">Create Facebook Share for phone number</h1>
        <p class="page-subtitle">Generate a Facebook-style share post link for phone numbers</p>
    </div>
</div>

<style>
    .share-flex-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 32px;
        margin: 0 auto 40px auto;
        max-width: 1200px;
        width: 100%;
    }
    .share-form-col, .share-history-col {
        min-width: 0;
        width: 100%;
    }
    .admin-card {
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(24,119,242,0.08);
        margin-bottom: 24px;
    }
    .admin-card-header {
        padding: 1.1rem 1.2rem;
    }
    .admin-card-body {
        padding: 1.2rem;
    }
    .form-group {
        margin-bottom: 18px;
    }
    .form-label {
        font-weight: 600;
        margin-bottom: 6px;
    }
    .form-input {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #e4e6eb;
        font-size: 1rem;
        margin-bottom: 6px;
    }
    .btn-admin {
        border-radius: 6px;
        font-size: 1rem;
        padding: 10px 18px;
    }
    .w-100 {
        width: 100%;
    }
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.97rem;
    }
    .admin-table th, .admin-table td {
        padding: 8px 6px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }
    .admin-table th {
        background: #f5f6fa;
        font-weight: 600;
    }
    .admin-table img {
        max-width: 60px;
        height: 40px;
        object-fit: cover;
        border-radius: 4px;
    }
    @media (max-width: 900px) {
        .share-flex-container {
            grid-template-columns: 1fr;
        }
        .admin-card {
            margin-bottom: 18px;
        }
    }
    @media (max-width: 600px) {
        .admin-card-header, .admin-card-body {
            padding: 0.7rem 0.5rem;
        }
        .form-input {
            font-size: 0.95rem;
        }
        .admin-table th, .admin-table td {
            padding: 6px 3px;
            font-size: 0.92rem;
        }
        .admin-table img {
            max-width: 40px;
            height: 28px;
        }
    }
</style>

<div class="share-flex-container">
    <div class="share-form-col">
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="admin-card-title">
                    <i class="bi bi-share-fill"></i>
                    Create Facebook Share Post
                </h3>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="{{ route('admin.facebook.share.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="is_phone_share" value="1">
                    <div class="form-group">
                        <label for="imageInput" class="form-label">Image</label>
                        <input type="file" name="image" id="imageInput" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="writeupInput" class="form-label">Writeup</label>
                        <textarea name="writeup" id="writeupInput" rows="4" class="form-input" required></textarea>
                    </div>
                    <button type="submit" class="btn-admin btn-admin-primary w-100" style="margin-top: 8px;">
                        <i class="bi bi-link-45deg"></i>
                        Generate Link
                    </button>
                </form>
            </div>
        </div>
    </div>

    @if(isset($history) && $history->count())
    <div class="share-history-col">
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="admin-card-title">
                    <i class="bi bi-clock-history"></i>
                    Share History
                </h3>
            </div>
            <div class="admin-card-body">
                <div style="overflow-x:auto;">
                    <table style="width:100%;border-collapse:collapse;">
                        <thead>
                            <tr style="background:#f5f6fa;">
                                <th style="padding:8px 6px;text-align:left;">Image</th>
                                <th style="padding:8px 6px;text-align:left;">Writeup</th>
                                <th style="padding:8px 6px;text-align:left;">Link</th>
                                <th style="padding:8px 6px;text-align:left;">Created</th>
                                <th style="padding:8px 6px;text-align:left;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $item)
                            <tr style="border-bottom:1px solid #eee;">
                                <td style="padding:8px 6px;">
                                    <img src="/{{ $item->image }}" alt="img" style="width:60px;height:40px;object-fit:cover;border-radius:4px;">
                                </td>
                                <td style="padding:8px 6px;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $item->writeup }}</td>
                                <td style="padding:8px 6px; display:flex; align-items:center; gap:8px;">
                                    <a href="{{ url('/facebook/share/r/'.$item->token.'?mibextid=wwXIfr') }}" target="_blank" style="color:#1877f2;">Open</a>
                                    <button type="button" onclick="copyShareLink('{{ url('/facebook/share/r/'.$item->token.'?mibextid=wwXIfr') }}')" style="background:#1877f2;color:#fff;border:none;padding:6px 12px;border-radius:4px;cursor:pointer;font-size:0.95rem;">Copy</button>
                                </td>
                                <td style="padding:8px 6px;">{{ $item->created_at->diffForHumans() }}</td>
                                <td style="padding:8px 6px;">
                                    <form method="POST" action="{{ route('admin.facebook.share.destroy', $item->id) }}" onsubmit="return confirm('Delete this share?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:#e74c3c;color:#fff;border:none;padding:6px 12px;border-radius:4px;cursor:pointer;">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    function copyShareLink(link) {
        const tempInput = document.createElement('input');
        tempInput.value = link;
        document.body.appendChild(tempInput);
        tempInput.select();
        tempInput.setSelectionRange(0, 99999);
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        alert('Link copied to clipboard!');
    }
</script>
@include('admin.footer')

