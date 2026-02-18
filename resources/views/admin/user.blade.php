<style>
    .card {
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        margin-bottom: 20px;
        border-radius: 12px;
        border: none;
    }
    .avatar-xl {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        border: 2px solid #e9ecef;
    }
    .avatar-xl img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .profile-header h5 {
        font-size: 1.05rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 0.1rem;
    }
    .profile-header p {
        color: #b0b3b8;
        font-size: 0.92rem;
        margin-bottom: 0.4rem;
    }
    .profile-header .d-flex .btn {
        font-size: 0.95rem;
        padding: 0.4rem 1.1rem;
        border-radius: 6px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.03);
        font-weight: 500;
    }
    .profile-header .d-flex .btn i {
        margin-right: 0.3rem;
    }
    .nav-tabs-custom .nav-link {
        font-size: 0.98rem;
        font-weight: 500;
        color: #b0b3b8;
        border: none;
        background: none;
        border-bottom: 2px solid transparent;
        transition: color 0.2s, border-color 0.2s;
        padding: 0.5rem 1rem;
    }
    .nav-tabs-custom .nav-link.active {
        color: #0d6efd;
        border-bottom: 2px solid #0d6efd;
        background: none;
    }
    .card-header {
        background: #181a1b;
        border-bottom: 1px solid #23272b;
        border-radius: 12px 12px 0 0;
        padding: 0.7rem 1.2rem;
    }
    .card-title {
        color: #fff;
        font-size: 1.02rem;
        font-weight: 600;
    }
    .form-label {
        color: #b0b3b8;
        font-weight: 500;
        font-size: 0.97rem;
    }
    .form-control {
        background: #23272b;
        color: #fff;
        border-radius: 6px;
        border: 1px solid #343a40;
        font-size: 0.97rem;
        padding: 0.5rem 0.8rem;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.13rem rgba(13,110,253,.12);
    }
    .btn-primary, .btn-success, .btn-danger, .btn-secondary {
        font-size: 0.97rem;
        border-radius: 6px;
        font-weight: 500;
        padding: 0.45rem 1.1rem;
    }
    .btn-primary {
        background: #0d6efd;
        border: none;
    }
    .btn-success {
        background: #28a745;
        border: none;
    }
    .btn-danger {
        background: #dc3545;
        border: none;
    }
    .btn-secondary {
        background: #6c757d;
        border: none;
    }
    .btn:focus {
        box-shadow: 0 0 0 0.13rem rgba(13,110,253,.12);
    }
    .table {
        background: #23272b;
        color: #fff;
        border-radius: 6px;
        font-size: 0.95rem;
    }
    .table th, .table td {
        border-color: #343a40;
        vertical-align: middle;
        padding: 0.5rem 0.7rem;
    }
    .table thead th {
        color: #b0b3b8;
        font-weight: 600;
        background: #181a1b;
        font-size: 0.97rem;
    }
    .table-responsive {
        border-radius: 6px;
    }
    .card-body {
        background: #181a1b;
        border-radius: 0 0 12px 12px;
        padding: 1.1rem 1.2rem;
    }
    .card {
        background: #23272b;
    }
    .page-title-box h4 {
        color: #fff;
        font-weight: 700;
        font-size: 1.1rem;
    }
    .row > [class^='col-'] {
        margin-bottom: 0.7rem;
    }
    .minw-btn {
        min-width: 110px;
        padding-left: 0.7rem !important;
        padding-right: 0.7rem !important;
        font-size: 0.92rem !important;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>


@include('admin.header')
@include('admin.navbar')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Profile</h4>
        </div>
    </div>
</div>

 <!-- Remove button from card -->
            <!-- Update Balances Button at Top Right -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-primary btn-sm" style="background:#0d6efd; color:#fff; font-weight:600; border-radius:6px; min-width:140px;" data-bs-toggle="modal" data-bs-target="#balanceModal">
                    <i class="bx bx-edit"></i> Update Balances
                </button>
            </div>

<div class="row mb-4 align-items-center">
    <div class="col-6">
        <div class="card bg-dark text-white h-100" style="min-height: 110px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <h5 class="card-title mb-2">Wallet Balance</h5>
                <div class="display-6 fw-bold">${{ $balance->wallet_balance ?? '0.00' }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 position-relative">
        <div class="card bg-primary text-white h-100" style="min-height: 110px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <h5 class="card-title mb-2">Investment Balance</h5>
                <div class="display-6 fw-bold">${{ $balance->investment_balance ?? '0.00' }}</div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal for updating balances -->
<div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="balanceModalLabel">Update Balances</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{ route('admin.update.balances', $userProfile->id) }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Wallet Balance</label>
            <input type="number" step="0.01" name="wallet_balance" class="form-control" value="{{ $balance->wallet_balance ?? '' }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Investment Balance</label>
            <input type="number" step="0.01" name="investment_balance" class="form-control" value="{{ $balance->investment_balance ?? '' }}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row" style="margin-top:-40px!important; margin-bottom:0!important; padding-top:0!important;">
<div class="col-xl-12 col-lg-12">

<!-- ================= PROFILE HEADER CARD ================= -->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm">
                <div class="d-flex align-items-start mt-3">

                    <div class="flex-shrink-0">
                        <div class="avatar-xl me-3">
                            <img src="{{ asset('uploads/display/' . ($userProfile->display_picture ?? 'avatar.jpg')) }}"
                                 class="img-fluid rounded-circle d-block">
                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <h5 class="font-size-16 mb-1">
                            {{$userProfile->first_name}} {{$userProfile->last_name}}
                        </h5>
                        <p class="text-muted font-size-13">
                            {{$userProfile->email}}
                        </p>

                        <div class="d-flex flex-wrap gap-2">
                            <form action="{{ route('admin.delete',$userProfile->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this account?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm waves-effect btn-label waves-light minw-btn">
                                    <i class="bx bx-trash-alt label-icon"></i>
                                    Delete Account
                                </button>
                            </form>

                            <a href="{{ route('admin.impersonate', $userProfile->id) }}"
                               class="btn btn-success btn-sm waves-effect btn-label waves-light minw-btn">
                                <i class="bx bx-user-check label-icon"></i>
                                Access Account
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#overview">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#activities">Activities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#security">Security</a>
            </li>
        </ul>

    </div>
</div>

<!-- ================= TAB CONTENT ================= -->
<div class="tab-content">

<!-- Success Alert for Activities -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 1rem;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- ================= PROFILE TAB ================= -->
<div class="tab-pane active" id="overview">
<div class="card">
<div class="card-header">
    <h5 class="card-title mb-0">Profile</h5>
</div>
<div class="card-body">

<form action="{{ route('admin.update.user',$userProfile->id) }}" method="POST">
@csrf

<div class="row">

<div class="col-md-6 mb-3">
    <label class="form-label">First Name</label>
    <input type="text" name="first_name"
           class="form-control"
           value="{{$userProfile->first_name}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Last Name</label>
    <input type="text" name="last_name"
           class="form-control"
           value="{{$userProfile->last_name}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email"
           class="form-control"
           value="{{$userProfile->email}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Country</label>
    <input type="text" name="country"
           class="form-control"
           value="{{$userProfile->country}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">City</label>
    <input type="text" name="city"
           class="form-control"
           value="{{$userProfile->city}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Postal Code</label>
    <input type="text" name="postal_code"
           class="form-control"
           value="{{$userProfile->postal_code}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Address</label>
    <input type="text" name="address"
           class="form-control"
           value="{{$userProfile->address}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">USC Code</label>
    <input type="text" name="usc_code"
           class="form-control"
           value="{{$userProfile->usc_code}}">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Membership Plan</label>
    <select class="form-control" name="memplan" required>
        <option value="regular" {{ (isset($userProfile->memplan) && $userProfile->memplan == 'regular') ? 'selected' : '' }}>Current Plan - regular</option>
        <option value="regular">Regular</option>
        <option value="silver" {{ (isset($userProfile->memplan) && $userProfile->memplan == 'silver') ? 'selected' : '' }}>Silver</option>
        <option value="gold" {{ (isset($userProfile->memplan) && $userProfile->memplan == 'gold') ? 'selected' : '' }}>Gold</option>
        <option value="platinum" {{ (isset($userProfile->memplan) && $userProfile->memplan == 'platinum') ? 'selected' : '' }}>Platinum</option>
    </select>
</div>
<div class="col-md-6 mb-3">
    <label class="form-label text-success">Wallet Balance</label>
    <input type="number" name="walletbalu" class="form-control" value="{{ $balance->wallet_balance ?? '' }}">
</div>
<div class="col-md-6 mb-3">
    <label class="form-label text-success">Investment Balance</label>
    <input type="number" name="profitbalu" class="form-control" value="{{ $balance->investment_balance ?? '' }}">
</div>

<div class="col-12 mt-3">
    <button class="btn btn-primary waves-effect waves-light">
        Update Profile Details
    </button>
</div>

</div>
</form>

</div>
</div>
</div>

<!-- ================= SECURITY TAB ================= -->
<div class="tab-pane" id="security">
<div class="card">
<div class="card-header">
    <h5 class="card-title mb-0">Security</h5>
</div>
<div class="card-body">

<form action="{{ route('admin.update.user.password',$userProfile->id) }}" method="POST">
@csrf

<div class="row">

<div class="col-md-6 mb-3">
    <label class="form-label">Old Password</label>
    <input type="text" name="old_password" class="form-control" value="{{ $userProfile->plain_password ?? '' }}" readonly>
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">New Password</label>
    <input type="password" name="new_password" class="form-control">
</div>

<div class="col-md-6 mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" name="confirm_password" class="form-control">
</div>

<div class="col-12 mt-3">
    <button class="btn btn-secondary waves-effect waves-light">
        Update Password
    </button>
</div>

</div>
</form>

</div>
</div>
</div>

<!-- ================= ACTIVITIES TAB ================= -->
<div class="tab-pane" id="activities">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">New Activity</h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('admin.user.activities.store', $userProfile->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" value="" required class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <input type="text" name="status" value="" required class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Time</label>
                        <input type="text" name="time" required value="" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Type</label>
                        <select class="form-control" name="type" required>
                            <option value="null">Null</option>
                            <option value="inflow">Inflow</option>
                            <option value="outflow">Outflow</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-md">Add Activity</button>
                </div>
            </form>
            <div class="mt-4">
                <div class="table-responsive px-3" data-simplebar>
                    <table class="table nowrap w-100">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date/Time</th>
                                <th>Type</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(App\Models\Activity::where('user_id', $userProfile->id)->latest()->get() as $activity)
                            <tr>
                                <td style="font-size: 14px;" class="font-w400">
                                    <span id="desc-{{ $activity->id }}">{{ $activity->description }}</span>
                                </td>
                                <td style="font-size: 14px;" class="font-w400">
                                    <span id="status-{{ $activity->id }}">{{ $activity->status }}</span>
                                </td>
                                <td style="font-size: 14px;" class="font-w400">
                                    <span id="time-{{ $activity->id }}">{{ $activity->time }}</span>
                                </td>
                                <td style="font-size: 14px;" class="font-w400">
                                    <span id="type-{{ $activity->id }}">{{ ucfirst($activity->type) }}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" onclick="openEditActivity({{ $activity->id }})">Edit</button>
                                    <form action="{{ route('admin.activity.delete', $activity->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-rounded btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <!-- Edit Activity Modal -->
                        <div id="editActivityModal" class="modal fade" tabindex="-1" aria-labelledby="editActivityModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editActivityModalLabel">Edit Activity</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="editActivityForm">
                                        <div class="modal-body">
                                            <input type="hidden" id="editActivityId">
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <input type="text" id="editActivityDesc" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <input type="text" id="editActivityStatus" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Time</label>
                                                <input type="text" id="editActivityTime" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Type</label>
                                                <input type="text" id="editActivityType" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            function openEditActivity(id) {
                                document.getElementById('editActivityId').value = id;
                                document.getElementById('editActivityDesc').value = document.getElementById('desc-' + id).textContent;
                                document.getElementById('editActivityStatus').value = document.getElementById('status-' + id).textContent;
                                document.getElementById('editActivityTime').value = document.getElementById('time-' + id).textContent;
                                document.getElementById('editActivityType').value = document.getElementById('type-' + id).textContent;
                                var modal = new bootstrap.Modal(document.getElementById('editActivityModal'));
                                modal.show();
                            }
                            document.getElementById('editActivityForm').onsubmit = async function(e) {
                                e.preventDefault();
                                const id = document.getElementById('editActivityId').value;
                                const desc = document.getElementById('editActivityDesc').value;
                                const status = document.getElementById('editActivityStatus').value;
                                const time = document.getElementById('editActivityTime').value;
                                const type = document.getElementById('editActivityType').value;
                                const resp = await fetch('/admin/activity/' + id + '/edit', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({ description: desc, status: status, time: time, type: type })
                                });
                                if (resp.ok) {
                                    document.getElementById('desc-' + id).textContent = desc;
                                    document.getElementById('status-' + id).textContent = status;
                                    document.getElementById('time-' + id).textContent = time;
                                    document.getElementById('type-' + id).textContent = type;
                                    var modal = bootstrap.Modal.getInstance(document.getElementById('editActivityModal'));
                                    modal.hide();
                                } else {
                                    alert('Failed to update activity.');
                                }
                            };
                        </script>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>


@include('admin.footer')