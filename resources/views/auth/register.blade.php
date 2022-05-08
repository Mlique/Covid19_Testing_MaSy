@csrf

<div id="signup" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog tem-doc" role="document">
        <div class="modal-content temp-model">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5> <br>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal-body">
               
                <form action="{{ route('auth.register') }}" method="POST" id="register_form">
                    @csrf

                    <div class="row form-ro">
                        <input placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror"
                            type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                    </div>
                    <div class="row form-ro">
                        <input placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror"
                            type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                    </div>
                    <div class="row form-ro">
                        <input placeholder="Email" class="form-control @error('email') is-invalid @enderror" type="text"
                            name="email" value="{{ old('email') }}">
                    </div>
                    <div class="row form-ro">
                        <input placeholder="Password" class="form-control @error('password') is-invalid @enderror"
                            type="password" name="password">
                    </div>
                    <div class="row form-ro">
                        <input placeholder="Verify password"
                            class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                            name="password_confirmation">
                    </div>
                    <div class="row form-ro">
                        <input type="submit" value="Register" class="btn btn-success">
                    </div>


                </form>
                <div class="text-center text-secondary">
                    <div>Already have an account? <a onclick="userlogin()" class="text-decoration-underline">Login
                            Here</a></div>
                </div>
            </div>
            <div class="modal-footer">
                <p>Sign up with social media</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                        class="fab fa-facebook-f"></i></button>
                <button type="button" class="btn btn-danger"><i class="fab fa-google-plus-g"></i></button>
                <button type="button" class="btn btn-info"><i class="fab fa-twitter"></i></button>
            </div>
        </div>
    </div>
</div>
