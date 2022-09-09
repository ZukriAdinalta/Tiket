<!-- Navbar -->
<nav style="height: 80px"
  class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 {{ Request::is('/') ? 'mb-2' : 'mb-5' }}  bg-white rounded ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fad fa-ticket"></i>TiketAja</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        @if (auth()->user())
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/dashboard">Dashboard</a>
        </li>
        @endif
      </ul>
      <div class="d-flex">
        @if (auth()->user())
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#logoutModal"
          type="button">Logout</button>
        @else
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Login"
          type="button">Login</button>
        @endif
      </div>
    </div>
  </div>
</nav>
<!-- Navbar -->
<!-- Logout Modal-->

<div class="modal" id="logoutModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-body">Yakin Mau Keluar {{ auth()->user() ? auth()->user()->name : '' }} ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <livewire:logout>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login -->
<div class="modal fade" id="Login" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <livewire:frontend.login>
      </div>
    </div>
  </div>
</div>