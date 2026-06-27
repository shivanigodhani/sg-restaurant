@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Events</h4>
                        <button type="button" class="btn btn-sm btn-primary"
                            id="addEventBtn"
                            data-bs-toggle="modal"
                            data-bs-target="#eventModal">
                            Add
                        </button>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->start_date }}</td>
                                    <td>{{ $event->end_date }}</td>
                                    <td>₹{{ number_format($event->price,2) }}</td>
                                    <td>
                                        @if($event->status)
                                            <label class="badge badge-outline-success">Active</label>
                                        @else
                                            <label class="badge badge-outline-danger">Inactive</label>
                                        @endif
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm editBtn"
                                            data-id="{{ $event->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#eventModal">
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="{{ $event->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="eventForm" action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Title</label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                placeholder="Enter title"
                                required>
                        </div>

                        <!-- Slug -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Slug</label>
                            <input
                                type="text"
                                class="form-control"
                                id="slug"
                                name="slug"
                                readonly>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea
                                class="form-control"
                                id="description"
                                rows="4"
                                name="description"></textarea>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Image</label>
                            <input
                                type="file"
                                class="form-control"
                                name="image">
                        </div>

                        <!-- Tag -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tag</label>
                            <input
                                type="text"
                                id="tag"
                                class="form-control"
                                name="tag">
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input
                                type="date"
                                id="start_date"
                                class="form-control"
                                name="start_date">
                        </div>

                        <!-- End Date -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input
                                type="date"
                                class="form-control"
                                id="end_date"
                                name="end_date">
                        </div>

                        <!-- Capacity -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Capacity</label>
                            <input
                                type="number"
                                class="form-control"
                                id="capacity"
                                name="capacity">
                        </div>

                        <!-- Location -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Location</label>
                            <input
                                type="text"
                                id="location"
                                class="form-control"
                                name="location">
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Price</label>
                            <input
                                type="number"
                                step="0.01"
                                id="price"
                                class="form-control"
                                name="price">
                        </div>

                        <!-- Featured -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Featured</label>
                            <select
                                class="form-select"
                                id="featured"
                                name="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Status</label>
                            <select
                                class="form-select"
                                id="status"
                                name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        type="submit"
                        id="saveBtn"
                        class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

    // update
    $(document).on('click', '.editBtn', function () {
        let id = $(this).data('id');

        $.ajax({
            url: "/admin/events/" + id + "/edit",
            type: "GET",
            success: function (data) {
                $('#modalTitle').text('Edit Event');
                $('#saveBtn').text('Update');
                $('#eventForm').attr('action', '/admin/events/' + id);
                $('#methodField').val('PUT');
                $('#event_id').val(data.id);
                $('#title').val(data.title);
                $('#slug').val(data.slug);
                $('#description').val(data.description);
                $('#tag').val(data.tag);
                $('#start_date').val(data.start_date);
                $('#end_date').val(data.end_date);
                $('#capacity').val(data.capacity);
                $('#location').val(data.location);
                $('#price').val(data.price);
                $('#featured').val(data.featured);
                $('#status').val(data.status);
            }
        });
    });

    // form reset
    $('#addEventBtn').click(function () {
        $('#eventForm')[0].reset();
        $('#event_id').val('');
        $('#methodField').val('POST');
        $('#modalTitle').text('Add Event');
        $('#saveBtn').text('Save');
        $('#eventForm').attr('action', "{{ route('admin.events.store') }}");
    });

    // delete
    $(document).on('click', '.deleteBtn', function () {
        let id = $(this).data('id');

        // if (confirm('Are you sure you want to delete this event?')) {
            $.ajax({
                url: '/admin/events/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // alert(response.message);
                    location.reload(); // or remove the row dynamically
                },
                error: function () {
                    alert('Something went wrong.');
                }
            });
        // }
    });

    // Slug
    $(document).on('input', '#title', function () {
        let slug = $(this).val()
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/--+/g, '-');
        $('#slug').val(slug);
    });

</script>

@include('admin.layouts.footer')