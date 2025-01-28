<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="https://mdbgo.com/">
            <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="16" alt="MDB Logo"
            loading="lazy" style="margin-top: -1px;" />
        </a>
        
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample"
        aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{route("home")}}">HomePage</a>
            </li>
        </ul>
        
        <!-- Right links -->
        
        <div class="d-flex align-items-center">
            <button class="nav-link me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                Categorie
            </button>
            <a class="nav-link me-4" href="{{ route('article.index')}}">Tutti gli articoli</a>
            @guest
            <a href="{{route("login")}}">
                <button data-mdb-ripple-init type="button" class="btn btn-bg px-3 me-2">
                    <i class="fa-solid fa-right-to-bracket fa-2x"></i>
                </button>    
            </a>
            <a href="{{route("register")}}">
                <button data-mdb-ripple-init type="button" class="btn btn-bg px-3 me-2">
                    <i class="fa-solid fa-user-plus fa-2x"></i>
                </button>    
            </a>
            @else  
            <div class="nav-item mx-3">
                <p>Ciao {{Auth::user()->name}}</p>    
                <a class="nav-link" href="{{route("article.create")}}">Inserisci annuncio</a>
            </div>
            <form action="{{route("logout")}}" method="POST">
                @csrf
                <button data-mdb-ripple-init type="submit" class="btn btn-bg px-3 me-2">
                    <i class="fa-solid fa-right-from-bracket fa-2x"></i>
                </button>
            </form>
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
        <ul class="">
            @foreach ($categories as $category)
              <li><a class="list-unlisted text-capitalize" href="{{route("article.byCategory",['category'=>$category])}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
  </div>