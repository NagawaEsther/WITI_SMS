@extends('layouts.app')
@section('title')
Programs
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Programs</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('programs.create')}}" class="btn btn-primary form-btn">Add Program <i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('programs.table')
            </div>
        </div>
    </div>

</section>
@endsection