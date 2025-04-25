{{-- views/modules/index.php --}}



@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-4">All Modules</h4>

    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Add New Module</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Course Unit</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Lessons</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Icon</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1; @endphp
                @foreach($modules->groupBy('course_unit_id') as $courseUnitId => $groupedModules)
                @php $rowspan = count($groupedModules); $first = true; @endphp
                @foreach($groupedModules as $module)
                <tr @if($module->status === 'current') class="table-warning" @endif>
                    <td>{{ $count++ }}</td>

                    @if($first)
                    <td rowspan="{{ $rowspan }}">{{ $module->courseUnit->name }}</td>
                    @php $first = false; @endphp
                    @endif

                    <td>{{ $module->title }}</td>
                    <td>{{ $module->subtitle ?? '-' }}</td>
                    <td>{{ $module->lesson_count }}</td>
                    <td>{{ $module->duration }}</td>
                    <td>
                        @if($module->status === 'completed')
                        <span class="badge bg-success">✔ Completed</span>
                        @elseif($module->status === 'current')
                        <span class="badge bg-warning text-dark">Current</span>
                        @elseif($module->status === 'locked')
                        <span class="badge bg-secondary">Locked</span>
                        @endif
                    </td>
                    <td>
                        <i class="fas {{ $module->icon }}"></i>
                    </td>
                </tr>
                @endforeach
                @endforeach

                @if($modules->isEmpty())
                <tr>
                    <td colspan="8" class="text-muted">No modules available.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection