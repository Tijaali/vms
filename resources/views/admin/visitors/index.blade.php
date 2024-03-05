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
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>image</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>CNIC</th>
                                                <th>Address1</th>
                                                <th>Address1</th>
                                                <th>Category</th>
                                                <th>Depart</th>
                                                <th>Visitee</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Purpose</th>
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
                        render:function(data){
                            return `<img src='/storage/${data}'>`;
                        }
                    },
                    {
                        data: 'fname'
                    },
                    {
                        data: 'lname'
                    },
                    {
                        data: 'gender'
                    },
                    {
                        data: 'mobilenumber'
                    },
                    {
                        data: 'cnic_number'
                    },
                    {
                        data: 'address1'
                    },
                    {
                        data: 'address2'
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
                        data: 'purpose'
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return `<button type="button" class="btn btn-outline-primary btn-icon-text m-2" onclick="alertConfirm('{{ route('visitor.show', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to edit','warning','show','cancel')">
                          Show
                          <i class="ti-file btn-icon-append"></i>
                        </button>
                            <button type="button" class="btn btn-outline-secondary btn-icon-text m-2" onclick="alertConfirm('{{ route('visitor.edit', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to edit','warning','edit','cancel')">
                          Edit
                          <i class="ti-file btn-icon-append"></i>
                        </button>
                        <button type="button" class="btn btn-outline-success btn-icon-text" onclick="alertConfirm('{{ route('visitor.delete', ['visitor' => ':visitor']) }}'.replace(/:visitor/g, ${data}),'confirm','Are you sure you want to delete','warning','delete','cancel')"">
                          <i class="ti-trash btn-icon-prepend"></i>
                          Delete
                        </button>`;
                        }
                    },

                ]

            });
            rawColumns: ['image']
        });
    </script>
@endsection
