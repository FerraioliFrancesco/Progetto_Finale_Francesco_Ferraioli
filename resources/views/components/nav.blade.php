<nav class="navbar navbar-expand-lg  navbar-custom">
    <div class="container-fluid p-0">
        {{-- logo --}}
        <a class="navbar-brand ms-2" href="{{ route('home') }}"> <img src="/img/logo2sm.png" class="logonav m-0" alt="Logo"
            loading="lazy" /></a>
            <form action="{{ route('article.search') }}" class="d-flex mx-auto my-2" role="search" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control rounded-start-pill shadow" name="query"
                    placeholder="Ricerca tra gli annunci" aria-label="Search">
                    <button class="btn btn-dark rounded-end-pill" type="submit" id="basic-addon2">Cerca</button>
                </div>
            </form>
            <button class="navbar-toggler p-0 mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" style="color: #000000;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold text-capitalize" aria-current="page" href="{{ route('article.index') }}">Tutti gli annunci</a>
                </li>
                <li class="nav-item">
                    <button class="nav-link me-3 fw-bold" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    Categorie
                </button>
            </li>
            
        </ul>
        
        <ul class="navbar-nav me-3 mb-2 mb-lg-0 mt-3 mt-md-0 ul-profile">
            
            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}">
                    <button data-mdb-ripple-init type="button" class="px-3 me-2 text-custom rounded-pill p-1">
                        Accedi
                    </button>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}">
                    <button data-mdb-ripple-init type="button" class=" px-3 me-2 text-custom rounded-pill p-1">
                        Registrati
                    </button>
                </a>
            </li>
            @else
            <li class="nav-item">
                <div class=" me-3 ">
                    <span class="fw-bold nav-link">Ciao {{ Auth::user()->name }}!</span>
                </div>
            </li>
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


{{-- off-canvas laterale categoria --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header ">
        <h5 class="offcanvas-title fw-bold " id="offcanvasExampleLabel">Categorie</h5>
        <hr class="dropdown-divider">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="dropdown-divider">
    <div class="offcanvas-body">
        <ul>
            @foreach ($categories as $category)
            <li>
                <a class=" text-capitalize nav-link fw-bold "
                href="{{ route('article.byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- off-canvas profilo --}}
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
aria-labelledby="offcanvasWithBothOptionsLabel">
<div class="offcanvas-header">
    <h5 class="offcanvas-title fw-bold" id="offcanvasWithBothOptionsLabel">Profilo</h5>
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
                <a href="{{ route('revisor.index') }}" class="nav-link fw-bold me-1 text-capitalize ">Zona revisore</a>
                <span class="badge rounded-pill bg-danger position-absolute position-custom translate-middle">
                {{ \App\Models\Article::toBeRevisedCount() }}
            </span>
        </div>
    </li>
    @endif
    @endauth
    <li class="my-2">
        <div class=" me-3 mt-2 mt-md-0">
            <a class="nav-link fw-bold text-capitalize" href="{{ route('article.create') }}">Inserisci annuncio</a>
        </div>
    </li>
    <li class="my-2">
        <div class=" me-3 mt-2 mt-md-0">
            <a class="nav-link fw-bold text-capitalize" href="{{ route('profile.articles') }}">I tuoi annunci</a>
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