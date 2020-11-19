@extends('layouts.app')

@section('title', 'CMS')

@section('header_middle')
    @parent

    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
           <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
           <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
           <div class="carousel-item active">
              <img src="{{ asset('img/slider1.png') }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                 <h5>Job Board</h5>
                 <p>Setup a fully functional advanced job board</p>
                 <button type="button" class="btn btn-primary primary-custom btn-lg float-left px-4 mr-3">Online Demo</button>
                 <button type="button" class="btn btn-outline-secondary secondary-custom btn-lg px-4 float-left">Buy Now</button>
              </div>
           </div>
           <div class="carousel-item">
              <img src="{{ asset('img/slider2.png') }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                 <h5>CRM Software</h5>
                 <p>Automate the process of Lead management, Sales</p>
                 <button type="button" class="btn btn-primary primary-custom btn-lg float-left px-4 mr-3">Online Demo</button>
                 <button type="button" class="btn btn-outline-secondary secondary-custom btn-lg px-4 float-left">Buy Now</button>
              </div>
           </div>
           <div class="carousel-item">
              <img src="{{ asset('img/slider3.png') }}" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                 <h5>CMS Software</h5>
                 <p>Enterprise Content Managements System that helps</p>
                 <button type="button" class="btn btn-primary primary-custom btn-lg float-left px-4 mr-3">Online Demo</button>
                 <button type="button" class="btn btn-outline-secondary secondary-custom btn-lg px-4 float-left">Buy Now</button>
              </div>
           </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
     </div>
@endsection



@section('content')
<div class="container">
    <div class="row featured-post-heading">
        <div class="col-md-12 text-center">
            <h2 class="mb-4">Our Applications Cover Diverse<br>Corporate Markets</h2>
            <p class="mb-5">Lorem ipsum amore amatum amatus dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere. Pellentesque nec neque ac lorem malesuada.</p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="featured-post">
                <i class="fa fa-clock-o rounded-icon" aria-hidden="true"></i>
                <h5 class="c-title">Real Estate</h5>
                <p class="blog-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="featured-post">
                <i class="fa fa-life-ring rounded-icon" aria-hidden="true"></i>
                <h5 class="c-title">Pharmaceutical</h5>
                <p class="blog-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="featured-post">
                <i class="fa fa-rocket rounded-icon" aria-hidden="true"></i>
                <h5 class="c-title">Tech & Startups</h5>
                <p class="blog-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu ornare ante. Proin aliquam odio id lorem finibus, a ullamcorper arcu posuere.</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark2 text-center mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home-highlighter">Aynsoft Classic has been the Largest Global Software Company for more than 18 years, making it the most trusted corporation in the world.</div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('img/about.jpg') }}" class="img-fluid rounded" alt="...">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Who We Are</h2>
            <h3 class="mb-4">Services we serve to all over the world</h3>
            <p>From banking and insurance to wealth management and on securities distribution, we dedicated financial services them the teams serve all major sectors. of the industry.</p>
            <p>Our work draws on more than 40 years of experience. They delivered by 5,700 professionals in the world’s most. important financial centers.</p>
            <p>From banking and insurance to wealth management and on securities distribution, we dedicated financial services them the teams serve all major sectors. of the industry.</p>
            <button type="button" class="btn btn-primary primary-custom btn-lg float-left px-4 mt-4 mr-3">Get Started</button>
            <button type="button" class="btn btn-outline-secondary secondary-custom btn-lg px-4 float-left mt-4">Free Trial</button>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark3 text-center mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">Our Clients</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="col-md-2">
                <img src="{{ asset('img/client1.png') }}" class="img-fluid thumbnail card" alt="...">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('img/client2.png') }}" class="img-fluid thumbnail card" alt="...">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('img/client3.png') }}" class="img-fluid thumbnail card" alt="...">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('img/client4.png') }}" class="img-fluid thumbnail card" alt="...">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('img/client5.png') }}" class="img-fluid thumbnail card" alt="...">
            </div>
            <div class="col-md-2">
                <img src="{{ asset('img/client3.png') }}" class="img-fluid thumbnail card" alt="...">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row featured-post-heading">
        <div class="col-md-12 text-center mt-5">
            <h2 class="mb-4">Latest News</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a lorem velit. Etiam nec nulla a erat hendrerit varius sit amet et enim. Cras id tincidunt erat. Suspendisse facilisis condimentum urna.</p>
        </div>
    </div>

        <x-homepage.blog-component :blogs="$blogs"/>

    </div>
