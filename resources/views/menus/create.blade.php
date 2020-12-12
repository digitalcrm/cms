@extends('layouts.master')
@section('title', 'Create Menu')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Menu</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form method="post" action="{{ route('menus.store') }}" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf
            <div class="card">
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Menu Name</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" value="{{ old('name') }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Place In</label>
                            <select class="custom-select" id="validationCustom02" name="placed_in" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach(App\Menu::PLACED_IN as $value)
                                    <option value="{{ $value }}" {{ ($value) == 'header' ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                            @error('placed_in')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Page Link</label>
                            <select class="custom-select" name="page_id" id="validationCustom03" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach($pages as $id => $title)
                                    <option value="{{ $id }}">{{ $title }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                            @error('page_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!--card body end-->
                <div class="card-footer">
                    <a name="" id="" class="btn btn-outline-secondary" href="{{ url()->previous() }}"
                        role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right">
                        Create
                    </button>
                </div>
            </div> <!-- end card -->
        </form>
    </div>
</section>
@section('scripts')
@parent
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
@endsection
@endsection
