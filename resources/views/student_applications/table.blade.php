{{-- <form action="{{ route('student_applications.bulk-delete') }}" method="POST" id="bulkDeleteForm">
    @csrf

    <button type="submit" class="btn btn-danger mb-3" id="bulkDeleteBtn" disabled>
        <i class="fas fa-trash-alt"></i> Bulk Delete
    </button>

    <div class="table-responsive">
        <table class="table table-bordered" id="student-applications-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    <th>Student</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Phone Number 2</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Program</th>
                    <th>Points Scored</th>
                    <th>Secondary School</th>
                    <th>Guardian Name</th>
                    <th>Guardian Contact</th>
                    <th>Nationality</th>
                    <th>Interview Date</th>
                    <th>Interview Result</th>
                    <th>Submitted Documents</th>
                    <th>Combination</th>
                    <th>UACE Year of Completion</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{ $application->id }}" class="studentCheckbox"></td>
                    <td>{{ $application->user->first_name }} {{ $application->user->last_name }}</td>
                    <td>{{ $application->user->first_name }}</td>
                    <td>{{ $application->user->last_name }}</td>
                    <td>{{ $application->user->phone_number }}</td>
                    <td>{{ $application->user->phone_number2 }}</td>
                    <td>{{ $application->user->email }}</td>
                    <td>{{ $application->user->gender }}</td>
                    <td>{{ $application->date_of_birth }}</td>
                    <td>{{ $application->address }}</td>
                    <td>
                        @if ($application->status == 'approved')
                        <span class="badge badge-success">{{ $application->status }}</span>
                        @elseif ($application->status == 'rejected')
                        <span class="badge badge-danger">{{ $application->status }}</span>
                        @elseif ($application->status == 'pending')
                        <span class="badge badge-warning">{{ $application->status }}</span>
                        @else
                        <span class="badge badge-secondary">{{ $application->status }}</span>
                        @endif
                    </td>
                    <td>{{ $application->program->name }}</td>
                    <td>{{ $application->points_scored }}</td>
                    <td>{{ $application->secondary_school }}</td>
                    <td>{{ $application->guardian_name }}</td>
                    <td>{{ $application->guardian_contact }}</td>
                    <td>{{ $application->nationality }}</td>
                    <td>{{ $application->interview_date }}</td>
                    <td>
                        @if ($application->interview_result == 'passed')
                        <span class="badge badge-success">{{ ucfirst($application->interview_result) }}</span>
                        @elseif ($application->interview_result == 'failed')
                        <span class="badge badge-danger">{{ ucfirst($application->interview_result) }}</span>
                        @elseif ($application->interview_result == 'pending')
                        <span class="badge badge-warning ">{{ ucfirst($application->interview_result) }}</span>
                        @else
                        <span class="badge bg-secondary">{{ ucfirst($application->interview_result) }}</span>
                        @endif
                    </td>
                    <td>{{ $application->submitted_documents }}</td>
                    <td>{{ $application->combination }}</td>
                    <td>{{ $application->uace_year_of_completion }}</td>
                    <td class="text-center">
                        <a href="{{ route('student_applications.show', $application->id) }}"
                            class="btn btn-light btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('student_applications.edit', $application->id) }}"
                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('student_applications.destroy', $application->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this application?')"><i
                                    class="fa fa-trash"></i></button>
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
        $('#student-applications-table').DataTable({
            "paging": true,          
            "searching": true,       
            "ordering": true,        
            "pageLength": 5,         
            "lengthMenu": [5, 10, 25, 50] 
        });

        // Enable or disable the bulk delete button based on checkbox selection
        $('#student-applications-table').on('change', '.studentCheckbox', function() {
            var selectedCount = $('input.studentCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle the "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('input.studentCheckbox').prop('checked', isChecked).trigger('change');
        });
    });
</script> --}}



