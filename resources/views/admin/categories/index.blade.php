@extends('admin.common.layout')
@section('page-css')
    {{-- <style>
        table,thead{
            border-radius: 20px solid #4B49AC !important;
        }
        .datatable {
            font-family: Arial, sans-serif;
            width: 100%;
            border-collapse: collapse;
            
        }

        .datatable thead {
            background-color: #4B49AC;
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
    </style> --}}
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All categories</p>
                        <div class="col-md-6 mb-4 mb-xl-0">
                            <a href="" id="generateReportBtn" class="btn btn-sm btn-primary shadow-sm mb-4">
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
                                    <table class="display expandable-table datatable" style="width:100%">
                                        <thead class="">
                                            <tr>
                                                <th>No</th>
                                                <th>Category
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tablebody">
                                            @foreach ($visitorCategory as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <div class='d-flex'>
                                                            <button type="button" class="btn btn-secondary p-2 my-2"
                                                                onclick="alertConfirm('{{ route('visitorCategory.edit', [$category->id]) }}','confirm','Are you sure you want to edit','warning','edit','cancel')">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger p-2 my-2"
                                                                onclick="alertConfirm('{{ route('visitorCategory.delete', [$category->id]) }}','confirm','Are you sure you want to delete','warning','delete','cancel')"">
                                                                Delete
                                                            </button>
                                                        </div>
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
    </div>
@endsection
