<form action="{{ route('calendar.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="title" class="form-label">Event Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" id="end_date" name="end_date" class="form-control">
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Event Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save Event</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </div>
</form>