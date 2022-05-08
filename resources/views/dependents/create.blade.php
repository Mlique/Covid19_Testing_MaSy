@extends('Layouts.patient')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dependents.store') }}" method="POST" class="needs-validation" novalidate>

        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Add Family Member</h4>
                            <div data-repeater-list="outer-group" class="outer">
                                <div data-repeater-item class="outer">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">First Name</label>
                                                <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                    class="form-control" id="formrow-firstname-input" required>
                                                    <div class="invalid-feedback">
                                                        Please enter your first name.
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">Last Name</label>
                                                <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                    class="form-control" id="formrow-firstname-input" required>
                                                    <div class="invalid-feedback">
                                                        Please enter your last name.
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="formrow-idnumber-input">Identity Number</label>
                                        <input type="text" class="form-control" name="id_number"
                                            value="{{ old('id_number') }}" id="formrow-idnumber-input" required>
                                            <div class="invalid-feedback">
                                                Please enter your identity number.
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">Cellphone
                                                    Number</label>
                                                <input type="text" name="contact_number"
                                                    value="{{ old('contact_number') }}" class="form-control"
                                                    id="formrow-firstname-input" required>
                                                    <div class="invalid-feedback">
                                                        Please enter your phone number.
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-firstname-input">Email</label>
                                                <input type="email" name="email_address"
                                                    value="{{ old('email_address') }}" class="form-control"
                                                    id="formrow-firstname-input" required>
                                                    <div class="invalid-feedback">
                                                        Please enter your email address.
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check form-switch mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" name="same_address"
                                                id="same_address">
                                            <label class="form-check-label" for="same_address">Residential Address - Same as
                                                mine</label>
                                        </div>
                                    </div>
                                    <div id="showAddress">
                                        <div class="row">
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-address-input" class="form-label">Address
                                                                Line 1</label>
                                                            <input type="text" name="addressLine1"
                                                                value="{{ old('addressLine1') }}" class="form-control"
                                                                id="example-address-input"
                                                                placeholder="Street address..." required/>
                                                                <div class="invalid-feedback">
                                                                    Please enter your street address...
                                                                </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-address-input" class="form-label">Address
                                                                Line 2</label>
                                                            <input type="text" name="addressLine2"
                                                                value="{{ old('addressLine2') }}" class="form-control"
                                                                id="example-address-input"
                                                                placeholder="Apartment, suite, unit, building, floor, etc..." />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3"><label class="labels">Suburb</label>
                                                            <select required name="suburb_id" class="form-select"
                                                                aria-label="Default select example">
                                                                <option selected value="">Please select suburb</option>
                                                                @foreach ($suburbs as $suburb)
                                                                    <option value="{{ $suburb->id }}">
                                                                        {{ $suburb->name }}</option>
                                                                @endforeach

                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select your suburb
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label d-block mb-3">Medical aid beneficiary?</label>
                                        <div class="custom-radio form-check form-check-inline">
                                            <input type="radio" id="Medquestions" name="medical_aid" value="Yes"
                                                class="form-check-input">
                                            <label class=" form-check-label" for="medical_aid">Yes</label>
                                        </div>
                                        <div class="custom-radio form-check form-check-inline">
                                            <input type="radio" id="medical_aid" name="medical_aid" value="No"
                                                class="form-check-input">
                                            <label class="form-check-label" for="medical_aid">No</label>
                                        </div>
                                    </div>
                                    <div id="dvMedicals" style="display:none">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6"><label class="labels">Medical Aid Plan</label>
                                                    <select name="medical_plan_id" class="form-select"
                                                        aria-label="Default select example">
                                                        <option selected value="">Please select your medical aid plan</option>
                                                        @foreach ($medical_plans as $medical_plan)
                                                            <option value="{{ $medical_plan->id }}">
                                                                {{ $medical_plan->plan_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="labels">Medical Aid Number</label>
                                                    <input type="text" name="medical_aid_no"
                                                        value="{{ old('medical_aid_no') }}" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input hidden type="text" name="main_member_id" value="{{ Auth::user()->id }}"
                                            class="form-control" placeholder="">
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>

                                    <a class="btn btn-info" href="{{ route('dependents.index') }}">Back</a>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#same_address").click(function() {
                    $("#showAddress").toggle();
                });
            });

            $(function() {
                $("input[name='medical_aid']").click(function() {
                    if ($("#Medquestions").is(":checked")) {
                        $("#dvMedicals").show();
                    } else {
                        $("#dvMedicals").hide();
                    }
                });
            });

        </script>
    @endsection
