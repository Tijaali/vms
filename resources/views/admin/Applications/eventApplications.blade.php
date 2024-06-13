@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Your Applications</p>
                      
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <table class="display expandable-table datatable" style="width:100%">
                                        <thead class="">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>CNIC</th>
                                                <th>Address</th>
                                                
                                                <th>Event title</th>
                                                {{-- <th>Event venue</th> --}}
                                                <th>Event timings</th>
                                                <th>Status</th>
                                                
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody class="tablebody">
                                            @foreach ($usersAndApp as $visitor)
                                                <tr>
                                                    <td>{{ $visitor->id }}</td>
                                                    <td>{{ $visitor->user->name }}</td>
                                                    <td>{{ $visitor->user->email }}</td>
                                                    <td>{{ $visitor->phone }}</td>
                                                    <td>{{ $visitor->cnic }}</td>
                                                    <td>{{ $visitor->address }}</td>
                                                    <td>{{ $visitor->event->title }}</td>
                                                    {{-- <td>{{ $visitor->event->venue }}</td> --}}
                                                    <td>{{ $visitor->event->timing }}</td>
                                                   
                                                        @if ($visitor->status==null)
                                                        <td> <span class="badge badge-danger"> pending</span></td>
                                                        @else
                                                        <td> <span class="badge badge-success"> {{ $visitor->status }}</span></td>
                                                        @endif
                                                  
                                                    
                                                    


                                                   
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
