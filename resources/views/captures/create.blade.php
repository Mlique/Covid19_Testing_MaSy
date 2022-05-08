@extends('Layouts.layoutNurse')

@section('content')
    <form action="{{ route('captures.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-xl-4">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-4">
                            <h5 class="font-size-16 mb-0">Test Subject Details <span class="float-end ms-2"></span></h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 table-nowrap">
                                <tbody>
                                    <tr>
                                        <th scope="row"><img src="../assets/images/users/usericon.png" title="product-img"
                                                class="avatar-md"></th>
                                        <td>
                                            <h5 class="font-size-14 text-truncate"><a href=""
                                                    class="text-dark">
                                                    @foreach ($dependents as $dep)
                                                        @if ($dep->id == $log->testRequest->test_subject_id)
                                                            {{ $dep->first_name }} {{ $dep->last_name }}
                                                        @else

                                                        @endif
                                                    @endforeach

                                                    @foreach ($users as $user)
                                                        @if ($user->id == $log->testRequest->test_subject_id)
                                                            {{ $user->first_name }} {{ $user->last_name }}
                                                        @else

                                                        @endif
                                                    @endforeach

                                                </a></h5>
                                            <p class="text-muted mb-0">
                                                @foreach ($dependents as $dep)
                                                @if ($dep->id == $log->testRequest->test_subject_id)
                                                    {{ $dep->email_address }}
                                                @else

                                                @endif
                                                @endforeach

                                                @foreach ($users as $user)
                                                    @if ($user->id == $log->testRequest->test_subject_id)
                                                        {{ $user->email }}
                                                    @else

                                                    @endif
                                                @endforeach
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-4 border-top">
                            <h5 class="font-size-14 mb-3">Address</h5>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card border rounded active shipping-address">
                                        <div class="card-body">
                                            <a href="#" class="float-end ms-1" data-bs-toggle="tooltip" data-placement="top"
                                                title="Edit"> <i class="uil uil-pen font-size-16"></i> </a>
                                            <p class="mb-1"> {{ $log->testRequest->addressLine1 }}
                                                {{ $log->testRequest->addressLine2 }} </span></li>
                                                {{ $log->testRequest->suburb->name ?? 'No Address Found' }}
                                            </p>
                                            <p class="mb-0">Mobile No. @foreach ($dependents as $dep)
                                                    @if ($dep->id == $log->testRequest->test_subject_id)
                                                        {{ $dep->contact_number }}
                                                    @else

                                                    @endif
                                                @endforeach

                                                @foreach ($users as $user)
                                                    @if ($user->id == $log->testRequest->test_subject_id)
                                                        {{ $user->contact_number }}
                                                    @else

                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card">

                    <div class="p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3"> <i class="uil uil-receipt text-primary h2"></i> </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="font-size-16 mb-1">Capture Vitals</h5>
                                <p class="text-muted text-truncate mb-0"></p>
                            </div>
                        </div>
                    </div>

                    <div class="collapse show">
                        <div class="p-4 border-top">
                            <form action="{{ route('schedular.store') }}" method="POST" enctype="multipart/form-data"
                                class="needs-validation" name="event-form" id="form-event" novalidate>
                                @csrf
                                <div>
                                    <input hidden type="text" class="form-control" id="testRequest_id"
                                        name="testRequest_id"
                                        value="@isset($log) {{ $log->testRequest_id }} @endisset">
                                    <input hidden type="text" class="form-control" id="nurse_id" name="nurse_id"
                                        value="{{ Auth::user()->id }}">
                                    <input hidden type="text" class="form-control" id="patient_id" name="patient_id"
                                        value="{{ $log->testRequest->test_subject_id }}">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3 mb-4">
                                                <label class="form-label" for="temperature">Temperature</label>
                                                <input type="text" name="temperature" value="{{ old('temperature') }}"
                                                    class="form-control  @error('temperature') is-invalid @enderror"" id="temperature" required>
                                                @error('temperature')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3 mb-4">
                                                <label for="blood_pressure" class="form-label">Blood Pressure</label>
                                                <input type="text" name="blood_pressure"
                                                    value="{{ old('blood_pressure') }}" class="form-control"
                                                    id="blood_pressure" required>
                                                @error('blood_pressure')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3 mb-4">
                                                <label for="oxygen_levels" class="form-label">Oxygen Levels</label>
                                                <input type="text" name="oxygen_levels"
                                                    value="{{ old('oxygen_levels') }}" class="form-control"
                                                    id="oxygen_levels" required>
                                                @error('oxygen_levels')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-1 mb-4 p-4">
                                    <div class="col">
                                        <div class="text-end mt-2 mt-sm-0">
                                            <button type="submit" class="btn btn-success"> <i
                                                    class="uil uil-shopping-cart-alt me-1"></i> Save
                                            </button>
                                            <a class="btn btn-info" href="">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    @endsection
