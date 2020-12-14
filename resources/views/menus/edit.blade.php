@extends('layouts.master')
@section('title', 'Update Menu')
@section('style')
@parent
<style>
    .custom-hide{
        display: none;
    }
</style>
@endsection
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Menu</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <form method="post" action="{{ route('menus.update',$menu->id) }}" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf
            @method('put')
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
                            <input type="text" class="form-control" id="validationCustom01" name="name" value="{{ old('name',$menu->name) }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="selectDropDown">Page Link</label>
                            <select class="custom-select" name="page_id" id="selectDropDown">
                                <option selected disabled value="Null">Choose...</option>
                                @foreach($pages as $id => $title)
                                    <option value="{{ $id }}" {{ optional($menu->page)->id == $id ? 'selected' : '' }}>{{ $title }}</option>
                                @endforeach
                                <input type="text" 
                                        class="form-control custom-hide" 
                                        id="urlPage" name="urlText" 
                                        value="{{ $menu->url ?? '' }}"
                                        placeholder="https://...">
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                            @error('page_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Place In</label>
                            <select class="custom-select" id="validationCustom02" name="placed_in" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach(App\Menu::PLACED_IN as $value)
                                    <option value="{{ $value }}" {{ $menu->placed_in === $value ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                            @error('placed_in')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="pageCheckBox" class="form-check-input" id="pageCheckBox" {{ $menu->url ? 'checked' : '' }}>
                            <label class="form-check-label" for="pageCheckBox">Do You Want to Custom URL?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input checked" name="isChecked" id="invalidCheck" type="checkbox" value="" {{ ($menu->isChecked === 1) ? 'checked' : '' }}>
                          <label class="form-check-label" for="invalidCheck">
                            Link open in new tab
                          </label>
                        </div>
                    </div>
                </div>
                <!--card body end-->
                <div class="card-footer">
                    <a name="" id="" class="btn btn-outline-secondary" href="{{ url()->previous() }}"
                        role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary float-right">
                        Update
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
<script>
    const dropdownBox = document.querySelector('#selectDropDown');
    const inputBox = document.querySelector('#urlPage');
    const checkBoxButton = document.querySelector('#pageCheckBox');

    function isCheckBoxChecked() {
        if (checkBoxButton.checked) {
            // console.log('checked');
            dropdownBox.classList.add('custom-hide');
            dropdownBox.value = 0; //set value to zero if checbox clicked
            inputBox.classList.remove('custom-hide');
        } else {
            // console.log('unchecked');
            inputBox.classList.add('custom-hide');
            dropdownBox.classList.remove('custom-hide');
            inputBox.value = ''; //set value to zero if checbox clicked
        }
    }

    isCheckBoxChecked();

    checkBoxButton.addEventListener('click', isCheckBoxChecked);
</script>
@endsection
@endsection
