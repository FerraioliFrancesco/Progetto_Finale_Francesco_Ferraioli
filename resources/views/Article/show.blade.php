<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12 mt-5 ">
                @if ($article->images->count() > 0)

                    <div class="swiper mySwiper rounded-5">
                        <div class="swiper-wrapper ">
                            @foreach ($article->images as $key => $image)
                                <div class="swiper-slide">
                                    <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(1000, 1000) : 'https://picsum.photos/1000/1000'}}"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                    
                            @if ($article->images->count() > 1)
                                <div>

                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>

                                </div>
                            @endif
                        </div>


                    </div>
                @else
                    <img src="https://picsum.photos/400/400" alt="Nessuna foto inserita dall'utente">

                @endif

            </div>

            <div class="col-12 col-md-3 my-5">
                <div class="card-body">
                    <p class="card-text">{{ $article->description }}</p>
                    <p class="card-text fst-italic">{{ $article->price }} €</p>
                    <p class="card-text"><span class="fst-italic">{{ $article->category->name }}</span></p>
                    <a href="{{ route('article.index') }}" class="button-card py-2 px-3 rounded-pill"
                        data-mdb-ripple-init>Tutti gli annunci</a>
                    <a href="{{ route('profile.articles') }}" class="button-card py-2 px-3 rounded-pill"
                        data-mdb-ripple-init>I tuoi annunci</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
