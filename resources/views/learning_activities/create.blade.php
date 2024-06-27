<!-- Modal for Create -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
          <h5 class="modal-title" id="createModalLabel">Create New Activity</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('learning-activity.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="method">Metode</label>
              <select class="form-select" aria-label="Default select example" name="metode_id">
                @foreach($metodes as $metode)
                <option value="{{ $metode->id }}">{{ $metode->name }}</option>
                @endforeach
              </select>
            </div>
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="start_date">Start Date</label>
                  <input type="date" name="start_date" class="form-control" required  min="2024-01-01" max="2024-06-30">
              </div>
              <div class="form-group">
                  <label for="end_date">End Date</label>
                  <input type="date" name="end_date" class="form-control" required  min="2024-01-01" max="2024-06-30">
              </div>
              <div class="d-flex">
                  <button type="submit" class="btn btn-primary my-3">Save</button >
              </div>
          </form>
        </div>
      </div>
    </div>
</div>

