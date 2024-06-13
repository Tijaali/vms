<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset('assets/vendors/feather/feather.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}>
    <link rel="stylesheet" href={{ asset('assets/vendors/css/vendor.bundle.base.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/vertical-layout-light/style.css') }}>
    <!-- endinject -->
    <link rel="shortcut icon" href={{ asset('assets/images/favicon.png') }} />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-6 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <h1 class="text-primary">Event Registeration</h1>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('eventRegisteration.store') }}" class="text-center" method="POST">
                                @csrf
                                <input type="text" name="user_id" placeholder="" class="form-control"
                                                    value="{{ Auth::user()->id }}" hidden />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">CNIC </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="cnic" placeholder="XXXXX-XXXXXXX-X"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" placeholder="Mobile Number"
                                                    class="form-control" maxlength="10" required="true" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address </label>
                                            <div class="col-sm-9">
                                                <input name="address" class="form-control" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            {{-- <label class="col-sm-3 col-form-label">Event </label> --}}
                                            <div class="col-sm-9">
                                                <input type="text" name="event_id" value="{{ $event->id }}"
                                                    class="form-control" hidden />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>


    <script src={{ asset('assets/vendors/js/vendor.bundle.base.js') }}></script>
    <script src={{ asset('assets/js/off-canvas.js') }}></script>
    <script src={{ asset('assets/js/hoverable-collapse.js') }}></script>
    <script src={{ asset('assets/js/template.js') }}></script>
    <script src={{ asset('assets/js/settings.js') }}></script>
    <script src={{ asset('assets/js/todolist.js') }}></script>

</body>

</html>
