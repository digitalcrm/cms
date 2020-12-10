<div>
    <div>
        @if(session()->has('contact'))
            <div class="alert alert-success">
                {{ session('contact') }}
                <button type="button" class="close" wire:click="$set('removeFlashMessage', null)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    @if($not_found_first_row)
    <form wire:submit.prevent="store">
    @else
    <form wire:submit.prevent="updateWidget">
    @endif
        <div class="card">
            <div class="card-header text-primary font-weight-bold">
                Contact Us
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Main Title</label>
                    <input wire:model="title" type="text" class="form-control" id="title"
                        aria-describedby="emailHelp">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="paragraph">Paragraph</label>
                    <textarea wire:model="paragraph" class="form-control" id="paragraph"
                        rows="3"></textarea>
                    @error('paragraph')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div wire:ignore class="form-group">
                    <label for="address">Address</label>
                    <textarea wire:model="address" class="form-control" id="mytextarea"
                        rows="6"></textarea>
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="card-footer border-top white-bg text-right">
                <button type="submit" class="btn btn-primary">{{ ($not_found_first_row) ? 'Store' : 'Save' }}</button>
            </div>
        </div>
    </form>
@section('scripts')
@parent
<script>
    tinymce.init({
        selector: '#mytextarea',
        branding: false,
        height: 300,
        menubar: false,
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern textcolor colorpicker"
        ],
        toolbar: "styleselect | bold italic | " +
                " alignleft aligncenter alignright alignjustify | " +
                "bullist numlist outdent indent | link | image | media | preview print fullpage | forecolor",
        block_formats: 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3',
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
            @this.set('address', editor.getContent());
            });
        },
    });
</script>

@endsection
</div>
