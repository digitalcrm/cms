<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalPosts }}</h3>
                <p>Total Posts</p>
            </div>
            <div class="icon">
                <i class="far fa-newspaper"></i>
            </div>
            <a href="{{ route('posts.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalPages }}</h3>
                <p>Total Pages</p>
            </div>
            <div class="icon">
                <i class="far fa-file"></i>
            </div>
            <a href="{{ route('pages.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>User Registered</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('all-users') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Newsletter Subscribers</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <a href="{{ route('subscribers',['subscribed' => 'subscribers']) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>