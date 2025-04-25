@extends('layouts.app')

@section('title')
StudentApplication Referral Sources
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>StudentApplication Referral Sources</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('referrals.create') }}" class="btn btn-primary mb-3">Add Referral</a>
        </div>
    </div>

    <div class="section-body">
        <!-- Referral Sources Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Student Application ID</th>
                    <th scope="col">Referral Source ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($referrals as $referral)
                <tr>
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    <td>{{ $referral->student_application_id }}</td>
                    <td>{{ $referral->referral_source_id }}</td>
                    <td>
                        <a href="{{ route('referrals.show', $referral->id) }}" class="btn btn-info btn-sm"><i
                                class='fa fa-eye'></i></a>
                        <a href="{{ route('referrals.edit', $referral->id) }}" class="btn btn-warning btn-sm"><i
                                class='fa fa-edit'></i></a>
                        <form action="{{ route('referrals.destroy', $referral->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this referral?')"><i
                                    class='fa fa-trash'></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</section>

@endsection