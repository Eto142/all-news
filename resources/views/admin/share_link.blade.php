@include('admin.header')
@include('admin.navbar')



<div style="max-width:500px;margin:40px auto;background:#fff;padding:32px 24px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
    <h2>Share Link Generated</h2>
    <input type="text" value="{{ $link }}" readonly style="width:100%;padding:10px;margin-bottom:16px;">
    <a href="{{ $link }}" target="_blank" style="color:#1877f2;font-weight:bold;">Open Link</a>
</div>
@include('admin.footer')


