<div>
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input wire:model='email' type="email" class="form-control @error('email') is-invalid @enderror "
                aria-describedby="emailHelp">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input wire:model='password' type="password" class="form-control @error('email') is-invalid @enderror">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="modal-footer">
            <button wire:click='resetForm' type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">Close</button>
            <button wire:click.prevent='Login' type="button" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>