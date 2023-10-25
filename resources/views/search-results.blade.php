<form action="{{ route('search') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input
            type="text"
            name="keyword"
            placeholder="Search..."
            class="form-control"
        />
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
