{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h3>Feedback & Suggestions</h3>



    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Your Feedback or Suggestion:</label>
            <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@endsection


--}}


@extends('layouts.app')

@section('content')
<div class="container  animate-in" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #4842421c; color: black;">
                    <h3 class="mb-0">Feedback & Suggestions</h3>
                </div>

                <div class="card-body">
                    {{-- Feedback Form --}}
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Feedback or Suggestion:</label>
                            <textarea name="message" id="message" rows="5"
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="Please share your feedback or suggestion here..."
                                required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Submit Feedback
                            </button>
                        </div>
                    </form>

                    {{-- Recent Feedbacks Section --}}
                    @if(isset($feedbacks) && $feedbacks->count() > 0)
                    <div class="mt-4">
                        <h4 class="border-bottom pb-2 mb-3">Your Recent Feedbacks</h4>
                        <div class="list-group">
                            @foreach($feedbacks as $feedback)
                            <div class="list-group-item list-group-item-action">
                                <p class="mb-1">{{ $feedback->message }}</p>
                                <small class="text-muted">
                                    Submitted {{ $feedback->created_at->diffForHumans() }}
                                </small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .mt-100 {
        margin-top: 100%;
    }

    .animate-in {
        animation: fadeInDown 1s ease-out forwards;
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection






{{--

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Feedback & Suggestions</h3>
                    <span class="badge bg-light text-primary">
                        <i class="fas fa-comment-dots me-1"></i>Share Your Thoughts
                    </span>
                </div>

                <div class="card-body" style="background-color: #f5f5f5;">

                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Feedback Category</label>
                                <select name="category" id="category" class="form-select" required>
                                    <option value="">Select Category</option>
                                    <option value="academic" {{ old('category')=='academic' ? 'selected' : '' }}>
                                        Academic</option>
                                    <option value="infrastructure" {{ old('category')=='infrastructure' ? 'selected'
                                        : '' }}>
                                        Infrastructure</option>
                                    <option value="faculty" {{ old('category')=='faculty' ? 'selected' : '' }}>
                                        Faculty</option>
                                    <option value="administration" {{ old('category')=='administration' ? 'selected'
                                        : '' }}>
                                        Administration</option>
                                    <option value="other" {{ old('category')=='other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="type" class="form-label">Feedback Type</label>
                                <select name="type" id="type" class="form-select" required>
                                    <option value="">Select Type</option>
                                    <option value="suggestion" {{ old('type')=='suggestion' ? 'selected' : '' }}>
                                        Suggestion</option>
                                    <option value="complaint" {{ old('type')=='complaint' ? 'selected' : '' }}>
                                        Complaint</option>
                                    <option value="appreciation" {{ old('type')=='appreciation' ? 'selected' : '' }}>
                                        Appreciation</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Your Feedback or Suggestion:</label>
                            <textarea name="message" id="message" rows="5" class="form-control"
                                placeholder="Please provide detailed feedback here..."
                                required>{{ old('message') }}</textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="anonymous" name="anonymous" {{
                                old('anonymous') ? 'checked' : '' }}>
                            <label class="form-check-label" for="anonymous">
                                Submit Anonymously
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Submit Feedback
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const message = document.getElementById('message');
            const category = document.getElementById('category');
            const type = document.getElementById('type');

           
            if (message.value.trim().length < 10) {
                e.preventDefault();
                alert('Please provide more detailed feedback (minimum 10 characters)');
            }
        });
    });
</script>
@endpush --}}