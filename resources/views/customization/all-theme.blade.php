@extends('layouts.master')

@section('title','Theme Switch')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Themes</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach($themes as $theme)
                <div class="col-md-4 p-3">
                    <div class="card">
                        <img src="{{ $theme->imageUrl() }}" class="card-img-top fit" alt="...">
                        <div class="card-footer bg-dark">
                            <div class="float-left">{{ $theme->name }}</div>
                            <div class="float-right">
                                <a data-toggle="tooltip" data-placement="top"
                                    name='isActive'
                                    title="{{ ($theme->isactive === 1) ? 'click for inactive the theme' : 'click for active the theme' }}"
                                    class="dropdown-item" href="" type="submit" onclick="event.preventDefault();
                                if(confirm('Are you sure!')){
                                    $('#form-{{ $theme->id }}').submit();
                                }">
                                    {!!
                                    ($theme->isActive == 1) ?
                                    '<i class="fas fa-toggle-on fa-2x" style="color: green"></i>' :
                                    '<i class="fas fa-toggle-off fa-2x" style="color: red"></i>'
                                    !!}
                                </a>
                                <form style="display: none" id="form-{{ $theme->id }}"
                                    action="{{ route('themes.update', $theme->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
