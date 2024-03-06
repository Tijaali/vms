@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All visitors</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table datatable" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>image</th>
                                                <th>First Name</th>
                                                <th>CNIC</th>
                                                <th>Category</th>
                                                <th>Depart</th>
                                                <th>Visitee</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Status</th>
                                                <th>Approval</th>
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
                    url: '{{ route('visitor.ajax') }}',
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
                        data: 'fname'
                    },
                    {
                        data: 'cnic_number'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'depart'
                    },
                    {
                        data: 'visitee'
                    },
                    {
                        data: 'from'
                    },
                    {
                        data: 'to'
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
                                <button type="button" class="btn btn-primary p-2 m-2" onclick="alertConfirm('{{ route('visitor.approve', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to allow','warning','allow','cancel')">
                          Allow
                        </button>
                            <button type="button" class="btn btn-danger p-2 m-2" onclick="alertConfirm('{{ route('visitor.reject', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to reject','warning','reject','cancel')">
                          Reject
                        </button>
                      </div>`;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return `
                            <div class='d-flex'>
                                <button type="button" class="btn btn-primary p-2 m-2" onclick="alertConfirm('{{ route('visitor.show', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to edit','warning','show','cancel')">
                          Show
                        </button>
                            <button type="button" class="btn btn-secondary p-2 m-2" onclick="alertConfirm('{{ route('visitor.edit', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to edit','warning','edit','cancel')">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger p-2 m-2" onclick="alertConfirm('{{ route('visitor.delete', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to delete','warning','delete','cancel')"">
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
