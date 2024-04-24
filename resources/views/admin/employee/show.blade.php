@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{$securityOfficer->fname}}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <a href="#" class="btn btn-sm btn-primary shadow-sm">
                            <i class="mdi mdi-arrow-down-bold-hexagon-outline text-white"></i>
                            Generate Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description">
                            Personal info
                        </p>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Name</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Email</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->email }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Gender</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->gender }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">date_of_birth</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->date_of_birth }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Phone</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->mobilenumber }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">CNIC</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->cnic_number }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Address1</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->address1 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Address2</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->address2 }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <p class="card-description">
                            Employeement info
                        </p>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Designation</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->designation }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Department</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->depart->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Shift start timing</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->shift_start }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Shift end timing</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->shift_end }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">joing_date</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $securityOfficer->joing_date }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="/storage/{{$securityOfficer->image}}" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{$securityOfficer->fname}}</h5>
                        <p class="text-muted mb-1">{{$securityOfficer->designation}}</p>
                        <p class="text-muted mb-4">{{$securityOfficer->address1}}</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
