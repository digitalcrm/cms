@if($first_row_intro)
<div class="container-fluid bg-dark2 text-center mt-5" style="background-color: {{ $first_row_intro->background_color_of_intro_model() }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home-highlighter" style="color: {{ $first_row_intro->font_color_of_intro_model() }}">{{ $first_row_intro->description_of_intro_model() }}</div>
            </div>
        </div>
    </div>
</div>
    {{-- If there is no data in database --}}
@else
<div class="container-fluid bg-dark2 text-center mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home-highlighter">{{ __('Data Not Found! Please check database') }}</div>
            </div>
        </div>
    </div>
</div>
@endif
