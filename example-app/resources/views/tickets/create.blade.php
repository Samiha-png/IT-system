<form action="{{ route('tickets.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Your PC IP Address:</label>
        <input type="text" class="form-control" value="{{ request()->ip() }}" disabled>
        <small>Detected automatically</small>
    </div>
    
    <div class="form-group">
        <label>Describe the Issue:</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit Ticket</button>
</form>