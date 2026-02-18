<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4 shadow" style="width: 380px;">
        <h4 class="mb-3 text-center">Admin Login</h4>

        <form method="POST">
            @csrf
            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            <div style="position:relative;">
                <input type="password" name="password" id="login_password" class="form-control mb-3" placeholder="Password" required style="padding-right:40px;">
                <span class="toggle-password" toggle="#login_password" style="position:absolute;top:10px;right:15px;cursor:pointer;z-index:2;">
                    <i class="bi bi-eye-slash" id="eye_login_password"></i>
                </span>
            </div>
            <button class="btn btn-dark w-100">Login</button>
        </form>
    </div>
</div>

<!-- Bootstrap Icons loaded via CSS above -->
<script>
    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            var input = document.querySelector(this.getAttribute('toggle'));
            var icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        });
    });
</script>
</body>
</html>
