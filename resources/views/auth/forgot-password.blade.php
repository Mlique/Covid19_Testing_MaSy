@csrf
<div id="resetpassw" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog tem-doc" role="document">
        <div class="modal-content temp-model">
            <div class="modal-header">
                <h5 class="modal-title">Password Forgotten</h5> <br>
                <p>Enter your email address and we will send you a link to reset your password. </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="forgot_form">
                    @csrf
                    <div class="row form-ro">
                        <input placeholder="Email" class="form-control" type="text">
                    </div>
                    <div class="row form-ro">
                        <button onclick="resetform()" class="btn btn-success">Reset Password</button>
                    </div>
                    <div class="text-center text-primary">
                        <div class="mb-2">Back to <a href="/login" class="text-decoration-none">Login Page</a>
                        </div>
                    </div>
                    <div class="row form-ro">
                        <button onclick="signup()" class="btn btn-danger">Don't have an account? Sign Up</button>
                    </div>
                </form>
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
