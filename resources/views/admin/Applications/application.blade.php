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
                                                <th>image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>CNIC</th>
                                                <th>Phone</th>
                                                <th>Visitee</th>
                                                <th>Status</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody class="tablebody">
                                            @foreach ($usersAndApp as $visitor)
                                                <tr>
                                                    <td>{{ $visitor->id }}</td>
                                                    <td><img src="/storage/{{ $visitor->image }}" alt=""></td>
                                                    <td>{{ $visitor->name }}</td>
                                                    <td>{{ $visitor->email }}</td>
                                                    <td>{{ $visitor->gender }}</td>
                                                    <td>{{ $visitor->cnic_number }}</td>
                                                    <td>{{ $visitor->mobilenumber }}</td>
                                                    <td>{{ $visitor->visitee }}</td>
                                                    @if ($visitor->status==null)
                                                    <td > <span class="badge badge-danger"> pending</span></td>
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
