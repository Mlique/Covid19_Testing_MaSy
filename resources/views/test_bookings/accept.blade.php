@extends('Layouts.layoutNurse')

@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div class="p-3 bg-light mb-4">
                        <h5 class="font-size-16 mb-0">Requestor Details <span class="float-end ms-2"></span></h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 table-nowrap">
                            <tbody>
                                <tr>
                                    <th scope="row"><img src="../assets/images/users/usericon.png" title="product-img"
                                            class="avatar-md"></th>
                                    <td>
                                        <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html"
                                                class="text-dark">{{ $test_booking->user->first_name }}
                                                {{ $test_booking->user->last_name }}</a></h5>
                                        <p class="text-muted mb-0">{{ $test_booking->user->email }}</p>
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
                                        <p class="mb-1"> @isset($test_booking)
                                                {{ $test_booking->addressLine1 }}@endisset,
                                                @isset($test_booking) {{ $test_booking->addressLine2 }} @endisset</li>
                                                @isset($test_booking) {{ $test_booking->suburb->name ?? 'No Suburb' }}@endisset
                                                </p>
                                                <p class="mb-0">Mobile No. {{ $test_booking->user->main_members->phone }}</p>
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
                                    <h5 class="font-size-16 mb-1">Schedule Date & Time</h5>
                                    <p class="text-muted text-truncate mb-0"></p>
                                </div>
                            </div>
                        </div>

                        <div class="collapse show">
                            <div class="p-4 border-top">
                                <form action="{{ route('schedular.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" name="event-form" id="form-event" novalidate>
                                    @csrf
                                    <div>
                                        <input hidden type="text" class="form-control" id="testRequest_id" name="testRequest_id"
                                        value="@isset($test_booking) {{ $test_booking->id }} @endisset">
                                    <input hidden type="text" class="form-control" id="nurse_id" name="nurse_id"
                                        value="{{ Auth::user()->id }}">
                                    <input hidden type="text" class="form-control" id="email" name="email"
                                        value="{{  $test_booking->user->email }}">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3 mb-4">
                                                    <label class="form-label" for="date">Date</label>
                                                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date" required/>
                                                    <div class="invalid-feedback">Please make sure that you schedule the request within 24 - 48 hours.</div>
                                                    @error('contact_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="mb-3 mb-4">
                                                    <label class="form-label" for="time_slot">Select Time-Slot</label>
                                                    <select class="form-control form-select" name="time_slot" title="Time Slot">
                                                        <option value="06:00 AM - 08:00 AM">06:00 AM - 08:00 AM</option>
                                                        <option value="08:00 AM - 10:00 AM">08:00 AM - 10:00 AM</option>
                                                        <option value="08:00 AM - 10:00 AM">10:00 AM - 12:00 PM</option>
                                                        <option value="12:00 AM - 14:00 PM">12:00 PM - 14:00 PM</option>
                                                        <option value="14:00 PM - 16:00 PM">14:00 PM - 16:00 PM</option>
                                                        <option value="16:00 PM - 18:00 PM">16:00 PM - 18:00 PM</option>
                                                        <option value="18:00 PM - 20:00 PM">18:00 PM - 20:00 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="mb-3 mb-4">
                                                    <label class="form-label" for="Status">Confirmation</label>
                                                    <select  required class="form-control form-select" name="Status">
                                                        <option value="">Please confirm scheduling</option>
                                                        <option value="At Lab">At Lab</option>
                                                        <option value="Closed">Closed</option>
                                                        <option value="Performed">Performed</option>
                                                        <option value="Scheduled">Scheduled</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-1 mb-4 p-4">
                                        <div class="col">
                                            <div class="text-end mt-2 mt-sm-0">
                                                <button type="submit" class="btn btn-success"> <i class="uil uil-shopping-cart-alt me-1"></i> Procced
                                                </button>
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
