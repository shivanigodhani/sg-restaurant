@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Contacts</h4>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>is_read</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($contacts as $contact)
                          <tr>
                              <td>{{ $contact->name }}</td>
                              <td>{{ $contact->email }}</td>
                              <td>{{ $contact->subject }}</td>
                              <td>
                                  @if($contact->is_read)
                                      <span class="badge badge-success">Read</span>
                                  @else
                                      <span class="badge badge-warning">Unread</span>
                                  @endif
                              </td>
                          </tr>
                          @empty
                          <tr>
                              <td colspan="4" class="text-center">No inquiries found.</td>
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
@include('admin.layouts.footer')