@extends('Layouts.layoutNurse')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">Pick Favourite Suburb(s)</h4>
            <div class="row">
                @foreach ($suburbs as $suburb)
                <div class="col-sm-2">
                    <form method="POST" action="{{ route('favourite_suburb.store') }}">
                        @csrf
                            <input hidden type="text" class="form-control" id="nurse_id" name="nurse_id"
                                                value="{{ Auth::user()->id }}">
                            <input hidden type="text" class="form-control" id="suburb_id" name="suburb_id" value="{{ $suburb->id }}" >

                            <div class="alert alert-border alert-border-success alert-dismissible fade show mt-4 px-4 mb-0 text-center" role="alert">
                                <i class="uil uil-exclamation-triangle d-block display-4 mt-2 mb-3 text-success"></i>
                                <button type="submit" class="btn btn-outline-success waves-effect waves-light mb-1">  <i class="mdi mdi-heart-outline"></i> Add</button>
                                <p>{{ $suburb->name }}</p>

                            </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
