@extends('Layouts.layoutNurse')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5 text-center">Schedule Requests</h4>
                    <div class="table-responsive">
                        @csrf
                        <table id="editable" class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                                <tr>
                                    <th>About Request</th>
                                    <th>Date Scheduled</th>
                                    <th>Time Slot</th>
                                    <th>Status</th>
                                    <th><a href="javascript:window.print()"
                                            class="btn btn-success waves-effect waves-light me-1"><i
                                                class="fa fa-print"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($test_Bookings as $books)
                                    <tr data-id="{{ $books->id }}">
                                        <td>
                                            <div class="col-sm-6">
                                                <div class="text-muted">
                                                    <p class="mb-1">{{ $books->testrequest->addressLine1 }}
                                                        {{ $books->testrequest->addressLine2 }},
                                                        {{ $books->testrequest->suburb->name }}
                                                        {{ $books->testrequest->suburb->zipCode }}</p>
                                                    <p class="mb-1"> {{ $books->testrequest->user->email }}</p>
                                                    <p>{{ $books->testrequest->user->phone }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-field="date">
                                            @if ($books->date->isToday())
                                                <p>Today</p>
                                            @elseif($books->date->isTomorrow())
                                                <p>Tomorrow</p>
                                            @elseif($books->date->isYesterday())
                                                <p>Yesterday</p>
                                            @else
                                                {{ $books->date->toFormattedDateString() }}
                                            @endif
                                        </td>
                                        <td data-field="time_slot">{{ $books->time_slot }}</td>
                                        <td data-field="Status">{{ $books->Status }}</td>
                                        <td style="width: 100px">
                                            <form action="{{ route('captures.update', $books->id) }}" method="POST">
                                                @method('PATCH')
                                                @csrf
                                                <button type="" class="btn btn-outline-secondary btn-sm edit"
                                                    title="Edit"> <i class="fas fa-pencil-alt"></i> Reschedule
                                                </button>

                                                <input type="text" name="Status" value="Performed" hidden>
                                                <button type="submit" class="btn btn-outline-primary"
                                                    title="Capture"> <i class="fa fa-window-restore" aria-hidden="true"></i> Capture
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="py-3 fw-bolder text-success">You have no scheduled appointment</div>
                                @endforelse
                                <span>{{ $test_Bookings }}</span>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
