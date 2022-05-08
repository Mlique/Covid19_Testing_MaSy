@extends('Layouts.patient')
@section('content')

    <form action="{{ route('testRequests.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Make Test Request</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Main Member</a></li>
                            <li class="breadcrumb-item active">Request Test</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded-circle bg-soft-primary text-primary"> 01 </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Request Info</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all the request information below</p>
                                    </div>
                                    <div class="flex-shrink-0"> <i
                                            class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
                                </div>
                            </div>
                        </a>
                        <div id="addproduct-billinginfo-collapse" class="collapse show"
                            data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-userid-input"></label>
                                                <input hidden type="text" name="requestor_id"
                                                    value="{{ Auth::user()->id }}" class="form-control"
                                                    id="formrow-userid-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="example-address-input" class="form-label">Address Line
                                                        1</label>
                                                    <input type="text" name="addressLine1" class="form-control"
                                                        id="addressLine1" placeholder="Street address..." required/>
                                                    <div class="invalid-feedback">
                                                        Please enter your Street address....
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="example-address-input" class="form-label">Address Line
                                                        2</label>
                                                    <input type="text" name="addressLine2" class="form-control"
                                                        id="example-address-input"
                                                        placeholder="Apartment, suite, unit, building, floor, etc..." />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3"><label class="labels">Suburb</label>
                                                    <select name="suburb_id" class="form-select"
                                                        aria-label="suburb_id" required>
                                                        <option selected value="">Please select suburb</option>
                                                        @foreach ($suburbs as $suburb)
                                                            <option value="{{ $suburb->id }}">{{ $suburb->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Select members to test</label>
                                        <input hidden type="text" name="requestor_id"
                                                    value="{{ Auth::user()->id }}" class="form-control"
                                                    id="formrow-userid-input">

                                        <select class="select2 form-control select2-multiple" name="subjectTest[]"
                                            multiple="multiple" data-placeholder="Choose ...">
                                            @foreach ($dependents as $test_subject)
                                                <option value="{{ $test_subject->id }}">
                                                    {{ $test_subject->first_name }} {{ $test_subject->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-check-input" name="subjectTest[]"
                                        type="checkbox" value="{{ Auth::user()->id }}"><label class="form-label"> Including myself</label>
                                    </div>
                                    <div class="mb-4 row">
                                        <div class="col-md-12">
                                            <label hidden for="number_of_people" class="form-label">Number of People</label>
                                            <input hidden class="form-control" type="number" name="number_of_people" id="number_of_people" value="1" required>
                                        </div>
                                    </div>
                                    <input hidden type="text" class="form-control" id="status" name="status"
                                    value="New">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Create Request</button>
                                        <a href="{{ url('/home') }}" class="btn btn-secondary btn-lg">Back</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.testRequests').select2();
        });

    </script>
@endsection
