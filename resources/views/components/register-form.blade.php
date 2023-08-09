<div class="container">
    <div class="row justify-content-center" style="padding: 7rem 0 0 0">
        <div class="col-md-4">
            <div class="card border border-2 border-info">
                <h4 class="card-header bg-info text-center">
                    <i class="bi bi-person-square"></i>
                    <span class="fs-5">User Register</span>
                </h4>
                <form action="{{ route('register.request') }}" class="card-body" method="POST">
                    @csrf
                    <div class="form-group mb-2 position-relative">
                        <span class="position-absolute bg-light @error('name') text-danger border border-danger border-end-0 @else text-muted @enderror px-2 rounded h-100 py-1 rounded-end-0"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" class="form-control ps-5 @error('name') is-invalid @enderror" placeholder="Your Full Name">
                    </div>
                    <div class="form-group mb-2 position-relative">
                        <span class="position-absolute bg-light @error('email') text-danger border border-danger border-end-0 @else text-muted @enderror px-2 rounded h-100 py-1 rounded-end-0"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control ps-5 @error('email') is-invalid @enderror" placeholder="Email Address">                    
                    </div>
                    <div class="form-group mb-2 position-relative">
                        <span class="position-absolute bg-light @error('password') text-danger border border-danger border-end-0 @else text-muted @enderror px-2 rounded h-100 py-1 rounded-end-0"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control ps-5 @error('password') is-invalid @enderror" placeholder="Password">                    
                    </div>
                    <div class="form-group mb-2 position-relative">
                        <span class="position-absolute bg-light @error('password_confirmation') text-danger border border-danger border-end-0 @else text-muted @enderror px-2 rounded h-100 py-1 rounded-end-0"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password_confirmation" class="form-control ps-5 @error('password_confirmation') is-invalid @enderror" placeholder="Password Confirmation">                    
                    </div>
                    <button type="submit" class="btn btn-sm btn-info text-light w-100 fs-5">Register</button>
                    <hr>
                    <a href="{{ route('login.page') }}" class="btn btn-primary btn-sm w-100 fs-5 text-light">Already
                        have an Account?</a>
                </form>
            </div>
        </div>
    </div>
</div>
