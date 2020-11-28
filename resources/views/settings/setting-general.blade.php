@extends('layouts.master')
@section('title', 'General Setting')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">General Setting</h1>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="row pl-2">
        <div class="col-md-12 p-3">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="list-group customize-left" id="list-tab" role="tablist">

                                <a class="list-group-item list-group-item-action active" id="v-pills-home-identity"
                                    data-toggle="pill" href="#v-pills-identity" role="tab"
                                    aria-controls="v-pills-identity" aria-selected="true"><i class="fas fa-image"></i>
                                    Logo Management</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9 pb-5">
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- Site Identity -->
                        <div class="tab-pane fade show active" id="v-pills-identity" role="tabpanel"
                            aria-labelledby="v-pills-home-identity">
                            <livewire:customization.customizelogo />
                        </div>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
