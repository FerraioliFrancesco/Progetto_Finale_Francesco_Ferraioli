<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{$article->title}}</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12 mt-5 ">
                <div class="swiper mySwiper rounded-5">
                    <div class="swiper-wrapper ">
                        <div class="swiper-slide ">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            
            <div class="col-12 col-md-3 my-5">
                <div class="card-body">
                    <p class="card-text">{{ $article->description }}</p>
                    <p class="card-text fst-italic">{{ $article->price }} €</p>
                    <p class="card-text"><span class="fst-italic">{{ $article->category->name }}</span></p>
                    <a href="{{route("article.index")}}" class="button-card py-2 px-3 rounded-pill" data-mdb-ripple-init>Tutti gli annunci</a>
                    <a href="{{route("profile.articles")}}" class="button-card py-2 px-3 rounded-pill" data-mdb-ripple-init>I tuoi annunci</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>