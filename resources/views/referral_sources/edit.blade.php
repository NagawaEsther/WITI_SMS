@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Referral Source</h2>

    <form action="{{ route('referral_sources.update', $referralSource->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('referral_sources.fields')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection