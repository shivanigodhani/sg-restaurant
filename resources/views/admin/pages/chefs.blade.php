@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Chefs</h4>

                            <button type="button" class="btn btn-sm btn-primary" id="addChefBtn" data-bs-toggle="modal"
                                data-bs-target="#chefModal">
                                Add
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Experience</th>
                                        <th>Awards</th>
                                        <th>Status</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse($chefs as $chef)
                                        <tr>

                                            <td>
                                                @if ($chef->image)
                                                    <img src="{{ asset('uploads/chef/' . $chef->image) }}"
                                                        class="rounded-circle" width="70" height="70"
                                                        style="object-fit:cover;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>

                                            <td>
                                                {{ $chef->fname }} {{ $chef->lname }}
                                            </td>

                                            <td>{{ $chef->designation }}</td>

                                            <td>{{ $chef->experience }}</td>

                                            <td>{{ $chef->awards ?? '-' }}</td>

                                            <td>
                                                @if ($chef->status)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm viewBtn"
                                                    data-id="{{ $chef->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#viewChefModal">
                                                    View
                                                </button>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info btn-sm editBtn"
                                                    data-id="{{ $chef->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#chefModal">
                                                    Edit
                                                </button>
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm deleteBtn"
                                                    data-id="{{ $chef->id }}">
                                                    Delete
                                                </button>
                                            </td>

                                        </tr>

                                    @empty

                                        <tr>
                                            <td colspan="9" class="text-center">
                                                No chefs found.
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- ===========================
    Add / Edit Chef Modal
============================ -->
<div class="modal fade" id="chefModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <form id="chefForm" action="{{ route('admin.chef.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div id="methodField"></div>

                <input type="hidden" name="id" id="chef_id">

                <div class="modal-header">
                    <h5 class="modal-title" id="chefModalTitle">
                        Add Chef
                    </h5>

                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" id="fname" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" id="lname" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="designation" id="designation" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Experience</label>
                            <input type="text" class="form-control" name="experience" id="experience"
                                placeholder="5 Years" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Awards</label>
                            <input type="text" class="form-control" name="awards" id="awards">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status</label>

                            <select class="form-control" name="status" id="status">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Description</label>

                            <textarea class="form-control" rows="5" name="description" id="description" required></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Facebook</label>

                            <input type="url" class="form-control" name="facebook" id="facebook">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Instagram</label>

                            <input type="url" class="form-control" name="instagram" id="instagram">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>LinkedIn</label>

                            <input type="url" class="form-control" name="linkedin" id="linkedin">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Chef Image</label>

                            <input type="file" class="form-control" name="image" id="image"
                                accept="image/*">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" id="saveBtn">
                        Save
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
<script>
    $('#image').change(function() {

        let reader = new FileReader();

        reader.onload = function(e) {

            $('#imagePreview')
                .attr('src', e.target.result)
                .show();

        }

        reader.readAsDataURL(this.files[0]);

    });
    $('#addChefBtn').click(function() {

        $('#chefForm')[0].reset();

        $('#chef_id').val('');

        $('#imagePreview').hide();

        $('#chefModalTitle').text('Add Chef');

        $('#saveBtn').text('Save');

        $('#methodField').html('');

        $('#chefForm').attr('action', "{{ route('admin.chef.store') }}");

    });
    $('.editBtn').click(function() {

        let id = $(this).data('id');

        $.get("{{ url('admin/chefs') }}/" + id + "/edit", function(data) {

            $('#chefModalTitle').text('Edit Chef');

            $('#saveBtn').text('Update');

            $('#chef_id').val(data.id);

            $('#fname').val(data.fname);
            $('#lname').val(data.lname);
            $('#designation').val(data.designation);
            $('#experience').val(data.experience);
            $('#awards').val(data.awards);
            $('#description').val(data.description);
            $('#facebook').val(data.facebook);
            $('#instagram').val(data.instagram);
            $('#linkedin').val(data.linkedin);
            $('#status').val(data.status);

            if (data.image) {

                $('#imagePreview')
                    .attr('src', '/uploads/chef/' + data.image)
                    .show();

            } else {

                $('#imagePreview').hide();

            }

            $('#chefForm').attr('action', "{{ url('admin/chefs') }}/" + id);

            $('#methodField').html('');

        });

    });
</script>

@include('admin.layouts.footer')
