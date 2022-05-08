@extends('Layouts.patient')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Profile</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text-center">
                        <div class="clearfix"></div>
                        <div> <img src="../assets/images/users/usericon.png" alt=""
                                class="avatar-lg rounded-circle img-thumbnail"> </div>
                        <h5 class="mt-3 mb-1"></h5>
                        <p class="text-muted">{{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}</p>
                        <div class="mt-4">
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target=".bs-editProfle-modal-lg">Edit Profile</button>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="text-muted">
                        <div class="table-responsive mt-4">
                            <div class="mt-4">
                                <p class="mb-1">Mobile : {{ $phone }}</p>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">E-mail : {{ Auth::user()->email }}</p>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">Location : {{ $addressLine1 }} {{ $addressLine2 }}
                                    {{ $suburb_name ?? 'No Address' }}
                                    {{ $zipCode ?? '' }}</p>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-0">
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab"> <i
                                class="uil uil-user-circle font-size-20"></i> <span class="d-none d-sm-block">Family
                                Members</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab"> <i
                                class="uil uil-clipboard-notes font-size-20"></i> <span class="d-none d-sm-block">Medical
                                Aid</span> </a>
                    </li>
                </ul>
                <div class="tab-content p-4">
                    <div class="tab-pane active" id="about" role="tabpanel">
                        <div>
                            <div>
                                <h5 class="font-size-16 mb-4">Dependents</h5>
                                <div class="table-responsive">
                                    <table class="table table-nowrap table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Identity Number</th>
                                                <th>Contact Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($dependents as $dependent)
                                                <tr>
                                                    <td><a href="javascript: void(0);"
                                                            class="text-body fw-bold">{{ $dependent->first_name }}</a>
                                                    </td>
                                                    <td class="text-body fw-bold">{{ $dependent->last_name }}</td>
                                                    <td> {{ $dependent->id_number }} </td>
                                                    <td> {{ $dependent->contact_number }} </td>
                                                    <td>
                                                        <a type="button"
                                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                                            href="{{ route('dependents.show', $dependent->id) }}"> View
                                                            More </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="py-3 mb-4 text-danger fw-bolder">No dependent available please
                                                    add your family beneficiary</div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tasks" role="tabpanel">
                        <div>
                            <div class="col-12">
                                <div class="card checkout-order-summary">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 table-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Medical Aid</h5>
                                                        </td>
                                                        <td>{{ $medical_aid_YN }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Medical Aid No</h5>
                                                        </td>
                                                        <td class="">{{ $medical_aid_no }} </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Medical Scheme</h5> </td>
                                                        <td>{{ $ }}  </td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Medical Plan</h5>
                                                        </td>
                                                        <td>{{ $medical_plan }} </td>
                                                    </tr>
                                                    <tr class="bg-light">
                                                        <td colspan="2">
                                                            <h5 class="font-size-14 m-0">Person Responsible</h5>
                                                        </td>
                                                        <td>{{ Auth::user()->first_name }}
                                                            {{ Auth::user()->last_name }} </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

    <div id="editProfile" class="modal fade bs-editProfle-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editProfle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfle">Update Your Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.edit_saves', auth()->user()->id) }}"
                        class="needs-validation" name="event-form" id="form-event" novalidate>
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="row col-12">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control" placeholder="First Name" type="text" name="first_name"
                                        id="event-title" value="@isset($user) {{ $user->first_name }} @endisset"
                                        required />
                                    <div class="invalid-feedback">Please provide a valid name</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control" placeholder="Last Name" type="text" name="last_name"
                                        id="last_name" value="@isset($user) {{ $user->last_name }} @endisset" required />
                                    <div class="invalid-feedback">Please provide a valid surname</div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="id_number">Identity Number</label>
                                    <input type="text" class="form-control @error('id_number') is-invalid @enderror"
                                        name="id_number" value="{{ old('id_number') }} @isset($user) {{ $user->main_members->id_number }} @endisset" id="id_number" required>

                                    @error('id_number')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Cellphone
                                            Number</label>
                                        <input type="text" name="contact_number"
                                            value="{{ old('contact_number') }} @isset($user) {{ $user->main_members->contact_number }} @endisset"
                                            class="form-control @error('contact_number') is-invalid @enderror"
                                            id="contact_number" required>

                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="email_address">Email</label>
                                        <input type="email_address" name="email_address"
                                            value="{{ $user->main_members->email }} @isset($user) {{ $user->email }} @endisset"
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
                                                    value="{{ old('addressLine1') }} @isset($user) {{ $user->main_members->addressLine1 }} @endisset"
                                                    class="form-control" id="example-address-input"
                                                    placeholder="Street address..." required />
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
                                                    value="{{ old('addressLine1') }} @isset($user) {{ $user->main_members->addressLine2 }} @endisset"
                                                    class="form-control" id="example-address-input"
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
                            <div class="mb-4">
                                <label class="form-label d-block mb-3">Medical aid beneficiary?</label>
                                <div class="custom-radio form-check form-check-inline">
                                    <input type="radio" id="Medquestions" name="medical_aid_YN" value="Yes"
                                        class="form-check-input">
                                    <label class=" form-check-label" for="medical_aid">Yes</label>
                                </div>
                                <div class="custom-radio form-check form-check-inline">
                                    <input type="radio" id="medical_aid" name="medical_aid_YN" value="No"
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
                                                    <option value="{{ $plan->id }}">
                                                        {{ $plan->plan_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="labels">Medical Aid Number</label>
                                            <input type="text" name="medical_aid_no"
                                                value="{{ old('medical_aid_no') }} @isset($user) {{ $user->main_members->medical_aid_no }} @endisset""
                                                    class=" form-control" value="">
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

    @if (count($errors) > 0)
        <script>
            $(document).ready(function() {
                $('#editProfile').modal('show');
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $("#same_address").click(function() {
                $("#showAddress").toggle();
            });
        });

        $(function() {
            $("input[name='medical_aid_YN']").click(function() {
                if ($("#Medquestions").is(":checked")) {
                    $("#dvMedicals").show();
                } else {
                    $("#dvMedicals").hide();
                }
            });
        });
    </script>
@endsection
