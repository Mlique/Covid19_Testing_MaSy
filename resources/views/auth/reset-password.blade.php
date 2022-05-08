@csrf

<div id="resetform" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog tem-doc" role="document">
        <div class="modal-content temp-model">
            <div class="modal-header">
                <h5 class="modal-title">Reset Password</h5> <br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="reset_form">
                    @csrf
                    <div class="row form-ro">
                        <input placeholder="Email" class="form-control" type="text">
                    </div>
                    <div class="row form-ro">
                        <input placeholder="New Password" class="form-control" type="password">
                    </div>
                    <div class="row form-ro">
                        <input placeholder="Confirm New Password" class="form-control" type="password">
                    </div>
                    <div class="row form-ro">
                        <button onclick="" class="btn btn-success">Update Password</button>
                    </div>
                    <div class="text-center text-primary">
                        <div class="mb-2"><a onclick="resetpassw()" class="text-decoration-underline">Back
                            </a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
