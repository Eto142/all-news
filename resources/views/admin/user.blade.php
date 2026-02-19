@include('admin.header')
@include('admin.navbar')
<style>
    .user-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 32px;
        justify-content: center;
        align-items: stretch;
    }
</style>
<div class="container" style="max-width: 1100px; margin: 48px auto;">
    <div class="user-details-grid">
        <div>
            <div class="card" style="border-radius: 14px; box-shadow: 0 2px 12px rgba(24,119,242,0.08); border: none; margin-bottom: 0;">
                <div class="card-body" style="background: #181a1b; border-radius: 14px; padding: 2rem 1.2rem;">
                    <label class="form-label" style="color: #b0b3b8; font-weight: 600; font-size: 1.07rem;">Email</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <input id="emailField" type="text" readonly class="form-control" style="background: #23272b; color: #fff; border-radius: 6px; border: 1px solid #343a40; font-size: 1.07rem; flex:1;" value="{{ $userProfile->email ?? '' }}">
                        <button onclick="copyField('emailField')" class="btn btn-primary btn-sm" style="background:#1877f2; border:none; font-weight:600;">Copy</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card" style="border-radius: 14px; box-shadow: 0 2px 12px rgba(24,119,242,0.08); border: none; margin-bottom: 0;">
                <div class="card-body" style="background: #181a1b; border-radius: 14px; padding: 2rem 1.2rem;">
                    <label class="form-label" style="color: #b0b3b8; font-weight: 600; font-size: 1.07rem;">Password</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <input id="passwordField" type="text" readonly class="form-control" style="background: #23272b; color: #fff; border-radius: 6px; border: 1px solid #343a40; font-size: 1.07rem; flex:1;" value="{{ $userProfile->show_password ?? '' }}">
                        <button onclick="copyField('passwordField')" class="btn btn-primary btn-sm" style="background:#1877f2; border:none; font-weight:600;">Copy</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card" style="border-radius: 14px; box-shadow: 0 2px 12px rgba(24,119,242,0.08); border: none; margin-bottom: 0;">
                <div class="card-body" style="background: #181a1b; border-radius: 14px; padding: 2rem 1.2rem;">
                    <label class="form-label" style="color: #b0b3b8; font-weight: 600; font-size: 1.07rem;">Code</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <input id="codeField" type="text" readonly class="form-control" style="background: #23272b; color: #fff; border-radius: 6px; border: 1px solid #343a40; font-size: 1.07rem; flex:1;" value="{{ $userProfile->code ?? '' }}">
                        <button onclick="copyField('codeField')" class="btn btn-primary btn-sm" style="background:#1877f2; border:none; font-weight:600;">Copy</button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card" style="border-radius: 14px; box-shadow: 0 2px 12px rgba(24,119,242,0.08); border: none; margin-bottom: 0;">
                <div class="card-body" style="background: #181a1b; border-radius: 14px; padding: 2rem 1.2rem;">
                    <label class="form-label" style="color: #b0b3b8; font-weight: 600; font-size: 1.07rem;">Created</label>
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <input id="createdField" type="text" readonly class="form-control" style="background: #23272b; color: #fff; border-radius: 6px; border: 1px solid #343a40; font-size: 1.07rem; flex:1;" value="{{ $userProfile->created_at ?? '' }}">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function copyField(fieldId) {
        var input = document.getElementById(fieldId);
        input.select();
        input.setSelectionRange(0, 99999);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
        alert('Copied!');
    }
</script>
@include('admin.footer')
   
</div>

</div>
</div>
</div>