<form action="{{ route('student_applications.bulk-delete') }}" method="POST" id="bulkDeleteForm">
    @csrf

    <button type="submit" class="btn btn-danger mb-3" id="bulkDeleteBtn" disabled>
        <i class="fas fa-trash-alt"></i> Bulk Delete
    </button>

    <div class="table-responsive">
        <table class="table table-bordered" id="student-applications-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAll"></th>
                    {{-- <th>Student</th> --}}
                    <th>First Name</th>
                    <th>Last Name</th>
                    {{-- <th>Phone Number</th> --}}
                    {{-- <th>Phone Number 2</th> --}}
                    <th>Email</th>
                    {{-- <th>Gender</th> --}}
                    {{-- <th>Date of Birth</th> --}}
                    {{-- <th>Address</th> --}}
                    <th>Status</th>
                    {{-- <th>Program</th> --}}
                    {{-- <th>Cohort</th> --}}
                    {{-- <th>Points Scored</th> --}}
                    {{-- <th>Secondary School</th> --}}
                    {{-- <th>Guardian Name</th> --}}
                    {{-- <th>Guardian Contact</th> --}}
                    {{-- <th>Nationality</th> --}}
                    {{-- <th>Interview Date</th> --}}
                    {{-- <th>Interview Result</th> --}}
                    {{-- <th>Submitted Documents</th> --}}
                    {{-- <th>Combination</th> --}}
                    {{-- <th>UACE Year of Completion</th> --}}
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{ $application->id }}" class="studentCheckbox"></td>
                    {{-- <td>{{ $application->first_name }} {{ $application->last_name }}</td> --}}
                    <td>{{ $application->firstname }}</td>
                    <td>{{ $application->lastname }}</td>
                    {{-- <td>{{ $application->phone_number }}</td> --}}
                    {{-- <td>{{ $application->phone_number2 }}</td> --}}
                    <td>{{ $application->email }}</td>
                    {{-- <td>{{ $application->gender }}</td> --}}
                    {{-- <td>{{ $application->date_of_birth }}</td> --}}
                    {{-- <td>{{ $application->address }}</td> --}}
                    <td>
                        @if ($application->status == 'approved')
                        <span class="badge badge-success">{{ $application->status }}</span>
                        @elseif ($application->status == 'rejected')
                        <span class="badge badge-danger">{{ $application->status }}</span>
                        @elseif ($application->status == 'pending')
                        <span class="badge badge-warning">{{ $application->status }}</span>
                        @else
                        <span class="badge badge-secondary">{{ $application->status }}</span>
                        @endif
                    </td>
                    {{-- <td>{{ $application->program->name }}</td> --}}
                    {{-- <td>{{ $application->cohort->name }}</td> --}}
                    {{-- <td>{{ $application->points_scored }}</td> --}}
                    {{-- <td>{{ $application->secondary_school }}</td> --}}
                    {{-- <td>{{ $application->guardian_name }}</td> --}}
                    {{-- <td>{{ $application->guardian_contact }}</td> --}}
                    {{-- <td>{{ $application->nationality }}</td> --}}
                    {{-- <td>{{ $application->interview_date }}</td> --}}
                    {{-- <td>
                        @if ($application->interview_result == 'passed')
                        <span class="badge badge-success">{{ ucfirst($application->interview_result) }}</span>
                        @elseif ($application->interview_result == 'failed')
                        <span class="badge badge-danger">{{ ucfirst($application->interview_result) }}</span>
                        @elseif ($application->interview_result == 'pending')
                        <span class="badge badge-warning ">{{ ucfirst($application->interview_result) }}</span>
                        @else
                        <span class="badge bg-secondary">{{ ucfirst($application->interview_result) }}</span>
                        @endif
                    </td> --}}
                    {{-- <td>{{ $application->submitted_documents }}</td> --}}
                    {{-- <td>{{ $application->combination }}</td> --}}
                    {{-- <td>{{ $application->uace_year_of_completion }}</td> --}}
                    <td class="text-center">
                        <a href="{{ route('student_applications.show', $application->id) }}"
                            class="btn btn-light btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="{{ route('student_applications.edit', $application->id) }}"
                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('student_applications.destroy', $application->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this application?')"><i
                                    class="fa fa-trash"></i></button>
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
        $('#student-applications-table').DataTable({
            "paging": true,          
            "searching": true,       
            "ordering": true,        
            "pageLength": 5,         
            "lengthMenu": [5, 10, 25, 50] 
        });

        // Enable or disable the bulk delete button based on checkbox selection
        $('#student-applications-table').on('change', '.studentCheckbox', function() {
            var selectedCount = $('input.studentCheckbox:checked').length;
            $('#bulkDeleteBtn').prop('disabled', selectedCount === 0);
        });

        // Handle the "Select All" checkbox
        $('#selectAll').on('change', function() {
            var isChecked = $(this).prop('checked');
            $('input.studentCheckbox').prop('checked', isChecked).trigger('change');
        });
    });
</script>