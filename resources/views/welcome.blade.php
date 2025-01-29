<x-layout>
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded w-50">
            {{session('errorMessage')}}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="text-center bg-image header-c">
                <div class="mask mask-vh text-white text-center d-flex align-items-center justify-content-center flex-column">
                    <div>
                        <h1 class="mb-3">Presto.it</h1>
                        <h4 class="mb-4 fst-italic">"Find everything you need, wherever you are."</h4>
                        <a data-mdb-ripple-init class="button-header p-3" href="{{route("article.create")}}" role="button">Inserisci annuncio</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @foreach ($articles as $article)
                <div class="card col-12 col-md-3 mt-5">
                    <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                        <img src="https://picsum.photos/400/400" class="img-fluid" />
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->price }}</p>
                        <p class="card-text">{{ $article->category->name }}</p>
                        <a href="{{route("article.show",compact("article"))}}" class="button-card py-2 px-3 rounded-pill" data-mdb-ripple-init>Info</a>
                </div>
            @endforeach
        </div>
    </div>
    
</x-layout>
