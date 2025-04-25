@extends('layouts.app')

@section('title')
Create Referral Source
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Referral Source</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('referral_sources.index') }}" class="btn btn-secondary">Back to Referral Sources</a>
        </div>
    </div>

    <div class="section-body">
        <form action="{{ route('referral_sources.store') }}" method="POST">
            @csrf
            @include('referral_sources.fields')
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</section>
@endsection