{{-- @extends('layouts.app')

@section('content')
<div class="card p-4 mb-3" style="border: 2px solid white;">
    <h5 style="color: black;">Academic Calendar</h5>

    <!-- Form to add new event -->
    <form action="{{ route('calendar.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Event Description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>

    <!-- Bulk Delete Form -->
    <form action="{{ route('calendar.bulkDelete') }}" method="POST" id="bulk-delete-form">
        @csrf
        <button type="submit" class="btn btn-danger mt-3 ms-3">Bulk delete</button>
    </form>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover calendar-table">
            <thead class="table-dark">
                <tr>
                    <th>
                        <input type="checkbox" id="select-all">
                    </th>
                    <th>Dates</th>
                    <th>Activity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>
                        <input type="checkbox" class="event-checkbox" value="{{ $event->id }}">
                    </td>
                    <td>
                        {{ \Carbon\Carbon::parse($event->start_date)->format('D d M Y') }}
                        @if($event->end_date && $event->end_date != $event->start_date)
                        – {{ \Carbon\Carbon::parse($event->end_date)->format('D d M Y') }}
                        @endif
                    </td>
                    <td>{{ $event->title }}</td>
                    <td>
                        <form action="{{ route('calendar.destroy', $event->id) }}" method="POST"
                            onsubmit="return confirm('Delete this event?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($events->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">No events found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable with search functionality
        $('.calendar-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });

        // Handle select/deselect all checkboxes
        $('#select-all').click(function() {
            $('.event-checkbox').prop('checked', this.checked);
        });

        // Handle bulk delete
        $('#bulk-delete-form').submit(function(event) {
            event.preventDefault();
            var selectedEvents = [];
            $('.event-checkbox:checked').each(function() {
                selectedEvents.push($(this).val());
            });

            if (selectedEvents.length > 0) {
                var formData = {
                    _token: $('input[name="_token"]').val(),
                    event_ids: selectedEvents
                };

                $.post("{{ route('calendar.bulkDelete') }}", formData, function(response) {
                    if (response.success) {
                        alert("Events deleted successfully!");
                        location.reload();
                    } else {
                        alert("An error occurred while deleting events.");
                    }
                });
            } else {
                alert("Please select at least one event to delete.");
            }
        });
    });
</script>
@endsection --}}
{{-- views/calendar/index.php --}}

@extends('layouts.app')

@section('content')
<div class="card p-4 mb-3" style="background-color: white; border: 2px solid #9c4434;">
    <h5 style="color: black;">Academic Calendar</h5>

    <!-- Add Event Form -->
    <form action="{{ route('calendar.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Event Description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>

    <!-- Bulk Delete Form -->
    <form action="{{ route('calendar.bulkDelete') }}" method="POST" id="bulk-delete-form">
        @csrf
        <button type="submit" class="btn btn-danger mt-3 ms-3">Bulk delete</button>
    </form>

    <!-- Events Table -->
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover calendar-table">
            <thead class="table-dark">
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>Dates</th>
                    <th>Activity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td><input type="checkbox" class="event-checkbox" value="{{ $event->id }}"></td>
                    <td>
                        {{ \Carbon\Carbon::parse($event->start_date)->format('D d M Y') }}
                        @if($event->end_date && $event->end_date != $event->start_date)
                        – {{ \Carbon\Carbon::parse($event->end_date)->format('D d M Y') }}
                        @endif
                    </td>
                    <td>{{ $event->title }}</td>
                    <td>
                        <form action="{{ route('calendar.destroy', $event->id) }}" method="POST"
                            onsubmit="return confirm('Delete this event?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($events->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">No events found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- Calendar Display -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Academic Calendar</h5>
        <div>
            <button id="prev-month" class="btn btn-sm btn-outline-secondary me-1">
                <i class="fas fa-chevron-left"></i>
            </button>
            <span id="current-month-display">{{ date('F Y') }}</span>
            <button id="next-month" class="btn btn-sm btn-outline-secondary ms-1">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div id="calendar-container">
            <table class="table table-bordered calendar-table">
                <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody id="calendar-body">
                    <!-- Populated by JS -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Include jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!-- Pass Laravel Events to JS -->
<script>
    const events = @json($events);
</script>

<!-- Calendar Script -->
<script>
    const calendarBody = document.getElementById("calendar-body");
    const monthDisplay = document.getElementById("current-month-display");
    let currentDate = new Date();

    function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarBody.innerHTML = "";

        let dateNum = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement("tr");

            for (let j = 0; j < 7; j++) {
                const cell = document.createElement("td");
                if (i === 0 && j < firstDay) {
                    cell.innerHTML = "";
                } else if (dateNum > daysInMonth) {
                    break;
                } else {
                    const cellDate = new Date(year, month, dateNum);
                    const formattedDate = cellDate.toISOString().split('T')[0];

                    const eventMatch = events.find(event => event.start_date === formattedDate);

                    if (eventMatch) {
                        cell.innerHTML = `<span class="badge bg-maroon">${dateNum}</span><br><small>${eventMatch.title}</small>`;
                        cell.classList.add("bg-light");
                    } else {
                        cell.innerText = dateNum;
                    }

                    dateNum++;
                }
                row.appendChild(cell);
            }

            calendarBody.appendChild(row);
        }

        monthDisplay.innerText = date.toLocaleString('default', { month: 'long', year: 'numeric' });
    }

    document.getElementById("prev-month").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById("next-month").addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
</script>

<!-- Handle Select All and Bulk Delete -->
<script>
    $(document).ready(function() {
        $('.calendar-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });

        $('#select-all').click(function() {
            $('.event-checkbox').prop('checked', this.checked);
        });

        $('#bulk-delete-form').submit(function(event) {
            event.preventDefault();
            var selectedEvents = [];
            $('.event-checkbox:checked').each(function() {
                selectedEvents.push($(this).val());
            });

            if (selectedEvents.length > 0) {
                var formData = {
                    _token: $('input[name="_token"]').val(),
                    event_ids: selectedEvents
                };

                $.post("{{ route('calendar.bulkDelete') }}", formData, function(response) {
                    if (response.success) {
                        alert("Events deleted successfully!");
                        location.reload();
                    } else {
                        alert("An error occurred while deleting events.");
                    }
                });
            } else {
                alert("Please select at least one event to delete.");
            }
        });
    });
</script>

<!-- Styling for Maroon Badge -->
<style>
    .bg-maroon {
        background-color: #9c4434 !important;
        color: white;
        padding: 5px 8px;
        border-radius: 50%;
    }
</style>
@endsection