<div class="container-fluid d-flex justify-content-center align-items-center p-4" style="height: 100vh;">
    <div class="row w-75 justify-content-between align-items-center gap-1 border m-5 h-100">
        <!-- Left Image Section -->
        <div class="col-lg-6 d-none d-lg-block p-0" style="height: 100%; background-image: url('{{asset('assets/images/3399811.jpg')}}'); background-size: cover; background-position: center;">
        </div>

        <!-- Right Form Section -->
        <div class="col-lg-5 col-12 p-0">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title text-center mt-3 mb-4">Welcome Back 👋</h5>

                    <form class="px-5 py-1" wire:submit.prevent="login">
                        <!-- Email Input -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email" id="email" wire:model="email">
                            @error("email")
                                <div class="w-100 bg-danger rounded mb-0" style="height: 3px"></div>
                                <p class="text-danger mb-0">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" id="password" wire:model="password">
                            @error("password")
                                <div class="w-100 bg-danger rounded mb-0" style="height: 3px"></div>
                                <p class="text-danger mb-0">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Remember Me and Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" wire:model="remember_me">
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                            <div><a href="/forgetpassword">Forget Password?</a></div>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-purple w-100 mt-4">
                            <span wire:loading.delay wire:target='login'>
                                Loading...
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </span>
                            <span wire:loading.remove>Login</span>
                        </button>
                    </form>

                    <!-- Divider -->
                    <hr>

                    <!-- Social Login Buttons -->
                    <div class="text-center mt-3">
                        <p>Or sign In with</p>
                        <button class="btn btn-outline-danger mr-2"><i class="fab fa-google"></i> Google</button>
                        <button class="btn btn-outline-primary"><i class="fab fa-microsoft"></i> Microsoft</button>
                    </div>

                    <!-- Sign Up Link -->
                    <p class="text-center mt-3 mb-0">Don’t have an account? <a href="/signup">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
