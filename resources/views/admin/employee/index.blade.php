@extends('admin.common.layout')
@section('page-css')
    <style>
        .datatable {
            font-family: Arial, sans-serif;
            width: 100%;
            border-collapse: collapse;
        }

        .datatable thead {
            background-color: #4CAF50;
            color: white;
        }

        .datatable th,
        .datatable td {
            text-align: left;
            padding: 8px;
        }

        .datatable tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .datatable .btn {
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
        }

        .datatable .btn-primary {
            background-color: #007bff;
        }

        .datatable .btn-secondary {
            background-color: #6c757d;
        }

        .datatable .btn-success {
            background-color: #28a745;
        }

        .datatable .btn-danger {
            background-color: #dc3545;
        }

        .datatable img {
            width: 50px;
            height: auto;
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All securityOfficers</p>
                        <div class="col-md-6 mb-4 mb-xl-0">
                            <a id="generateReportBtn" class="btn btn-sm btn-primary shadow-sm"
                                href="{{ route('employee.export') }}">
                                <i class="mdi mdi-arrow-down-bold-hexagon-outline text-white"></i>
                                Generate Report
                            </a>
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
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table datatable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Depart</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('empoylee.ajax') }}',
                    type: "POST",
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'image',
                        render: function(data) {
                            return `<img src='/storage/${data}'>`;
                        }
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'designation'
                    },
                    {
                        data: 'depart'
                    },

                    {
                        data: 'id',
                        render: function(data) {
                            return `
                           <div class="d-flex">
                            <button type="button" class="btn btn-primary  p-3 m-2" onclick="alertConfirm('{{ route('empoylee.show', ['securityOfficer' => ':securityOfficer']) }}'.replace(/:securityOfficer/g, ${data}),'confirm','Are you sure you want to edit','warning','show','cancel')">
                          Show

                        </button>
                            <button type="button" class="btn btn-secondary p-3 m-2" onclick="alertConfirm('{{ route('employee.edit', ['securityOfficer' => ':securityOfficer']) }}'.replace(/:securityOfficer/g, ${data}),'confirm','Are you sure you want to edit','warning','edit','cancel')">
                          Edit

                        </button>
                        <button type="button" class="btn btn-success " onclick="alertConfirm('{{ route('empoylee.delete', ['securityOfficer' => ':securityOfficer']) }}'.replace(/:securityOfficer/g, ${data}),'confirm','Are you sure you want to delete','warning','delete','cancel')"">
                        Delete
                        </button>
                            </div>`;
                        }
                    },

                ]

            });
            rawColumns: ['image']
        });
    </script>
@endsection
