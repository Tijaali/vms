@extends('admin.common.layout')
@section('page-css')
    <style>
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
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All roles</p>
                        <div class="col-md-6 mb-4 mb-xl-0">
                            <a href="" id="generateReportBtn" class="btn btn-sm btn-primary shadow-sm mb-4">
                                <i class="mdi mdi-arrow-down-bold-hexagon-outline text-white"></i>
                                Generate Report
                            </a>
                        </div>
                        <div class="row">
                            {{-- <div class="col-12">
                                // Notifications //
                                <div class="container">
                                    <div class="notifications">
                                        <h4>Notifications</h4>
                                        <ul>
                                            @foreach ($notifications as $notification)
                                                <li>{{ $notification->message }}
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div class="">
                                    <table class="datatable" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Role
                                                {{-- <th>Permissions</th> --}}
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tablebody">
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td>{{ $role->id }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        <div class='d-flex'>
                                                            <button type="button" class="btn btn-primary p-2 my-2"
                                                                onclick="alertConfirm('{{ route('role.show', [$role->id]) }}','confirm','Are you sure you want to edit','warning','show','cancel')">
                                                                Show
                                                            </button>
                                                            <button type="button" class="btn btn-secondary p-2 my-2"
                                                                onclick="alertConfirm('{{ route('role.edit', [$role->id]) }}','confirm','Are you sure you want to edit','warning','edit','cancel')">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger p-2 my-2"
                                                                onclick="alertConfirm('{{ route('role.delete', [$role->id]) }}','confirm','Are you sure you want to delete','warning','delete','cancel')"">
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
