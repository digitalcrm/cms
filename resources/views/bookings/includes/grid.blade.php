@forelse ($events as $service_event)
<div class="col-md-3">
    <div class="card shadow card-danger card-outline">
        <!--/.card-header-->
        <div class="card-body">
            <h5>{{ $service_event->event_name ?? ''}}</h3>
            <span for="">Cost</span> <small>{{ $service_event->price ?? ''}}</small>
            <p><span>Meeting duration: </span>{{ $service_event->duration ?? ''}}</p>
            <p class="text-justify">
                {{ $service_event->short_description ?? ''}}
            </p>
        </div>
        <div class="card-footer">
            <a href="{{ route('event.create', ['bookservice' =>$service_event->bookingService->name, 'bookevent'=>$service_event->id]) }}">
                BookNow
            </a>
        </div>
        <!-- /.card -->
    </div>
</div>


@empty
<div class="col mt-5 mb-3">
<h3 class="text-center">No data available</h3>
</div>
@endforelse