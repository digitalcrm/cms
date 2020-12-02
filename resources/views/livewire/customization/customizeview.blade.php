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

                                    {{-- <a class="list-group-item list-group-item-action" id="v-pills-home-menus"
                                        data-toggle="pill" href="#v-pills-menus" role="tab" aria-controls="v-pills-menus"
                                        aria-selected="true"><i class="fas fa-stream"></i> Menus</a> --}}

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

                            <!-- Site Menus -->
                            {{-- <div class="tab-pane fade" id="v-pills-menus" role="tabpanel"
                                aria-labelledby="v-pills-home-menus">
                                <form>
                                    <div class="card">
                                        <div class="card-body">
                                            Menus
                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
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
                            <!-- Clients -->
                            <div class="tab-pane fade" id="v-pills-clients" role="tabpanel"
                                aria-labelledby="v-pills-home-clients">
                                <form>
                                    <div class="card">
                                        <div class="card-header text-primary font-weight-bold">Clients</div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Main Title</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sub Title</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Background Color</label>
                                                <input class="jscolor float-right" value="eeeeee" autocomplete="off"
                                                    style="background-image: none; background-color: rgb(0, 142, 255); color: rgb(255, 255, 255);">
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Logo #1</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Logo #2</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Logo #3</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Logo #4</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Logo #5</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Logo #6</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End -->
                            <!-- Site Team -->
                            <div class="tab-pane fade" id="v-pills-team" role="tabpanel"
                                aria-labelledby="v-pills-home-team">
                                <form>
                                    <div class="card">
                                        <div class="card-header text-primary font-weight-bold">Team</div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Main Title</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sub Title</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Background Color</label>
                                                <input class="jscolor float-right" value="eeeeee" autocomplete="off"
                                                    style="background-image: none; background-color: rgb(238, 238, 238); color: rgb(0, 0, 0);">
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="badge badge-pill badge-info">Team #1</span>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Name</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Job Title</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <span class="badge badge-pill badge-info">Team #2</span>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Name</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Job Title</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <span class="badge badge-pill badge-info">Team #3</span>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Name</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Job Title</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <span class="badge badge-pill badge-info">Team #4</span>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Name</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Job Title</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End -->
                            <!-- Site Testimonials -->
                            <div class="tab-pane fade" id="v-pills-testimonials" role="tabpanel"
                                aria-labelledby="v-pills-home-testimonials">
                                <form>
                                    <div class="card">
                                        <div class="card-header text-primary font-weight-bold">Testimonials</div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Main Title</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sub Title</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="badge badge-pill badge-info">Testimonial #1</span>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Testimonial Text</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <span class="badge badge-pill badge-info">Testimonial #2</span>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Testimonial Text</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <span class="badge badge-pill badge-info">Testimonial #3</span>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Testimonial Text</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlFile1">Photo</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1">
                                                        <small id="emailHelp" class="form-text text-muted">JPEG, PNG
                                                            only</small>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
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
