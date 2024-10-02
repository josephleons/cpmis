@extends('layouts.login')
@section('content')
<div class="container my-5" style="padding-top:8%">
    @include('includes.message')
    <div class="row mx-auto" style="width: 60%;">
        <div class="col-md-2 col-sm-4">
            <img src="{{ url('assets/images/chalinze.jpeg') }}" alt="Logo" class="img-fluid" style="max-width: 100px;">
            <!-- Logo -->
        </div>
        <div class="col-md-10">
            <p class="display-2 fs-6 text-center" style="font-family:Verdana, Geneva, Tahoma, sans-serif">
                United Republic of Tanzania<br>
                <b>President's Office Public Service Management and Good Governance</b>
                <br>
            <h1 class="display-3 fs-4 text-capitalize text-center " style="color:#2d4a84"><b>Chalinze DC Project
                    Monitoring Information System</b></h1>
            </p>
        </div>
    </div>
    <div class="card mx-auto"
        style="width: 70%; border-radius: 15px; border: 1px solid rgba(255, 255, 255, 0.5); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body px-5">
            <div class="row g-0 align-items-center">
                <div class="col-md-6 text-center">
                    <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <!-- First Slide -->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border-0">
                                            <img src="{{ url('assets/images/DED2.jpg') }}" alt="Logo"
                                                class="img-fluid border-0 img-fluid"
                                                style="width: 100%; height: 50%;object-fit:cover; border-radius:5px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Second Slide (You can add more services) -->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border-0">
                                            <img src="{{ url('assets/images/DED4.jpg') }}" alt="Logo"
                                                class="img-fluid border-0 img-fluid"
                                                style="width: 100%; height: 50%;object-fit:cover; border-radius:5px">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border-0">
                                            <img src="{{ url('assets/images/DED5.jpeg') }}" alt="Logo"
                                                class="img-fluid border-0 img-fluid"
                                                style="width: 100%; height: 50%;object-fit:cover; border-radius:5px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border-0">
                                            <img src="{{ url('assets/images/HQ.jpg') }}" alt="Logo"
                                                class="img-fluid border-0 img-fluid"
                                                style="width: 100%; height: 50%;object-fit:cover; border-radius:5px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border-0">
                                            <img src="{{ url('assets/images/MWINYIKONDO.jpg') }}" alt="Logo"
                                                class="img-fluid border-0 img-fluid"
                                                style="width: 100%; height: 50%;object-fit:cover; border-radius:5px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev custom-control" type="button"
                            data-bs-target="#servicesCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next custom-control" type="button"
                            data-bs-target="#servicesCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
               <div class="col-1"></div>
                <div class="col-md-5 pt-5 pl-3">
                    <hr class="py-3">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text form-icon border-0">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text form-icon border-0">
                                    <i class="fas fa-lock"></i> <!-- Bootstrap icon used here -->
                                </span>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn text-white" style="  background-color: #2d4a84;"><i
                                    class="fa fa-sign-out"></i>
                                Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a class="nav-link" style="color:#407dbf" href="{{(" #")}}">Reset Password?</a><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted text-center">
            <p style="font-size:14px">For any technical inquiry, please contact ICT Support at: <span>
                    ict@chalinzedc.go.tz or call 026 216 0240
                </span>
            </p>
            <p style="font-size:14px">Copyright &copy; 2024, chalinzedc. <b>All rights reserved.</b></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection