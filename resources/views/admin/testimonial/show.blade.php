@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold"> {{$testimonial->title}}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description">
                            Testimonial info
                        </p>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Name</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $testimonial->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Designation</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $testimonial->designation }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Stars</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $testimonial->stars }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 p-2">Description</label>
                                    <div class="col-sm-9 border p-2 mb-3 card-description">
                                        {{ $testimonial->desc }}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="/storage/{{$testimonial->image}}" alt="avatar"
                                    class=" img-fluid" style="width:200px;height:200px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
