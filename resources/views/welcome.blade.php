<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if (session()->has('errorMessage'))
                <div class="col-12 alert alert-danger text-center mt-3">
                    {{ session('errorMessage') }}
                </div>
            @endif
            @if (session()->has('message'))
                <div class="col-12 alert alert-success text-center mt-3">
                    {{ session('message') }}
                </div>
            @endif
            <div class="text-center bg-image header-c">
                <div
                    class="mask mask-vh text-white text-center d-flex align-items-center justify-content-center flex-column">
                    <div>
                        <h1 class="mb-3">Presto.it</h1>
                        <h4 class="mb-4 fst-italic">"Find everything you need, wherever you are."</h4>
                        <a data-mdb-ripple-init class="button-header p-3" href="{{ route('article.create') }}"
                            role="button">{{ __('ui.insertAd') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @foreach ($articles as $article)
                <div class=" col-12 col-md-3 mt-5 card-custom">
                    <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/300/300' }}"
                            alt="Immagini dell'articolo {{ $article->title }}" class="img-fluid rounded-5 " />
                        <div class="mask"></div>
                    </div>
                    <div class="card-body mt-3">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->price }}</p>
                        <p class="card-text">{{ $article->category->name }}</p>
                        <a href="{{ route('article.show', compact('article')) }}"
                            class="button-card py-2 px-3 rounded-pill" data-mdb-ripple-init>Info</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
