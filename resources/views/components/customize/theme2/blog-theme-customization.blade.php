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
                
                                    <a class="list-group-item list-group-item-action" id="v-pills-home-background-image"
                                        data-toggle="pill" href="#v-pills-background-image" role="tab"
                                        aria-controls="v-pills-background-image" aria-selected="true"><i
                                            class="fas fa-chalkboard"></i> Background Image</a>
                
                                    <a class="list-group-item list-group-item-action {{ (session()->has('tab')) ? 'active' : '' }}" id="v-pills-home-slider"
                                        data-toggle="pill" href="#v-pills-slider" role="tab"
                                        aria-controls="v-pills-slider" aria-selected="true"><i
                                            class="fas fa-sliders-h"></i> Slider</a>
                
                                    <a class="list-group-item list-group-item-action" id="v-pills-home-headings"
                                        data-toggle="pill" href="#v-pills-headings" role="tab"
                                        aria-controls="v-pills-headings" aria-selected="true"><i
                                        class="fas fa-building"></i> Theme Headings</a>
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
                
                            <!-- Site Background Image -->
                            <div class="tab-pane fade" id="v-pills-background-image" role="tabpanel"
                                aria-labelledby="v-pills-home-background-image">
                            <!-- End -->
                            </div>
                            <!-- End -->
                
                            <!-- Site Slider -->
                            <div class="tab-pane fade {{ (session()->has('tab')) ? 'show active' : '' }}" id="v-pills-slider" role="tabpanel"
                                aria-labelledby="v-pills-home-slider">
                            </div>
                            <!-- End -->
                
                            <!-- Theme Headings -->
                            <div class="tab-pane fade" id="v-pills-headings" role="tabpanel"
                                aria-labelledby="v-pills-home-headings">
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
