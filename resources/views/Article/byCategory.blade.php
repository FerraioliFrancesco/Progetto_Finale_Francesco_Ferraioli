<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">Articoli della categoria: {{ $category->name }}</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @foreach ($articles as $article)
                <div class="card col-12 col-md-3 mt-5">
                    <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                        <img src="https://picsum.photos/400/400" class="img-fluid" />
                        <a href="{{route("article.show",compact("article"))}}">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text fst-italic">{{ $article->price }} €</p>
                        <p class="card-text fst-italic">{{ $article->category->name }}</p>
                        <a href="{{route("article.show",compact("article"))}}" class="btn btn-primary" data-mdb-ripple-init>Info</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>