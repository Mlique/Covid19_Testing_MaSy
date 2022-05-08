@extends('Layouts.layoutNurse')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Capture Test Vitals</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th hidden>Request ID</th>
                                <th hidden>Patient ID</th>
                                <th hidden>Lab User ID</th>
                                <th>Barcode</th>
                                <th>Test Result</th>
                                <th>Temperature</th>
                                <th>Blood Pressure</th>
                                <th>Oxygen Levels</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testResults as $testResult)
                            <tr>
                                <td>{{ $testResult->id }}</td>
                                {{-- <td>{{ Auth::user()->id }}</td>
                                <td>{{ $labUser->id }}</td> --}}
                                <td>{{ $testResult->barcode }}</td>
                                {{-- <td> @foreach ($testResult->testResults as $testResult)
                                    <option value="{{ $testResult->id }}">{{ $dependent->first_name }}</option>
                                @endforeach </td> --}}
                                <td>{{ $testResult->temperature }}</td>
                                <td>{{ $testResult->blood_pressure }}</td>
                                <td>{{ $testResult->oxygen_levels }}</td>
                                <td>
                                    <form action="{{ route('captures.destroy', $testResult->id) }}" method="POST">
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
                            <div class="py-3 mb-4 text-danger fw-bolder">No test results available</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection