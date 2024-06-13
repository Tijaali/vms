@extends('admin.common.layout')
@section('page-css')
    <style>
        .green-border {
            border: 4px solid green;
            border-radius: 50%;
            height: 50px;
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Event Bookings</p>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>CNIC</th>
                                                <th>Event</th>
                                                <th>Status</th>
                                                <th>Entry</th>
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
                    url: '{{ route('eventRegisteration.ajax') }}',
                    type: "POST",
                },
                columns: [{
                        data: 'name',
                        render: function(data, type, row) {

                            const borderClass = row.entryStatus === 'entered' ? 'green-border' : '';
                            return `
                            <button type="button" class="btn btn-primary position-relative">
  ${data}<span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-success p-2"><span class="visually-hidden"></span></span>
</button>`;

                        },
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'cnic'
                    },
                    {
                        data: 'event'
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
                                <button type="button" class="btn btn-primary p-2 my-2" onclick="alertConfirm('{{ route('eventRegisteration.entry', ['eventRegisteration' => ':eventRegisteration']) }}'.replace(/:eventRegisteration/g, ${data}),'confirm','Are you sure you want to enter','warning','entered','cancel')">
                          Entry
                        </button>
                            <button type="button" class="btn btn-danger p-2 my-2" onclick="alertConfirm('{{ route('eventRegisteration.exit', ['eventRegisteration' => ':eventRegisteration']) }}'.replace(/:eventRegisteration/g, ${data}),'confirm','Are you sure you want to exit','warning','exited','cancel')">
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
                                <button type="button" class="btn btn-primary p-2 my-2" onclick="alertConfirm('{{ route('eventRegisteration.approve', ['eventRegisteration' => ':eventRegisteration']) }}'.replace(/:eventRegisteration/g, ${data}),'confirm','Are you sure you want to allow','warning','allow','cancel')">
                         Accept
                        </button>
                            <button type="button" class="btn btn-danger p-2 my-2" onclick="alertConfirm('{{ route('eventRegisteration.reject', ['eventRegisteration' => ':eventRegisteration']) }}'.replace(/:eventRegisteration/g, ${data}),'confirm','Are you sure you want to reject','warning','reject','cancel')">
                         Rejects
                        </button>
                      </div>`;
                        }
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            return `
                           <div class="d-flex">
                        <button type="button" class="btn btn-success " onclick="alertConfirm('{{ route('eventRegisteration.delete', ['eventRegisteration' => ':eventRegisteration']) }}'.replace(/:eventRegisteration/g, ${data}),'confirm','Are you sure you want to delete','warning','delete','cancel')"">
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
