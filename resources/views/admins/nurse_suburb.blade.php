@extends('Layouts.admin')

@section('content')
@foreach ($fav_suburbs as $suburb)
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card text-center">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a class="text-body dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"> <i class="uil uil-ellipsis-h"></i> </a>
                    <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#">Edit</a> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Remove</a> </div>
                </div>
                <div class="clearfix"></div>
                <div class="mb-4"> <img src="../assets/images/users/usericon.png" alt="" class="avatar-lg rounded-circle img-thumbnail"> </div>
                <h5 class="font-size-16 mb-1"><a href="#" class="text-dark"></a></h5>
                <p class="text-muted mb-2">{{ $suburb->name }}</p>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-light text-truncate"><i class="uil uil-user me-1"></i> Profile</button>
                <button type="button" class="btn btn-outline-light text-truncate"><i class="uil uil-envelope-alt me-1"></i> Message</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
