<div class="search-bar">
    <form action="{{ route('programs.index') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search for courses" wire:model="search">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>