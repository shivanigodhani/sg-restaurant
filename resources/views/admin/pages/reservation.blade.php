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
                        <h4 class="card-title">Reservations</h4>
                        <button type="button" class="btn btn-sm btn-primary"
                            id="addReservationBtn"
                            data-bs-toggle="modal"
                            data-bs-target="#reservationModal">
                            Add
                        </button>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Reservation Date</th>
                            <th>Time</th>
                            <th>Occasion</th>
                            <th colspan="3">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->full_name }}</td>
                                    <td>{{ $reservation->phone }}</td>
                                    <td>{{ $reservation->reservation_date }}</td>
                                    <td>{{ $reservation->reservation_time }}</td>
                                    <td>{{ $reservation->occasion }}</td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-warning btn-sm viewBtn"
                                            data-id="{{ $reservation->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#viewReservationModal">
                                            View
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm editBtn"
                                            data-id="{{ $reservation->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#reservationModal">
                                            Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="{{ $reservation->id }}">
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

<div class="modal fade" id="viewReservationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Reservation Details</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td id="v_name"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="v_email"></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td id="v_phone"></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td id="v_date"></td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td id="v_time"></td>
                    </tr>
                    <tr>
                        <th>Guests</th>
                        <td id="v_guests"></td>
                    </tr>
                    <tr>
                        <th>Occasion</th>
                        <td id="v_occasion"></td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td id="v_message"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reservationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form id="reservationForm">
            @csrf

            <input type="hidden" id="reservation_id">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="modalTitle">Add Reservation</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Name -->
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" id="full_name" class="form-control">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="email" class="form-control">
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" id="phone" class="form-control">
                    </div>

                    <!-- Date -->
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" id="reservation_date" class="form-control">
                    </div>

                    <!-- Time -->
                    <div class="mb-3">
                        <label>Time</label>
                        <input type="time" id="reservation_time" class="form-control">
                    </div>

                    <!-- Guests -->
                    <div class="mb-3">
                        <label>Guests</label>
                        <input type="number" id="guest_count" class="form-control">
                    </div>

                    <!-- Occasion -->
                    <div class="mb-3">
                        <label>Occasion</label>
                        <input type="text" id="occasion" class="form-control">
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea id="message" class="form-control"></textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-primary" id="saveBtn">
                        Save
                    </button>

                </div>

            </div>

        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $("#saveBtn").click(function (e) {
        e.preventDefault();

        let id = $("#reservation_id").val();

        let url = id
            ? "/admin/reservations/update/" + id
            : "/admin/reservations/store";

        let method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            type: method,
            data: {
                _token: "{{ csrf_token() }}",
                full_name: $("#full_name").val(),
                email: $("#email").val(),
                phone: $("#phone").val(),
                reservation_date: $("#reservation_date").val(),
                reservation_time: $("#reservation_time").val(),
                guests: $("#guests").val(),
                occasion: $("#occasion").val(),
                special_request: $("#special_request").val(),
            },
            success: function (res) {
                alert(res.message);
                location.reload();
            },
            error: function (err) {
                console.log(err);
                alert("Something went wrong");
            }
        });
    });
</script>

<script>
    $("#addReservationBtn").click(function () {
        $("#modalTitle").text("Add Reservation");
        $("#reservationForm")[0].reset();
        $("#reservation_id").val("");
    });

    $(".viewBtn").click(function () {
        let id = $(this).data("id");

        $.get("/admin/reservations/" + id, function (res) {
            $("#v_name").text(res.full_name);
            $("#v_email").text(res.email);
            $("#v_phone").text(res.phone);
            $("#v_date").text(res.reservation_date);
            $("#v_time").text(res.reservation_time);
            $("#v_guests").text(res.guest_count);
            $("#v_occasion").text(res.occasion);
            $("#v_special_request").text(res.special_request);
        });
    });

    $(".editBtn").click(function () {
        let id = $(this).data("id");

        $("#modalTitle").text("Edit Reservation");
        $.get("/admin/reservations/" + id, function (res) {
            $("#reservation_id").val(res.id);
            $("#full_name").val(res.full_name);
            $("#email").val(res.email);
            $("#phone").val(res.phone);
            $("#reservation_date").val(res.reservation_date);
            $("#reservation_time").val(res.reservation_time);
            $("#guests").val(res.guests);
            $("#occasion").val(res.occasion);
            $("#special_request").val(res.special_request);
        });
    });
</script>

@include('admin.layouts.footer')