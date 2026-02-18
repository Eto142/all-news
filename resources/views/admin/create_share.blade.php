@include('admin.header')
@include('admin.navbar')

<!-- Page Header -->
<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Create Facebook Share</span>
        </nav>
        <h1 class="page-title">Create Facebook Share</h1>
        <p class="page-subtitle">Generate a Facebook-style share post link</p>
    </div>
</div>

<style>
    .share-flex-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-start;
        gap: 32px;
        margin: 0 auto 40px auto;
        max-width: 1200px;
        width: 100%;
    }
    .share-form-col, .share-history-col {
        flex: 1 1 420px;
        min-width: 380px;
        max-width: 520px;
    }
    @media (max-width: 1100px) {
        .share-flex-container {
            flex-direction: column;
            align-items: center;
        }
        .share-form-col, .share-history-col {
            max-width: 700px;
            min-width: 0;
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
                                <td style="padding:8px 6px;">
                                    <a href="{{ url('/facebook/share/r/'.$item->token.'?mibextid=wwXIfr') }}" target="_blank" style="color:#1877f2;">Open</a>
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

@include('admin.footer')

