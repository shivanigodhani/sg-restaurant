@include('admin.layouts.header')
    <div class="container-fluid page-body-wrapper">
    <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row justify-content-center">
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <a class="navbar-brand sora-brand" href="#hero">
                                        SORA<span class="brand-dot">.</span>
                                    </a>
                                </div>
                                <form class="forms-sample" action="{{ route('login.check') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn me-2" style="background-color: #D97757;">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    <!-- main-panel ends -->
    </div>
@include('admin.layouts.footer')