<div class="container-fluid bg-dark3 our-team mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="mb-4">Our Creative Team</h2>
                <p class="mb-5">Aliquam sodales justo sit amet urna auctor scelerisquinterdum leo anet tempus enim esent egetis hendrerit vel nibh vitae ornar sem velit aliquam facilisivitae finibus risus feslin is hendrerit vel nibh vitae ornar uspendisse consequat quis sem.</p>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('img/team1.jpg') }}" class="img-fluid" alt="...">
                <div class="card-body">
                    <h6>Andrew Wills</h6>
                    <p>Web Developer</p>
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('img/team2.jpg') }}" class="img-fluid" alt="...">
                <div class="card-body">
                    <h6>Alisha Smith</h6>
                    <p>Event Organizer</p>
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('img/team3.jpg') }}" class="img-fluid" alt="...">
                <div class="card-body">
                    <h6>Robert White</h6>
                    <p>Marketing Head</p>
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('img/team4.jpg') }}" class="img-fluid" alt="...">
                <div class="card-body">
                    <h6>Sarah George</h6>
                    <p>Sales Manager</p>
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center mt-5">
    <div class="row testimonial">
        <div class="col-md-12 text-center">
            <h2 class="mb-4">Testimonials</h2>
            <p class="mb-5">Aliquam sodales justo sit amet urna auctor scelerisquinterdum leo anet tempus enim esent egetis<br> hendrerit vel nibh vitae ornar sem velit aliquam facilisivitae.</p>
        </div>
        <div class="col-md-4">
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts. I wonder why we think faster than we speak. Hobbes: Probably so we can think twice. </blockquote>
                <div class="author">
                    <img src="{{ asset('img/testimonial1.jpg') }}" alt="sq-sample1"/>
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
        </div>
        <div class="col-md-4">
            <figure class="snip1192 hover">
                <blockquote>Thank you. before I begin, I'd like everyone to notice that my report is in a professional, clear plastic binder...When a report looks this good, you know it'll get an A. That's a tip kids. Write it down.</blockquote>
                <div class="author">
                    <img src="{{ asset('img/testimonial2.jpg') }}" alt="sq-sample24"/>
                    <h5>Max Conversion<span> LittleSnippets</span></h5>
                </div>
            </figure>
        </div>
        <div class="col-md-4">
            <figure class="snip1192">
                <blockquote>My behaviour is addictive functioning in a disease process of toxic co-dependency. I need holistic healing and wellness before I'll accept any responsibility for my actions.</blockquote>
                <div class="author">
                    <img src="{{ asset('img/testimonial3.jpg') }}" alt="sq-sample29"/>
                    <h5>Eleanor Faint<span> LittleSnippets</span></h5>
                </div>
            </figure>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark-two statistics text-center">
    <div class="container">
        <div class="row text-white">
            <div class="col-md-3">
                <h4>450+</h4>
                <p>pre-built websites</p>
            </div>
            <div class="col-md-3">
                <h4>200+</h4>
                <p>pre-built websites</p>
            </div>
            <div class="col-md-3">
                <h4>100k</h4>
                <p>pre-built websites</p>
            </div>
            <div class="col-md-3">
                <h4>11</h4>
                <p>pre-built websites</p>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row testimonial">
        <div class="col-md-6">
            <h2 class="mb-4">Contact Us</h2>
            <p>Feel free to contact us. A business has to be involving, it has to be fun, and it has to exercise your creative instincts. Start where you are. Use what you have. Do what you can.</p>
            <p><strong>ADDRESS</strong></p>
            eJobsiteSoftware.com<br>
            AD 48B, Shalimar Bagh, Delhi – 110088, India<br>
            Ph: +91 9810336906 (Mobile)<br><br>
            <a href="#">info@ejobsitesoftware.com</a>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Say Hello</h2>
            <form>
                <div class="form-group">
                    <input type="text" placeholder="Full name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Email address" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Your contact" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Your message" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-lg btn-primary primary-custom">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
