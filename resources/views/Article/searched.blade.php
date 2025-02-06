<x-layout>
    
    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{__('ui.searchResults')}} "<span class="fst-italic">{{$query}}</span>"</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
            <div class="col-12 col-md-2 mt-5">
                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/300/300'}}" class="img-fluid rounded-5" />
                    <a href="{{route("article.show",compact("article"))}}">
                        <div class="mask"></div>
                    </a>
                </div>
                <div class="card-body mt-3 text-center">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text fst-italic">{{ $article->price }} €</p>
                    <p class="card-text fst-italic">{{__("ui.".$article->category->name)  }}</p>
                    <a href="{{route("article.show",compact("article"))}}" class="button-card py-2 px-3 rounded-pill" data-mdb-ripple-init>Info</a>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h3 class="text-center">{{__('ui.noneResult')}}</h3>
            </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>{{$articles->links()}}</div>
    </div>
</x-layout>