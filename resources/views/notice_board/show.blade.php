@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">{{ $notice->title }}</h3>
    <p><strong>Date:</strong> {{ $notice->date->format('d M, Y') }}</p>
    <p><strong>Views:</strong> {{ $notice->views }}</p>
</div>
@endsection