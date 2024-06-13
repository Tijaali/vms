@extends('admin.common.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{Auth::user()->name}}</h3>
                        <h6 class="font-weight-normal mb-0">"Explore the comprehensive list of events at IUB and seamlessly apply and attend the ones that intrigue you."</h6>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card text-center tale-bg">
                        <div class="card-people mt-auto">
                            <img src="/storage/{{ $event->brochure }}" alt="events"
                                style="width:300px; height:300px; margin:auto">
                        </div>
                        <div class="mt-3 ">
                            <h3>{{ $event->title }}</h3>
                            <p><span class="px-2 font-weight-bold">Depart:</span>{{ $event->depart->name }}</p>
                            <p><span class="px-2 font-weight-bold">Timing:</span>{{ $event->timing }}</p>
                            <p><span class="px-2 font-weight-bold">Venue:</span>{{ $event->venue }}</p>


                        </div>
                        <div>
                            <a href="{{route('event.eventRegisteration',[$event->id])}}" class="btn btn-success m-3">Apply to attend</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
