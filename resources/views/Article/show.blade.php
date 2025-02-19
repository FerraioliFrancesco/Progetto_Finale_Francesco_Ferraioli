<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ $article->title }}</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12 mt-5">
                @if ($article->images->count() > 0)

                    <div class="swiper mySwiper rounded-5">
                        <div class="swiper-wrapper ">
                            @foreach ($article->images as $key => $image)
                                <div class="swiper-slide">
                                    <img src="{{Storage::url($image->path)}}"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                                <div>

                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>

                                </div>
                            
                        </div>


                    </div>
                @else
                    <img src="/img/noFoto.jpg" alt="Nessuna foto inserita dall'utente">

                @endif

            </div>

            <div class="col-12 col-md-5 my-5">
                <div class="card-body">
                    <p class="card-text">{{ $article->description }}</p>
                    <p class="card-text fst-italic">{{ $article->price }} €</p>
                    <p class="card-text"><span class="fst-italic">{{__("ui.".$article->category->name)  }}</span></p>
                    <p class="card-text mt-2">{{__('ui.sellerEmail')}}<span class="fst-italic">{{$article->user->email}}</span></p>
                    <div class="d-flex justify-content-center flex-wrap mt-3">
                        <a href="{{ route('article.index') }}" class="button-card py-2 px-3 me-3 rounded-pill"
                            data-mdb-ripple-init>{{__('ui.allArticles')}}</a>
                        <a href="{{ route('profile.articles') }}" class="button-card py-2 px-3 rounded-pill"
                            data-mdb-ripple-init>{{__('ui.yourAds')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
