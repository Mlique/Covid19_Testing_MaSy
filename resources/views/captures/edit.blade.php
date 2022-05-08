@extends('Layouts.layoutNurse')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Editable Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('captuers.edit') }}">Tables</a></li>
                    <li class="breadcrumb-item active">Editable Table</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<form action="{{ route('captures.update',$testRequest->id) }}" method="POST">

    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Table Edits</h4>
                    <p class="card-title-desc">Table Edits is a lightweight jQuery plugin for making table rows editable.</p>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th hidden>Request ID</th>
                                    <th hidden>Patient ID</th>
                                    <th hidden>Lab User ID</th>
                                    <th>Barcode</th>
                                    <th>Test Result</th>
                                    <th>Temperature</th>
                                    <th>Blood Pressure</th>
                                    <th>Oxygen Levels</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-field="test_request_id">{{ $testRequest->id }}</td>
                                    <td data-field="main_member_id">{{ Auth::user()->id }}</td>
                                    <td data-field="labUser_id">{{ $labUser->id }}</td>
                                    <td data-field="barcode">{{ $testResult->barcode }}</td>
                                    <td data-field="test_result">{{ $testResult->test_result}}</td>
                                    <td data-field="temperature">{{ $testResult->temperature }}</td>
                                    <td data-field="blood_pressure">{{ $testResult->blood_pressure }}</td>
                                    <td data-field="oxygen_levels">{{ $testResult->oxygen_levels }}</td>
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-id="{{ $testResult->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-secondary btn-sm delete" title="Delete" data-id="{{ $testResult->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('captures.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

</form>
@endsection
