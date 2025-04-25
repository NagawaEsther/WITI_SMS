{{--

<div class="table-responsive">
    <table class="table table-striped table-bordered" id="programs-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Program Code</th>
                <th>Credit Required</th>
                <th>Created By</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->name }}</td>
                <td>{{ $program->duration }}</td>
                <td>
                    @if ($program->status == 'active')
                    <span class="badge bg-success text-white">{{ ucfirst($program->status) }}</span>
                    @elseif ($program->status == 'inactive')
                    <span class="badge bg-danger text-white">{{ ucfirst($program->status) }}</span>
                    @else
                    <span class="badge bg-secondary text-white">{{ ucfirst($program->status) }}</span>
                    @endif
                </td>
                <td>{{ $program->program_code }}</td>
                <td>{{ $program->credit_required }}</td>
                <td>{{ $program->user->first_name }}</td>
                <td class="text-center">
                    <a href="{{ route('programs.show', [$program->id]) }}" class="btn btn-light btn-sm"><i
                            class="fa fa-eye"></i></a>
                    <a href="{{ route('programs.edit', [$program->id]) }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-edit"></i></a>
                    {!! Form::open(['route' => ['programs.destroy', $program->id], 'method' => 'delete', 'style' =>
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
        $('#programs-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
</script> --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    {{-- <h3>Programs List</h3> --}}
    <button type="submit" class="btn btn-danger" id="bulkDeleteBtn" disabled>
        <i class="fas fa-trash-alt"></i> Bulk Delete
    </button>
</div>

<form action="{{ route('programs.bulk-delete') }}" method="POST" id="bulkDeleteForm">
    @csrf
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="programs-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Name</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Program Code</th>
                    <th>Credit Required</th>
                    <th>Created By</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{ $program->id }}" class="programCheckbox"></td>
                    <td>{{ $program->name }}</td>
                    <td>{{ $program->duration }}</td>
                    <td>
                        @if ($program->status == 'active')
                        <span class="badge bg-success text-white">{{ ucfirst($program->status) }}</span>
                        @elseif ($program->status == 'inactive')
                        <span class="badge bg-danger text-white">{{ ucfirst($program->status) }}</span>
                        @else
                        <span class="badge bg-secondary text-white">{{ ucfirst($program->status) }}</span>
                        @endif
                    </td>
                    <td>{{ $program->program_code }}</td>
                    <td>{{ $program->credit_required }}</td>
                    <td>{{ $program->user->first_name }}</td>
                    <td class="text-center">
                        <a href="{{ route('programs.show', [$program->id]) }}" class="btn btn-light btn-sm"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('programs.edit', [$program->id]) }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-edit"></i></a>
                        {!! Form::open(['route' => ['programs.destroy', $program->id], 'method' => 'delete', 'style' =>
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
        $('#programs-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });

        // Enable or disable the Bulk Delete button based on selection
        $('#programs-table').on('change', '.programCheckbox', function() {
            var selectedCount = $('input.programCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('input.programCheckbox').prop('checked', isChecked).trigger('change');
        });

        // Prevent form submission if no program is selected
        $('#bulkDeleteForm').on('submit', function(e) {
            var selectedCount = $('input.programCheckbox:checked').length;
            if (selectedCount === 0) {
                e.preventDefault();
                alert('Please select at least one program to delete.');
            }
        });
    });
</script>