@include('admin.header')
@include('admin.navbar')



<div style="max-width:500px;margin:40px auto;background:#fff;padding:32px 24px;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.1);text-align:center;">
    <h2>Share Link Generated</h2>
    <div style="display:flex;align-items:center;gap:8px;margin-bottom:16px;">
        <input id="share-link-input" type="text" value="{{ $link }}" readonly style="flex:1;padding:10px;">
        <button onclick="copyShareLink()" style="padding:10px 16px;background:#1877f2;color:#fff;border:none;border-radius:4px;cursor:pointer;font-weight:bold;">Copy</button>
    </div>
    <a href="#" onclick="showLoginMessage(event)" style="color:#1877f2;font-weight:bold;">Open Link</a>
    <div id="login-message" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.5);z-index:9999;justify-content:center;align-items:center;">
        <div style="background:#fff;padding:32px 40px;border-radius:10px;box-shadow:0 2px 16px rgba(0,0,0,0.13);font-size:20px;font-weight:bold;text-align:center;">
            Oops, login to continue...<br><br>
            <span style="font-size:16px;font-weight:normal;">Redirecting to login page</span>
        </div>
    </div>
</div>

<script>
    function showLoginMessage(e) {
        e.preventDefault();
        var msg = document.getElementById('login-message');
        if (msg) {
            msg.style.display = 'flex';
            setTimeout(function() {
                window.open("{{ $link }}", "_blank");
                msg.style.display = 'none';
            }, 1500);
        } else {
            window.open("{{ $link }}", "_blank");
        }
    }
    function copyShareLink() {
        var input = document.getElementById('share-link-input');
        input.select();
        input.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand('copy');
        alert('Link copied to clipboard!');
    }
</script>
@include('admin.footer')


