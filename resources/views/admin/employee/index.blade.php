@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">All securityOfficers</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table datatable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>image</th>
                                                <th>fname</th>
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
                        render:function(data){
                            return `<img src='/storage/${data}'>`;
                        }
                    },
                    {
                        data: 'fname'
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
                            <button type="button" class="btn btn-outline-primary  p-3 m-2" onclick="alertConfirm('{{ route('empoylee.show', ['securityOfficer' => ':securityOfficer']) }}'.replace(/:securityOfficer/g, ${data}),'confirm','Are you sure you want to edit','warning','show','cancel')">
                          Show

                        </button>
                            <button type="button" class="btn btn-outline-secondary p-3 m-2" onclick="alertConfirm('{{ route('employee.edit', ['securityOfficer' => ':securityOfficer']) }}'.replace(/:securityOfficer/g, ${data}),'confirm','Are you sure you want to edit','warning','edit','cancel')">
                          Edit

                        </button>
                        <button type="button" class="btn btn-outline-success " onclick="alertConfirm('{{ route('empoylee.delete', ['securityOfficer' => ':securityOfficer']) }}'.replace(/:securityOfficer/g, ${data}),'confirm','Are you sure you want to delete','warning','delete','cancel')"">
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
