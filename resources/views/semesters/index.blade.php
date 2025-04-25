@extends('layouts.app')
@section('title')
    Semesters 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Semesters</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('semesters.create')}}" class="btn btn-primary form-btn"> Add Semester <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('semesters.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

