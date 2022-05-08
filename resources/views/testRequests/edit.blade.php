@extends('Layouts.patient')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Editable Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('testRequests.index') }}">Tables</a></li>
                    <li class="breadcrumb-item active">Editable Table</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<form action="{{ route('testRequests.update',$testRequest->id) }}" method="POST">

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
                                    <th>Test Date</th>
                                    <th>Number of people</th>
                                    <th>Address Line 1</th>
                                    <th>Address Line 2</th>
                                    <th>Suburb</th>
                                    <th>City</th>
                                    <th>Postal/Zip Code</th>
                                    <th>Family Members to Test</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-field="date">{{ $testRequest->date }}</td>
                                    <td data-field="number_of_people">{{ $testRequest->number_of_people }}</td>
                                    <td data-field="addressLine1">{{ $testRequest->addressLine1 }}</td>
                                    <td data-field="addressLine2">{{ $testRequest->addressLine2 }}</td>
                                    <td data-field="suburb_id">{{ $testRequest->suburb->name }}</td>
                                    <td data-field="city_id">{{ $testRequest->city->name }}</td>
                                    <td data-field="zipCode">{{ $testRequest->zipCode }}</td>
                                    <td data-field="dependent_id">@foreach ($dependents as $dependent)
                                        <option value="{{ $dependent->id }}">{{ $dependent->first_name }}</option>
                                        @endforeach</td>
                                    <td style="width: 100px">
                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-id="{{ $testRequest->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-secondary btn-sm delete" title="Delete" data-id="{{ $testRequest->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('testRequests.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

</form>
@endsection
