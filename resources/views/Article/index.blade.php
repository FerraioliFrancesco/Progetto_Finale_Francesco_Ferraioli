    <x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{__('ui.allAds')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-2 my-5 mx-3 card-custom">
                    <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                        <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/300/300'}}" alt="Immagini dell'articolo {{$article->title}}" class="img-fluid rounded-5 " />
                        <a href="{{route("article.show",compact("article"))}}">
                            <div class="mask"></div>
                        </a>
                    </div>
                    <div class="card-body mt-3">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text fst-italic">{{ $article->price }} €</p>
                        <p class="card-text fst-italic">{{ $article->category->name }}</p>
                        <a href="{{route("article.show",compact("article"))}}" class="button-card py-2 px-3 rounded-pill" data-mdb-ripple-init>Info</a>
                    </div>
                </div>
            @endforeach
            <div class="col-12">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>