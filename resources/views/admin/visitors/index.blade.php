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

        .green-border {
            border: 4px solid rgb(11, 178, 11);

            box-shadow: -30px 9px 189px -6px rgba(11, 178, 11, 0.3) !important;
            -webkit-box-shadow: -30px 9px 189px -6px rgba(11, 178, 11, 0.3) !important;
            -moz-box-shadow: -30px 9px 189px -6px rgba(11, 178, 11, 0.3) !important;
            filter: drop-shadow(1px 1px 6px green);
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All visitors</p>
                        <div class="col-md-6 mb-4 mb-xl-0">
                            <a id="generateReportBtn" class="btn btn-sm btn-primary shadow-sm"
                                href="{{ route('visitor.export') }}">
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
                                <div class="">
                                    <table class="datatable" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>image</th>
                                                <th>Name</th>
                                                <th>CNIC</th>
                                                <th>Category</th>
                                                {{-- <th>Depart</th>
                                                <th>Visitee</th> --}}
                                                <th>Status</th>
                                                <th>Entrance</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tablebody">

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
                    url: '{{ route('visitor.ajax') }}',
                    type: "POST",
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'image',
                        render: function(data, type, row) {
                            // Apply green border if entryStatus is 'entered'
                            const borderClass = row.entryStatus === 'entered' ? 'green-border' : '';
                            return `<img src='/storage/${data}' class='${borderClass}' style='width:70px; height:70px;'>`;
                        }
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'cnic_number'
                    },
                    {
                        data: 'category'
                    },

                    {
                        data: 'status',
                        render: function(data) {
                            return `<span class="btn ${data === 'approved' ? 'btn-success' : 'btn-danger'}">${data}</span>`;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return `
                            <div class='d-flex'>
                                <button type="button" class="btn btn-primary p-2 my-2" onclick="alertConfirm('{{ route('visitor.entry', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to enter','warning','entered','cancel')">
                          Entry
                        </button>
                            <button type="button" class="btn btn-danger p-2 my-2" onclick="alertConfirm('{{ route('visitor.exit', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to exit','warning','exited','cancel')">
                          Exit
                        </button>
                      </div>`;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return `
                            <div class='d-flex'>
                                <button type="button" class="btn btn-primary p-2 my-2" onclick="alertConfirm('{{ route('visitor.show', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to edit','warning','show','cancel')">
                          Show
                        </button>
                            <button type="button" class="btn btn-secondary p-2 my-2" onclick="alertConfirm('{{ route('visitor.edit', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to edit','warning','edit','cancel')">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger p-2 my-2" onclick="alertConfirm('{{ route('visitor.delete', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to delete','warning','delete','cancel')"">
                          Delete
                        </button>
                        <button type="button" class="btn btn-danger p-2 my-2" onclick="alertConfirm('{{ route('visitor.createPdf', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to download','warning','download','cancel')"">
                          download pdf
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
