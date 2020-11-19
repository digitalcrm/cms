@extends('layouts.app')

@section('title', $post->title .' : '. $post->category->name )

@section('content')
<div class="container">
    <div class="row featured-post-heading">
       <div class="col-md-12 mt-5 mb-3">
          <h2 class="mb-4">{{ $post->title }}</h2>
       </div>
    </div>
    <div class="row">
       <div class="col-md-9 pl-0 pr-5">
          <div class="col-md-12">
             <ul class="list-group list-group-horizontal small mb-3">
                <li class="list-group-item">{{ $post->created_at->toFormattedDateString() }}</li>
                <li class="list-group-item">{{ $post->category->name }}</li>
                <li class="list-group-item">By: {{ $post->user->name }}</li>
                <li class="list-group-item"><i class="fa fa-comments-o" aria-hidden="true"></i> {{ $post->postcount }} Views</li>
                {{-- <li class="list-group-item"><i class="fa fa-comments-o" aria-hidden="true"></i> 10 Comments</li> --}}
             </ul>
             <img src="{{ optional($post->featured_image)->getFullUrl() ?? $post->default_image }}" class="img-fluid rounded mb-3" alt="{{ $post->slug }}">
             <p>
                {!! $post->body !!}
             </p>
             {{-- <div class="alert alert-info small mt-4 mb-3" role="alert">
                <span>Share This News, Choose Your Platform!</span>
                <span class="float-right">
                <a href="#"><i class="fab fa-facebook-f social-share"></i></a>
                <a href="#"><i class="fab fa-twitter social-share"></i></a>
                <a href="#"><i class="fab fa-linkedin-in social-share"></i></a>
                <a href="#"><i class="fab fa-instagram social-share"></i></a>
                <a href="#"><i class="fab fa-pinterest social-share"></i></a>
                <a href="#"><i class="far fa-envelope social-share"></i></a>
                </span>
             </div> --}}

             {{-- <div class="comments-section mt-5">
                <div class="mb-3">About the Author: admin</div>
                <div class="media small">
                   <img src="images/team2.jpg" width="50" class="img-fluid mr-3" alt="...">
                   <div class="media-body">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada.
                   </div>
                </div>

                <div class="mb-3 mt-5">Leave A Comment</div>
                <form>
                   <div class="form-group">
                      <textarea class="form-control" placeholder="Comment..." id="exampleFormControlTextarea1" rows="6"></textarea>
                   </div>
                   <div class="form-group">
                      <div class="row">
                         <div class="col">
                            <input type="text" class="form-control" placeholder="Name (required)">
                         </div>
                         <div class="col">
                            <input type="text" class="form-control" placeholder="Email (required)">
                         </div>
                         <div class="col">
                            <input type="text" class="form-control" placeholder="Website">
                         </div>
                      </div>
                   </div>
                   <div class="form-group">
                      <button type="submit" class="btn btn-primary px-3">POST COMMENT</button>
                   </div>
                </form>

             </div> --}}
          </div>
       </div>
       <div class="col-md-3 col-sidebar">
          <div class="mb-4">
             <h6 class="mb-4">Recent Posts</h6>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Cras justo odio</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Cras justo odio</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Cras justo odio</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Cras justo odio</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Cras justo odio</a></p>
          </div>
          <div class="mb-4">
             <h6 class="mb-4">Categories</h6>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Creative</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Design</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Featured</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> News</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Photography</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Slider</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Technology</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Trending</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Web Design</a></p>
             <p class="border-bottom pb-2 mb-2"><a href="#"><i class="fas fa-chevron-right"></i> Wordpress</a></p>
          </div>
       </div>
    </div>
 </div>

@endsection
