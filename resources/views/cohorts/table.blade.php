{{--

<div class="table-responsive">
    <table class="table table-striped table-bordered" id="cohorts-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Expected Graduation Date</th>
                <th>Curriculum</th>
                <th>Number of Students</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cohorts as $cohort)
            <tr>
                <td>{{ $cohort->name }}</td>
                <td>{{ \Carbon\Carbon::parse($cohort->start_date)->format('d M Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($cohort->end_date)->format('d M Y') }}</td>
                <td>
                    @if ($cohort->status == 'active')
                    <span class="badge bg-success text-white">{{ ucfirst($cohort->status) }}</span>
                    @elseif ($cohort->status == 'inactive')
                    <span class="badge bg-danger text-white">{{ ucfirst($cohort->status) }}</span>
                    @else
                    <span class="badge bg-secondary text-white">{{ ucfirst($cohort->status) }}</span>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($cohort->expected_graduation_date)->format('d M Y') }}</td>
                <td>{{ $cohort->curriculum }}</td>
                <td>{{ $cohort->number_of_students }}</td>
                <td class="text-center">
                    <a href="{{ route('cohorts.show', [$cohort->id]) }}" class="btn btn-light btn-sm"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('cohorts.edit', [$cohort->id]) }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-edit"></i></a>
                    {!! Form::open(['route' => ['cohorts.destroy', $cohort->id], 'method' => 'delete', 'style' =>
                    'display:inline;']) !!}
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                    btn-sm', 'onclick' => 'return confirm("Are you sure you want to delete this record?")']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#cohorts-table').DataTable({
            "paging": true,          
            "searching": true,       
            "ordering": true,        
            "pageLength": 5,         
            "lengthMenu": [5, 10, 25, 50] 
        });
    });
</script> --}}


<div class="d-flex justify-content-between align-items-center mb-3">
    {{-- <h3>Cohorts List</h3> --}}
    <button type="submit" class="btn btn-danger" id="bulkDeleteBtn" disabled>
        <i class="fas fa-trash-alt"></i> Bulk Delete
    </button>
</div>

<form action="{{ route('cohorts.bulk-delete') }}" method="POST" id="bulkDeleteForm">
    @csrf
    <div class="table-responsive">
        <table class="table table-striped table-bordered bg-white" id="cohorts-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    {{-- <th>Expected Graduation Date</th> --}}
                    {{-- <th>Curriculum</th> --}}
                    <th>Number of Students</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cohorts as $cohort)
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{ $cohort->id }}" class="cohortCheckbox"></td>
                    <td>{{ $cohort->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($cohort->start_date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($cohort->end_date)->format('d M Y') }}</td>
                    <td>
                        @if ($cohort->status == 'active')
                        <span class="badge bg-success text-white">{{ ucfirst($cohort->status) }}</span>
                        @elseif ($cohort->status == 'inactive')
                        <span class="badge bg-danger text-white">{{ ucfirst($cohort->status) }}</span>
                        @else
                        <span class="badge bg-secondary text-white">{{ ucfirst($cohort->status) }}</span>
                        @endif
                    </td>
                    {{-- <td>{{ \Carbon\Carbon::parse($cohort->expected_graduation_date)->format('d M Y') }}</td> --}}
                    {{-- <td>{{ $cohort->curriculum }}</td> --}}
                    <td>{{ $cohort->number_of_students }}</td>
                    <td class="text-center">
                        <a href="{{ route('cohorts.show', [$cohort->id]) }}" class="btn btn-light btn-sm"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('cohorts.edit', [$cohort->id]) }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-edit"></i></a>
                        {!! Form::open(['route' => ['cohorts.destroy', $cohort->id], 'method' => 'delete', 'style' =>
                        'display:inline;']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger
                        btn-sm', 'onclick' => 'return confirm("Are you sure you want to delete this record?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#cohorts-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });

        // Enable or disable the Bulk Delete button based on checkbox selection
        $('#cohorts-table').on('change', '.cohortCheckbox', function() {
            var selectedCount = $('input.cohortCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('input.cohortCheckbox').prop('checked', isChecked).trigger('change');
        });

        // Prevent form submission if no cohort is selected
        $('#bulkDeleteForm').on('submit', function(e) {
            var selectedCount = $('input.cohortCheckbox:checked').length;
            if (selectedCount === 0) {
                e.preventDefault();
                alert('Please select at least one cohort to delete.');
            }
        });
    });
</script>