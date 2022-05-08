@extends('Layouts.patient')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">My Test Requests</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th hidden>Request Creator</th>
                                <th>Address</th>
                                <th>Date & Time Requested</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testRequests as $testRequest)
                            <tr>
                                <td>
                                    {{ $testRequest->addressLine1 }}
                                    {{ $testRequest->addressLine2 }}
                                    {{ $testRequest->suburb->name }}
                                </td>
                                <td>{{ $testRequest->created_at->toDayDateTimeString() }}</td>
                                {{-- <td> @foreach ($testRequest->dependents as $dependent)
                                    <option value="{{ $dependent->id }}">{{ $dependent->first_name }}</option>
                                @endforeach </td> --}}
                                <td>{{ $testRequest->status }}</td>
                                <td>
                                    <form action="{{ route('testRequests.destroy', $testRequest->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger editable-cancel btn-sm waves-effect waves-light"><i
                                                class="mdi mdi-close"></i> Cancel</button>
                                    </form>

                                </td>
                                <td>

                                </td>
                            </tr>
                            @empty
                            <div class="py-3 mb-4 text-danger fw-bolder">No test request available</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
