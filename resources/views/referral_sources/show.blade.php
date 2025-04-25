@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Referral Source Details</h2>

    <div>
        @include('referral_sources.show_fields')
    </div>

    <a href="{{ route('referral_sources.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('referral_sources.edit', $referralSource->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection