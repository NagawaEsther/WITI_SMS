<div class="d-flex justify-content-between align-items-center mb-3">
    {{-- <h3>Semesters List</h3> --}}
    <button type="submit" class="btn btn-danger" id="bulkDeleteBtn" disabled>
        <i class="fas fa-trash-alt"></i> Bulk Delete
    </button>
</div>

<form action="{{ route('semesters.bulk-delete') }}" method="POST" id="bulkDeleteForm">
    @csrf
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="semesters-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Program</th>
                    <th>Created By</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($semesters as $semester)
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{ $semester->id }}" class="semesterCheckbox"></td>
                    <td>{{ $semester->name }}</td>
                    <td>{{ $semester->start_date }}</td>
                    <td>{{ $semester->end_date }}</td>
                    <td>
                        <span class="badge bg-success text-white">{{ $semester->status }}</span>
                    </td>
                    <td>{{ $semester->program->name ?? 'Loading....' }}</td>
                    <td>{{ $semester->user->first_name ?? 'Unknown' }}</td>
                    <td class="text-center">
                        <a href="{{ route('semesters.show', $semester->id) }}" class="btn btn-light btn-sm"><i
                                class="fa fa-eye"></i></a>
                        <a href="{{ route('semesters.edit', $semester->id) }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-edit"></i></a>
                        <form action="{{ route('semesters.destroy', $semester->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#semesters-table').DataTable({
            "paging": true,          
            "searching": true,       
            "ordering": true,        
            "pageLength": 5,         
            "lengthMenu": [5, 10, 25, 50] 
        });

        // Enable or disable the Bulk Delete button based on selection
        $('#semesters-table').on('change', '.semesterCheckbox', function() {
            var selectedCount = $('input.semesterCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('input.semesterCheckbox').prop('checked', isChecked).trigger('change');
        });

        // Prevent form submission if no semester is selected
        $('#bulkDeleteForm').on('submit', function(e) {
            var selectedCount = $('input.semesterCheckbox:checked').length;
            if (selectedCount === 0) {
                e.preventDefault();
                alert('Please select at least one semester to delete.');
            }
        });
    });
</script>