<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->

        <a class="navbar-brand me-2" href="{{route("home")}}">
            <img src="/img/logo2sm.png" class="logonav"
                alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
        </a>

        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#my-navbar"
            aria-controls="my-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="my-navbar">
            <!-- Left links -->
            <div class="d-flex align-items-center mx-auto ">
                <button class="nav-link me-3 fw-bold" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    Categorie
                </button>
                <a class="nav-link me-4  fw-bold" href="{{ route('article.index') }}">Tutti gli annunci</a>
            </div>

            <!-- Right links -->

            <div class="d-flex align-items-center">

                @guest
                    <a href="{{ route('login') }}">
                        <button data-mdb-ripple-init type="button" class="px-3 me-2 text-custom rounded-pill p-1">
                            Accedi
                        </button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button data-mdb-ripple-init type="button" class=" px-3 me-2 text-custom rounded-pill p-1">
                            Registrati
                        </button>
                    </a>
                @else
                    <div class="nav-item me-3 text-center">
                        <span class="fw-bold">Ciao {{ Auth::user()->name }}!</span>
                    </div>
                    <div class="nav-item me-3">
                        <a class="nav-link fw-bold" href="{{ route('article.create') }}">Inserisci annuncio</a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button data-mdb-ripple-init type="submit" class="btn btn-bg px-3 me-2">
                            <i class="fa-solid fa-right-from-bracket fa-2x"></i>
                        </button>
                    </form>
                    @if (Auth::user()->is_revisor)
                        <div class="nav-item">
                            <a href="{{ route('revisor.index') }}" class="nav-link fw-bold">Zona revisore</a>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{\App\Models\Article::toBeRevisedCount()}}</span>
                        </div>

                    @endif
                @endguest
            </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

{{-- dropdown laterale  --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul >
            @foreach ($categories as $category)
                <li><a class=" text-capitalize nav-link fw-bold"
                        href="{{ route('article.byCategory', ['category' => $category])}}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
  </div>