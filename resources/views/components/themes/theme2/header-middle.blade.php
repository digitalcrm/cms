<div class="overlay"></div>
{{-- For modifing the video tag visit the Model ThemeSlider.php --}}
{!! ($video_slides) ? $video_slides->videoTag() : '' !!}
<div class="container h-100">
    <div class="d-flex h-100 text-center align-items-center">
        <div class="w-100 text-white">
            <h1 class="display-3">{{ $video_slides->heading ?? 'Not Found' }}</h1>
            <p class="lead mb-0">{!! $video_slides->paragraph ?? 'Add from customization' !!}</p>
        </div>
    </div>
</div>