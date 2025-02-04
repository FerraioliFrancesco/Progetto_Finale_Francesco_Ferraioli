<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">Articoli della categoria: {{ $category->name }}</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @foreach ($articles as $article)
            <div class=" col-12 col-md-2 mt-5">
                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(1000, 1000) : 'https://picsum.photos/1000/1000'}} class="img-fluid rounded-5" />
                    <a href="{{route("article.show",compact("article"))}}">
                        <div class="mask"></div>
                    </a>
                </div>
                <div class="card-body mt-3">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text fst-italic mt-1">Prezzo: {{ $article->price }} €</p>
                    <p class="card-text fst-italic">Categoria: <br> {{ $article->category->name }}</p>
                    <a href="{{route("article.show",compact("article"))}}" class="button-card py-2 px-3" data-mdb-ripple-init>Info</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>