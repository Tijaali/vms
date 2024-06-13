@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{ $visitor->name }}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
                    </div>

                </div>
            </div>
        </div>
        @if (session('alert-success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('alert-success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
                                        {{ $visitor->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Gender</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->gender }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Phone</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->mobilenumber }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">CNIC</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->cnic_number }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Address1</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->address1 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Address2</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->address2 }}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <p class="card-description">
                            Appointnment info
                        </p>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Category</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->category->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Department</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->depart->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">From</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->from }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">To</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->to }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Visitee</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->visitee }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Purpose</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $visitor->purpose }}
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
                        <img src="/storage/{{ $visitor->image }}" alt="avatar" class="rounded-circle img-fluid"
                            style="width: 150px;height:150px">
                        <h5 class="my-3">{{ $visitor->fname }}</h5>
                        <p class="text-muted mb-1">{{ $visitor->category->name }}</p>
                        <p class="text-muted mb-4">{{ $visitor->address1 }}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button type="button" class="btn btn-primary"
                                onclick="alertConfirm('{{ route('visitor.approve', [$visitor->id]) }}','confirm','Are you sure you want to allow','warning','allow','cancel')">Allow</button>
                            <button type="button" class="btn btn-outline-primary ms-1"
                                onclick="alertConfirm('{{ route('visitor.reject', [$visitor->id]) }}','confirm','Are you sure you want to reject','warning','reject','cancel')">Deny</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
