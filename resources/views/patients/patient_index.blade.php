@extends('Layouts.patient')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patient</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="mb-1 mt-1">R<span data-plugin="counterup"> 0.0</span></h4>
                        <p class="text-muted mb-0">Due Payment </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="orders-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $dependents_number }}</span></h4>
                        <p class="text-muted mb-0">Family Members</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $pending_req }}</span></h4>
                        <p class="text-muted mb-0">Pending Request</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h4 class="mb-1 mt-1">+ <span data-plugin="counterup">2</span></h4>
                        <p class="text-muted mb-0">Appointments</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">My Dependents</h4>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
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
                                    @forelse ($dependents as $dependent)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body fw-bold">{{ $dependent->first_name }}</a> </td>
                                        <td>{{ $dependent->last_name }}</td>
                                        <td> {{ $dependent->id_number }} </td>
                                        <td> {{ $dependent->contact_number }} </td>
                                        <td>
                                            <a type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" href="{{ route('dependents.show', $dependent->id) }}"> View
                                                Details </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="py-3 mb-4 text-danger fw-bolder">No dependent available please complete your profile</div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


