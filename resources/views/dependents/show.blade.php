@extends('Layouts.patient')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dependent</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patient</a></li>
                        <li class="breadcrumb-item active">Dependent Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="product-detail">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="tab-content position-relative" id="v-pills-tabContent">
                                            <div class="product-wishlist">
                                                <a href="#"> <i class="mdi mdi-heart-outline"></i> </a>
                                            </div>
                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                <div class="product-img"> <img src="../assets/images/users/usericon.png"
                                                        alt="" class="img-fluid mx-auto d-block"> </div>
                                            </div>
                                        </div>
                                        <div class="row text-center mt-2">
                                            <div class="col-sm-6">
                                                <div class="d-grid">
                                                    <button type="button"
                                                        class="btn btn-primary waves-effect waves-light mt-2 me-1"
                                                        data-bs-toggle="modal" data-bs-target=".bs-editProfle-modal-lg"></i>
                                                        Edit Profile </button>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <form action="{{ route('dependents.destroy', $dependent->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-grid">
                                                        <button type="submit"
                                                            class="btn btn-danger waves-effect  mt-2 waves-light"> <i
                                                                class="uil uil-shopping-basket me-2"></i> Delete Profile
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div class="mt-4 mt-xl-3 ps-xl-4">
                                <h4 class="font-size-20 mb-0 text-body fw-bold">{{ $dependent->first_name }} {{ $dependent->last_name }}
                                </h4>
                                <p class="mt-4 text-muted">{{ $dependent->email_address }}</p>
                                <p class="mt-4 text-muted">{{ $dependent->contact_number }}</p>
                                <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mt-3">
                                                <h5 class="font-size-14 mb-3 text-body fw-bold">Medical Aid:</h5>
                                                <ul class="list-unstyled product-desc-list text-muted">
                                                    <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Medical Aid
                                                        :</li>
                                                    <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Medical Aid
                                                        Number :</li>
                                                    <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Medical Aid
                                                        Scheme :</li>
                                                    <li><i class="mdi mdi-circle-medium me-1 align-middle"></i> Medical Aid
                                                        Plan :</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 py-4">
                                            <div class="mt-3">
                                                <h5 class="font-size-14"></h5>
                                                <ul class="list-unstyled product-desc-list text-muted">
                                                    <li><i class="uil uil-exchange text-primary me-1 font-size-16"></i>
                                                        {{ $dependent->medical_aid }}</li>
                                                    <li><i class="uil uil-bill text-primary me-1 font-size-16"></i>
                                                        {{ $dependent->medical_aid_no }}</li>
                                                    <li><i class="uil uil-exchange text-primary me-1 font-size-16"></i>
                                                        {{ $dependent->medicalPlan->medicalAid->aid_name }}</li>
                                                    <li><i class="uil uil-bill text-primary me-1 font-size-16"></i>
                                                        {{ $dependent->medicalPlan->plan_name }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-editProfle-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editProfle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfle">Update Your Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('dependents.update', $dependent->id) }}" class="needs-validation"
                        name="event-form" id="form-event" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="row col-12">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control" placeholder="First Name" type="text" name="first_name"
                                        id="event-title" value="{{ $dependent->first_name }}" required />
                                    <div class="invalid-feedback">Please provide a valid name</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control" placeholder="Last Name" type="text" name="last_name"
                                        id="last_name" value="{{ $dependent->last_name }}" required />
                                    <div class="invalid-feedback">Please provide a valid surname</div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="id_number">Identity Number</label>
                                    <input type="text" class="form-control" name="id_number"
                                        value="{{ $dependent->id_number }}" id="id_number" required>
                                    <div class="invalid-feedback">
                                        Please enter your identity number.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Cellphone
                                            Number</label>
                                        <input type="text" name="contact_number" value="{{ $dependent->contact_number }}"
                                            class="form-control" id="contact_number" required>
                                        <div class="invalid-feedback">
                                            Please enter your phone number.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="email_address">Email</label>
                                        <input type="email" name="email_address" value="{{ $dependent->email_address }}"
                                            class="form-control" id="email_address" required>
                                        <div class="invalid-feedback">
                                            Please enter your email address.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="example-address-input" class="form-label">Address
                                                    Line 1</label>
                                                <input type="text" name="addressLine1"
                                                    value="{{ $dependent->addressLine1 }}" class="form-control"
                                                    id="addressLine1" placeholder="Street address..." required />
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
                                                    value="{{ $dependent->addressLine2 }}" class="form-control"
                                                    id="addressLine2"
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
                                                        <option value="{{ $suburb->id }}"
                                                            {{ $suburb->id == $dependent->suburb_id ? 'selected' : '' }}>
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
                                                @foreach ($medical_plans as $plan)
                                                    <option value="{{ $plan->id }}"
                                                        {{ $plan->id == $dependent->medical_plan_id ? 'selected' : '' }}>
                                                        {{ $plan->plan_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="labels">Medical Aid Number</label>
                                            <input type="text" name="medical_aid_no"
                                                value="{{ $dependent->medical_aid_no }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer row">
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
                </form>
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
