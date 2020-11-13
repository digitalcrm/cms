@extends('layouts.master')

@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Send Newsletter</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                Create News-Letter
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{route('newsletters.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input id="subject"
                                        class="form-control @error('subject') is-invalid @enderror"
                                        type="text"
                                        name="subject"
                                        value="{{ old('subject') }}">
                                @error('subject')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message"
                                            id="message"
                                            class="form-control @error('message') is-invalid @enderror"
                                            cols="30"
                                            rows="10">{{ old('message') }}</textarea>
                                @error('message')
                                    <small class="form-text text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <a name="" id="" class="btn btn-info" href="{{url()->previous()}}" role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary float-right">Create</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
