<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Customize</h1>
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

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-services"
                                        data-toggle="pill" href="#v-pills-services" role="tab"
                                        aria-controls="v-pills-services" aria-selected="true"><i
                                            class="fas fa-user-cog"></i> Services</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-intro"
                                        data-toggle="pill" href="#v-pills-intro" role="tab"
                                        aria-controls="v-pills-color" aria-selected="true"><i
                                            class="fas fa-info-circle"></i> Intro</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-who-we-are"
                                        data-toggle="pill" href="#v-pills-who-we-are" role="tab"
                                        aria-controls="v-pills-who-we-are" aria-selected="true"><i
                                            class="fas fa-building"></i> Who We Are</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-headings"
                                        data-toggle="pill" href="#v-pills-headings" role="tab"
                                        aria-controls="v-pills-headings" aria-selected="true"><i
                                        class="fas fa-building"></i> Theme Headings</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-clients"
                                        data-toggle="pill" href="#v-pills-clients" role="tab"
                                        aria-controls="v-pills-clients" aria-selected="true"><i
                                            class="fas fa-handshake"></i> Clients</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-team"
                                        data-toggle="pill" href="#v-pills-team" role="tab" aria-controls="v-pills-team"
                                        aria-selected="true"><i class="fas fa-users"></i> Team</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-testimonials"
                                        data-toggle="pill" href="#v-pills-testimonials" role="tab"
                                        aria-controls="v-pills-testimonials" aria-selected="true"><i
                                            class="fas fa-comment-dots"></i> Testimonials</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-statistics"
                                        data-toggle="pill" href="#v-pills-statistics" role="tab"
                                        aria-controls="v-pills-statistics" aria-selected="true"><i
                                            class="fas fa-grin-stars"></i> Statistics</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-contact-us"
                                        data-toggle="pill" href="#v-pills-contact-us" role="tab"
                                        aria-controls="v-pills-contact-us" aria-selected="true"><i
                                            class="fas fa-envelope"></i> Contact Us</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-say-hello"
                                        data-toggle="pill" href="#v-pills-say-hello" role="tab"
                                        aria-controls="v-pills-say-hello" aria-selected="true"><i
                                        class="fas fa-envelope-open-text"></i> Say Hello</a>

                                    <a class="list-group-item list-group-item-action" id="v-pills-home-additional-css"
                                        data-toggle="pill" href="#v-pills-additional-css" role="tab"
                                        aria-controls="v-pills-additional-css" aria-selected="true"><i
                                        class="fas fa-file-code"></i> Additional CSS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 pb-5">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- Site Colors -->
                            <div class="tab-pane fade show" id="v-pills-colors" role="tabpanel"
                                aria-labelledby="v-pills-home-colors">
                                <livewire:customization.homepage-style />
                            </div>
                            <!-- End -->

                            <!-- Site Background Image -->
                            <div class="tab-pane fade" id="v-pills-background-image" role="tabpanel"
                                aria-labelledby="v-pills-home-background-image">
                                <!-- Background Image -->
                                <livewire:customization.background-image />
                                <!-- End -->
                            </div>
                            <!-- End -->

                            <!-- Site Slider -->
                            <div class="tab-pane fade {{ (session()->has('tab')) ? 'show active' : '' }}" id="v-pills-slider" role="tabpanel"
                                aria-labelledby="v-pills-home-slider">
                                <livewire:customization.slider />
                            </div>
                            <!-- End -->
                            <!-- Site Services -->
                            <div class="tab-pane fade" id="v-pills-services" role="tabpanel"
                                aria-labelledby="v-pills-home-services">
                                <!-- Services -->
                                <livewire:customization.service />
                                <!-- End -->
                            </div>
                            <!-- End -->
                            <!-- Site Intro -->
                            <div class="tab-pane fade" id="v-pills-intro" role="tabpanel"
                                aria-labelledby="v-pills-home-intro">
                                <livewire:customization.intro />
                            </div>
                            <!-- End -->
                            <!-- Site Who We Are -->
                            <div class="tab-pane fade" id="v-pills-who-we-are" role="tabpanel"
                                aria-labelledby="v-pills-home-who-we-are">
                                <livewire:customization.who-we-are />
                            </div>
                            <!-- End -->

                            <!-- Theme Headings -->
                            <div class="tab-pane fade" id="v-pills-headings" role="tabpanel"
                                aria-labelledby="v-pills-home-headings">
                                <livewire:customization.theme-heading />
                            </div>
                            <!-- End -->

                            <!-- Clients -->
                            <div class="tab-pane fade" id="v-pills-clients" role="tabpanel"
                                aria-labelledby="v-pills-home-clients">
                                <livewire:customization.client-setting />
                            </div>
                            <!-- End -->
                            <!-- Site Team -->
                            <div class="tab-pane fade" id="v-pills-team" role="tabpanel"
                                aria-labelledby="v-pills-home-team">
                                <livewire:customization.team-setting />
                            </div>
                            <!-- End -->
                            <!-- Site Testimonials -->
                            <div class="tab-pane fade" id="v-pills-testimonials" role="tabpanel"
                                aria-labelledby="v-pills-home-testimonials">
                                <livewire:customization.testimonial-setting />
                            </div>
                            <!-- End -->
                            <!-- Site Statistics -->
                            <div class="tab-pane fade" id="v-pills-statistics" role="tabpanel"
                                aria-labelledby="v-pills-home-statistics">
                                <livewire:customization.setting-stats />
                            </div>
                            <!-- End -->
                            <!-- Site Contact Us -->
                            <div class="tab-pane fade" id="v-pills-contact-us" role="tabpanel"
                                aria-labelledby="v-pills-home-contact-us">
                                <livewire:customization.contact-setting />
                            </div>
                            <!-- End -->
                            <!-- Site Say Hello -->
                            <div class="tab-pane fade" id="v-pills-say-hello" role="tabpanel"
                                aria-labelledby="v-pills-home-say-hello">
                                <livewire:customization.welcom-widget />
                            </div>
                            <!-- End -->

                            <!-- Site Additional CSS -->
                            <div class="tab-pane fade" id="v-pills-additional-css" role="tabpanel"
                                aria-labelledby="v-pills-home-additional-css">
                                <form>
                                    <div class="card">
                                        <div class="card-header text-primary font-weight-bold">Additional CSS</div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Additional CSS</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        rows="10"></textarea>
                                                </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
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
