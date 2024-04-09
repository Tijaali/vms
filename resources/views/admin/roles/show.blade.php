@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold"></h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <a id="generateReportBtn" class="btn btn-sm btn-primary shadow-sm">
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
                        <h3 class="">
                            Role Info
                        </h3>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Role</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $role->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Permissions</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        @if (!empty($rolePermissions))
                                            @foreach ($rolePermissions as $permission)
                                                <label class="">{{ $permission->name }},</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
