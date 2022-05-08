@extends('Layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="orders-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $pendingRequests }}</span></h4>
                        <p class="text-muted mb-0">Pending Request</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="orders-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $todaysScheduleTotal }}</span></h4>
                        <p class="text-muted mb-0">Total Performed Tests</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $todaysSchedule_count }}</span></h4>
                        <p class="text-muted mb-0">Performed Tests Today</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">

                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">+ <span data-plugin="counterup">{{ $todaysSchedule_count }}</span></h4>
                        <p class="text-muted mb-0">nurse's Upcoming Schedule</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Manage Request</h4>
                <p class="card-title-desc"></p>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#profile1" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Total Performed Tests</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">Today's Nurses Schedule</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#home1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Pending Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">Performed Tests Today</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="row py-3 mb-3">
                        <div class="col-md-4">
                            <a href="javascript:window.print()"
                               class="btn btn-success waves-effect waves-light me-1"><i
                                class="fa fa-print"></i></a>
                        </div>
                        <div class="col-md-8">
                            <div class="float-end">
                                <div class=" mb-3">
                                    <form action="{{ route('schedule_log/records') }}" method="POST">
                                        @csrf

                                        <div class="input-daterange input-group">
                                        <input type="text" class="form-control text-start @error('other') is-invalid @enderror datetimepicker" placeholder="Name" name="other"/>
                                        <span class="invalid-feedback" role="alert">
                                            Please pick the nurse
                                        </span>
                                        <input type="text" class="form-control text-start @error('fromDate') is-invalid @enderror datetimepicker" placeholder="From" name="fromDate"/>
                                        <span class="invalid-feedback" role="alert">
                                            Please pick the start date
                                        </span>
                                        <input type="text" class="form-control text-start @error('toDate') is-invalid @enderror datetimepicker" placeholder="To" name="toDate"/>
                                        <span class="invalid-feedback" role="alert">
                                            Please pick the end date
                                        </span>

                                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-filter-variant"></i></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane active" id="profile1" role="tabpanel">
                        <p class="mb-0">
                        <div class="col-lg-12">
                            <div class="table-responsive mb-4">
                                <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                                    style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                    <thead>
                                        <tr class="bg-transparent">
                                            <th style="width: 24px;">
                                                <div class="form-check text-center font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="invoicecheck">
                                                    <label class="form-check-label" for="invoicecheck"></label>
                                                </div>
                                            </th>
                                            <th>Nurse</th>
                                            <th>About Request</th>
                                            <th>Date Request</th>
                                            <th>Status</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($performedreques as $request)
                                            <tr>
                                                <td style="width: 20px;"><img src="../assets/images/users/usericon.png"
                                                        class="avatar-xs rounded-circle " alt="..."></td>
                                                        <td>{{ $request->first_name  }}
                                                            {{ $request->last_name  }}</td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">
                                                        {{ $request->addressLine1 }}
                                                        {{ $request->addressLine2 }}
                                                    </h6>
                                                    <div class="col-sm-6">
                                                        <div class="text-muted">
                                                            <p class="mb-1 text-muted font-size-13 mb-0"><i
                                                                    class="mdi mdi-map-marker"></i>

                                                                {{ $request->name ?? 'No suburb Found' }},
                                                                {{ $request->zipCode ?? '' }}</p>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>{{ $request->date }}</td>
                                                <td><span
                                                        class="badge bg-soft-warning font-size-12">{{ $request->Status }}</span>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-danger editable-cancel btn-sm waves-effect waves-light"><i
                                                            class="mdi mdi-close"></i>Close Up</button>
                                                    <button type="button"
                                                        class="btn btn-secondary editable-cancel btn-sm waves-effect waves-light"><i
                                                            class="mdi mdi-pdf"></i> Generate Invoice</button>

                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </p>
                    </div>
                    <div class="tab-pane" id="settings1" role="tabpanel">
                        <p class="mb-0">
                        <div class="col-lg-12">
                            <div class="table-responsive mb-4">
                                <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                                    style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                    <thead>
                                        <tr class="bg-transparent">
                                            <th style="width: 24px;">
                                                <div class="form-check text-center font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="invoicecheck">
                                                    <label class="form-check-label" for="invoicecheck"></label>
                                                </div>
                                            </th>
                                            <th>About Request</th>
                                            <th>Time Request</th>
                                            <th>Status</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($todaysSchedule_get as $request)
                                            <tr>
                                                <td style="width: 20px;"><img src="../assets/images/users/usericon.png"
                                                        class="avatar-xs rounded-circle " alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">
                                                        {{ $request->testrequest->user->first_name ?? '' }}
                                                        {{ $request->testrequest->user->last_name ?? '' }}
                                                    </h6>
                                                    <div class="col-sm-6">
                                                        <div class="text-muted">
                                                            <p class="mb-1 text-muted font-size-13 mb-0"><i
                                                                    class="mdi mdi-map-marker"></i>
                                                                {{ $request->testrequest->addressLine1 }}
                                                                {{ $request->testrequest->addressLine2 }}
                                                               </p>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>Requested ({{ $request->created_at->diffForHumans() }})</td>
                                                <td><span
                                                        class="badge bg-soft-warning font-size-12">{{ $request->Status }}</span>
                                                </td>
                                                <td>
                                                    <button type="submit"
                                                        class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i
                                                            class="mdi mdi-eye" title="Accept test request"></i> View
                                                        Details</button>
                                                </td>

                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </p>
                    </div>
                    <div class="tab-pane" id="home1" role="tabpanel">
                        <p class="mb-0">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="table-responsive mb-4">
                                    <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                                        style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                        <thead>
                                            <tr class="bg-transparent">
                                                <th style="width: 24px;">
                                                    <div class="form-check text-center font-size-16">
                                                        <input type="checkbox" class="form-check-input" id="invoicecheck">
                                                        <label class="form-check-label" for="invoicecheck"></label>
                                                    </div>
                                                </th>
                                                <th>About Request</th>
                                                <th>Time Request</th>
                                                <th>Status</th>
                                                <th style="width: 120px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pendingRequestsTotal as $request)
                                                <tr>
                                                    <td style="width: 20px;"><img src="../assets/images/users/usericon.png"
                                                            class="avatar-xs rounded-circle " alt="..."></td>
                                                    <td>
                                                        <h6 class="font-size-15 mb-1 fw-normal">
                                                            {{ $request->user->first_name ?? '' }}
                                                            {{ $request->user->last_name ?? '' }}
                                                        </h6>
                                                        <div class="col-sm-6">
                                                            <div class="text-muted">
                                                                <p class="mb-1 text-muted font-size-13 mb-0"><i
                                                                        class="mdi mdi-map-marker"></i>
                                                                    {{ $request->addressLine1 }}
                                                                    {{ $request->addressLine2 }}
                                                                    {{ $request->suburb->name ?? 'No suburb Found' }},
                                                                    {{ $request->suburb->zipCode }}</p>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>Requested ({{ $request->created_at->diffForHumans() }})</td>
                                                    <td><span
                                                            class="badge bg-soft-warning font-size-12">{{ $request->status }}</span>
                                                    </td>
                                                    <td>
                                                        <button type="submit"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i
                                                                class="mdi mdi-eye" title="Accept test request"></i> View
                                                            Details</button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="py-3 fw-bolder">No Pending Request Found</div>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>

                    <div class="tab-pane" id="messages1" role="tabpanel">
                        <p class="mb-0">
                        <div class="col-lg-12">
                            <div class="table-responsive mb-4">
                                <table class="table table-centered datatable dt-responsive nowrap table-card-list"
                                    style="border-collapse: collapse; border-spacing: 0 12px; width: 100%;">
                                    <thead>
                                        <tr class="bg-transparent">
                                            <th style="width: 24px;">
                                                <div class="form-check text-center font-size-16">
                                                    <input type="checkbox" class="form-check-input" id="invoicecheck">
                                                    <label class="form-check-label" for="invoicecheck"></label>
                                                </div>
                                            </th>
                                            <th>About Request</th>
                                            <th>Time Request</th>
                                            <th>Status</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($todaysPerformed as $request)
                                            <tr>
                                                <td style="width: 20px;"><img src="../assets/images/users/usericon.png"
                                                        class="avatar-xs rounded-circle " alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">
                                                        {{ $request->testrequest->user->first_name ?? '' }}
                                                        {{ $request->testrequest->user->last_name ?? '' }}
                                                    </h6>
                                                    <div class="col-sm-6">
                                                        <div class="text-muted">
                                                            <p class="mb-1 text-muted font-size-13 mb-0"><i
                                                                    class="mdi mdi-map-marker"></i>
                                                                {{ $request->testrequest->addressLine1 }}
                                                                {{ $request->testrequest->addressLine2 }}
                                                                {{ $request->testrequest->suburb->name ?? 'No suburb Found' }},
                                                                {{ $request->testrequest->suburb->zipCode ?? '' }}</p>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>Requested ({{ $request->created_at->diffForHumans() }})</td>
                                                <td><span
                                                        class="badge bg-soft-warning font-size-12">{{ $request->Status }}</span>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-danger editable-cancel btn-sm waves-effect waves-light"><i
                                                            class="mdi mdi-close"></i>Close Up</button>
                                                    <button type="button"
                                                        class="btn btn-secondary editable-cancel btn-sm waves-effect waves-light"><i
                                                            class="mdi mdi-pdf"></i> Generate Invoice</button>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
