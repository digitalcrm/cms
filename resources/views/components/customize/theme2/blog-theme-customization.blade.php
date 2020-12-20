<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Theme2 Customize</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row pl-2">
            <div class="col-md-12 p-3">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="list-group customize-left" id="list-tab" role="tablist">
                
                                    <a class="list-group-item list-group-item-action" id="v-pills-home-colors"
                                        data-toggle="pill" href="#v-pills-colors" role="tab"
                                        aria-controls="v-pills-colors" aria-selected="true"><i
                                            class="fas fa-palette"></i> Colors</a>
                
                                    <a class="list-group-item list-group-item-action {{ (session()->has('tab')) ? 'active' : '' }}" id="v-pills-home-slider"
                                        data-toggle="pill" href="#v-pills-slider" role="tab"
                                        aria-controls="v-pills-slider" aria-selected="true"><i
                                        class="fas fa-sliders-h"></i> Video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 pb-5">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Site Colors -->
                            <div class="tab-pane fade show" id="v-pills-colors" role="tabpanel"
                                aria-labelledby="v-pills-home-colors">
                                <livewire:customization.theme2.blog-theme />
                            </div>
                            <!-- End -->
                
                            <!-- Site Slider -->
                            <div class="tab-pane fade {{ (session()->has('tab')) ? 'show active' : '' }}" id="v-pills-slider" role="tabpanel"
                                aria-labelledby="v-pills-home-slider">
                                <livewire:customization.theme2.blog-theme-video />
                            </div>
                            <!-- End -->
                
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
