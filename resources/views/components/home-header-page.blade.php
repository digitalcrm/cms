<div>
    <header class="header">
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
            <div class="container">
                @include('layouts.partials.homepage-logo')
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse float-right" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>

                        @foreach($menus as $menu)
                            @if($loop->iteration <=5)
                            <li class="nav-item active">
                                <a class="nav-link" 
                                    href="{{ route('menu.page', ['menuslug'=>$menu->slug, 'pageslug'=>$menu->page->slug]) }}"
                                    target="{{ ($menu->isChecked) ? '_blank' : '' }}"
                                    >
                                    {{ $menu->name }}
                                </a>
                            </li>
                            @endif                            
                        @endforeach

                        @if(count($menus) > 5)
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars fa-2x"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    @foreach($menus as $menu)
                                        @if($loop->iteration >=6)
                                            <a class="dropdown-item" href="{{ route('menu.page', ['menuslug'=>$menu->slug, 'pageslug'=>$menu->page->slug]) }}"
                                                target="{{ ($menu->isChecked) ? '_blank' : '' }}">{{ $menu->name }}</a>
                                        @endif                            
                                    @endforeach
                                </div>
                            </li>
                        @endif

                        @include('includes.profile-nav')
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>
