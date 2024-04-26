@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold"> {{$event->title}}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                class="text-primary">3 unread alerts!</span></h6>
                    </div>
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <a href="#" class="btn btn-sm btn-primary shadow-sm">
                            <i class="mdi mdi-arrow-down-bold-hexagon-outline text-white"></i>
                            Generate Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description">
                            Personal info
                        </p>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Event title</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $event->title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Department</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $event->depart->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Venue</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $event->venue }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Timing</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $event->timing }}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="/storage/{{$event->brochure}}" alt="avatar"
                                    class=" img-fluid" style="width:500px;height:500px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
