<div class="container">
    <div class="row justify-content-center" style="padding: 10rem 0 0 0">
        <div class="col-md-4">
            <div class="card border border-2 border-info">
                <h4 class="card-header bg-info text-center">
                    <i class="bi bi-file-lock"></i>
                    <span class="fs-5">User Login</span>
                </h4>
                <form action="{{ route('login.request') }}" method="POST" class="card-body">
                    @csrf
                    <div class="form-group mb-2 position-relative">
                        <span class="position-absolute bg-light @error('email') text-danger border border-danger border-end-0 @else text-muted @enderror px-2 rounded h-100 py-1 rounded-end-0"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror ps-5" placeholder="Email Address">
                    </div>
                    <div class="form-group mb-2  position-relative">
                        <span class="position-absolute bg-light @error('password') text-danger border border-danger border-end-0 @else text-muted @enderror px-2 rounded h-100 py-1 rounded-end-0"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror ps-5" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-sm btn-info text-light w-100 fs-5">Login</button>
                    <hr>
                    <a href="{{ route('register.page') }}" class="btn btn-primary btn-sm w-100 fs-5 text-light">Create a
                        new Account?</a>
                </form>
            </div>
        </div>
    </div>
</div>
