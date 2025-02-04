<nav class="navbar navbar-expand-lg  navbar-custom p-0">
    <div class="container-fluid p-0">
        {{-- logo --}}
        <a class="navbar-brand ms-2" href="{{ route('home') }}"> <img src="/img/logo2sm.png" class="logonav m-0"
                alt="Logo" loading="lazy" /></a>
        {{-- search bar --}}
        
        <button class="navbar-toggler p-0 mx-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" style="color: #000000;"></i>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold text-capitalize" aria-current="page"
                        href="{{ route('article.index') }}">{{__('ui.allAd')}}</a>
                </li>
                <li class="nav-item text-center d-flex justify-content-center">
                    <button class="nav-link fw-bold text-center" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">{{__('ui.categories')}}</button>
                </li>
                
            </ul>

            <ul class="navbar-nav me-md-3 me-sm-0 mb-2 mb-lg-0 mt-3 mt-md-0 ul-profile ">

                @guest
                    <li class="nav-item mb-2 mb-md-0">
                        <a class="" href="{{ route('login') }}">
                            <button data-mdb-ripple-init type="button" class="px-3 me-md-2 me-sm-0 text-custom rounded-pill p-1">
                                {{__('ui.loginnav')}}
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="" href="{{ route('register') }}">
                            <button data-mdb-ripple-init type="button" class=" px-3 text-custom rounded-pill p-1">
                                {{__('ui.registernav')}}
                            </button>
                        </a>
                    </li>
                @else
                    
                    <li class="nav-item">
                        <button class="btn btn-light rounded-pill" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i
                                class="fa-solid fa-xl fa-user text-black"></i></button>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
    
</nav>
<div class="container-fluid navbar-custom">
    <div class="row justify-content-center">
        <div class="col-10 ">
            <form action="{{ route('article.search') }}" class="d-flex mx-auto py-2" role="search" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control rounded-start-pill " name="query"
                        placeholder="{{__('ui.placeholderSearch')}}" aria-label="Search">
                    <button class="btn btn-dark rounded-end-pill" type="submit" id="basic-addon2">{{__('ui.search')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>



{{-- off-canvas laterale categoria --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header ">
        <h5 class="offcanvas-title fw-bold " id="offcanvasExampleLabel">{{__('ui.categories')}}</h5>
        <hr class="dropdown-divider">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="dropdown-divider">
    <div class="offcanvas-body">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a class=" text-capitalize nav-link fw-bold "
                        href="{{ route('article.byCategory', ['category' => $category]) }}">{{ __("ui.$category->name") }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- off-canvas profilo --}}
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        @auth
        <h5 class="offcanvas-title fw-bold" id="offcanvasWithBothOptionsLabel">{{__('ui.helloUser')}} {{ Auth::user()->name }}!</h5> 
        @endauth
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="dropdown-divider">
    <div class="offcanvas-body">
        <ul>
            {{-- <li class="my-2">
            <div class=" me-3 mt-2 mt-md-0">
                <a class="nav-link fw-bold text-capitalize" href="">La tua informazione</a>
            </div>
        </li> --}}
            @auth
                @if (Auth::user()->is_revisor)
                    <li class="my-2">
                        <div class="nav-item d-flex align-items-center  position-relative">
                            <a href="{{ route('revisor.index') }}" class="nav-link fw-bold me-1 text-capitalize ">{{__('ui.revisorZone')}}</a>
                            <span class="badge rounded-pill bg-danger position-absolute position-custom translate-middle">
                                {{ \App\Models\Article::toBeRevisedCount() }}
                            </span>
                        </div>
                    </li>
                @endif
            @endauth
            <li class="my-2">
                <div class=" me-3 mt-2 mt-md-0">
                    <a class="nav-link fw-bold text-capitalize" href="{{ route('article.create') }}">{{__('ui.addArticle')}}</a>
                </div>
            </li>
            <li class="my-2">
                <div class=" me-3 mt-2 mt-md-0">
                    <a class="nav-link fw-bold text-capitalize" href="{{ route('profile.articles') }}">{{__('ui.yourAd')}}</a>
                </div>
            </li>

            <hr class="dropdown-divider">
        </ul>
        <ul class="list-unstyled d-flex justify-content-center">
            <li class="my-2  ">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button data-mdb-ripple-init type="submit" class="btn btn-danger px-3 me-2 rounded-5">
                        <i class="fa-solid fa-right-from-bracket fa-2x"></i>
                    </button>
                </form>
            </li>
        </ul>

    </div>
</div>
