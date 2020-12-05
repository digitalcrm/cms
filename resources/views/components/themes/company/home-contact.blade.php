<div class="container mt-5">
    <div class="row testimonial">
        @if($first_contact_row)
            <div class="col-md-6">
                <h2 class="mb-4">{{ $first_contact_row->title ?? '' }}</h2>
                <p>{{ $first_contact_row->paragraph ?? '' }}</p>
                @if($first_contact_row->address)
                <p><strong>ADDRESS</strong></p>
                {!! $first_contact_row->address ?? '' !!}
                @endif
            </div>
        @endif
        <div class="col-md-6">
            <h2 class="mb-4">Say Hello</h2>
            <form>
                <div class="form-group">
                    <input type="text" placeholder="Full name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Email address" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Your contact" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Your message" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-lg btn-primary primary-custom">Submit</button>
            </form>
        </div>
    </div>
</div>
