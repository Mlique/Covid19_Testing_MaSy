@csrf
<div id="login" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog tem-doc" role="document">
        <div class="modal-content temp-model">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5> <br>
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
                <form action="{{ route('login') }}" method="POST" id="login_form">
                    @csrf
                    <div class="row form-ro">
                        <input placeholder="Email" class="form-control @error('email') is-invalid @enderror" type="text"
                            name="email">
                    </div>
                    <div class="row form-ro">
                        <input placeholder="Password" class="form-control @error('password') is-invalid @enderror"
                            type="password" name="password">
                    </div>
                    <div class="row form-ro">
                        <button class="btn btn-success">Login</button>
                    </div>
                    <div class="text-center text-primary">
                        <div class="mb-2"><a onclick="resetpassw()" class="text-decoration-underline">Forgot
                                Password? </a></div>
                    </div>
                </form>
                <div class="row form-ro">
                    <button onclick="signup()" class="btn btn-danger">Don't have an account? Sign Up</button>
                </div>
            </div>

            <div class="modal-footer">
                <p>Sign Up with social media</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                        class="fab fa-facebook-f"></i></button>
                <button type="button" class="btn btn-danger"><i class="fab fa-google-plus-g"></i></button>
                <button type="button" class="btn btn-info"><i class="fab fa-twitter"></i></button>
            </div>
        </div>
    </div>
</div>
