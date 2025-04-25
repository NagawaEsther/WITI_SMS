@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Session Closed</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <p>This attendance session has expired or been closed.</p>
                        <p>Please contact your lecturer if you need assistance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection