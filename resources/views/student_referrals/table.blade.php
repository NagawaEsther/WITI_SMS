<!-- resources/views/student_referrals/_table.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Student Application ID</th>
                <th>Referral Source ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($referrals as $referral)
            <tr>
                <td>{{ $referral->student_application_id }}</td>
                <td>{{ $referral->referral_source_id }}</td>
                <td>
                    <a href="{{ route('referrals.edit', $referral->id) }}"><i class='fa fa-eye'></i></a>
                    <form action="{{ route('referrals.destroy', $referral->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection