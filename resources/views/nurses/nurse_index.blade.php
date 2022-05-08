@extends('Layouts.layoutNurse')

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
        <!-- end col-->
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="orders-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $requestscount }}</span></h4>
                        <p class="text-muted mb-0">Total No. Requests</p>
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
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ $todaysScheduleCount }}</span></h4>
                        <p class="text-muted mb-0">Today's Schedule Available</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
        <div class="col-md-6 col-xl-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">

                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">+ <span data-plugin="counterup">{{ $totalKit }}</span></h4>
                        <p class="text-muted mb-0">Number of test kits needed</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span
                                    class="fw-semibold">View:</span> <span class="text-muted">All<i
                                        class="mdi mdi-chevron-down ms-1"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5"> <a
                                    class="dropdown-item" href="#">Pending Request</a> <a class="dropdown-item"
                                    href="#">Favourite Suburb</a> </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Requests</h4>
                    <div class="mt-3">
                        <div data-simplebar style="max-height: 336px;">
                            <div class="table-responsive">
                                <table class="table table-borderless table-centered table-nowrap">
                                    <tbody>
                                        @forelse ($requests as $request)
                                            <tr>
                                                <td style="width: 20px;"><img src="../assets/images/users/usericon.png"
                                                        class="avatar-xs rounded-circle " alt="..."></td>
                                                <td>
                                                    <h6 class="font-size-15 mb-1 fw-normal">
                                                        {{ $request->user->first_name }} {{ $request->user->last_name }}
                                                    </h6>
                                                    <div class="col-sm-6">
                                                        <div class="text-muted">
                                                            <p class="mb-1 text-muted font-size-13 mb-0"><i
                                                                class="mdi mdi-map-marker"></i> {{ $request->addressLine1 }}
                                                            {{ $request->addressLine2 }} <br>
                                                            {{ $request->suburb->name ?? 'No suburb Found' }}, {{ $request->suburb->zipCode }}</p>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>Requested ({{ $request->created_at->diffForHumans() }})</td>
                                                <td><span
                                                        class="badge bg-soft-warning font-size-12">{{ $request->status }}</span>
                                                </td>
                                                <td>
                                                    <form action="{{ route('testRequests.update', $request->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                        <input type="text" name="status" value="Approved" hidden>
                                                        <button type="submit"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i
                                                                class="mdi mdi-check"
                                                                title="Accept test request"></i></button>
                                                        <button type="button"
                                                            class="btn btn-danger editable-cancel btn-sm waves-effect waves-light"><i
                                                                class="mdi mdi-close"></i></button>
                                                    </form>

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
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="text-muted">Recent<i class="mdi mdi-chevron-down ms-1"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3"> <a class="dropdown-item" href="#">Today</a> <a class="dropdown-item" href="#">Tomorrow</a> </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Recent Activity</h4>
                    <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 336px;">
                        @forelse ($test_logsTomorrow as $schedule)
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <p class="text-muted mb-1 font-size-13">Tomorrow<small
                                        class="d-inline-block ms-1">{{ $schedule->time_slot }}</small></p>
                                <p class="mb-0"><p class="mb-1">{{ $schedule->testrequest->addressLine1 }}
                                    {{ $schedule->testrequest->addressLine2 }},
                                    {{ $schedule->testrequest->suburb->name }}
                                    {{ $schedule->testrequest->suburb->zipCode }}</p>
                                <p class="mb-1"> {{ $schedule->testrequest->user->email }}</p>
                                <span class="text-primary">{{ $schedule->testrequest->user->phone }}</span></p>
                            </div>
                        </li>
                        @empty
                        <div class="py-3 fw-bolder text-success">You have no recent activity waiting</div>
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
