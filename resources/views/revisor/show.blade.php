<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center mb-3">
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
                                    <img src="{{ Storage::url($image->path) }}"
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
                    <p class="card-text fw-bold">{{ __('ui.emailRevisorShow')}}{{ $article->user->email }}</p>
                    <p class="card-text fw-bold mb-3">{{ __('ui.authorRevisorShow')}}{{ $article->user->name }}</p>
                    <p class="card-text">{{ $article->description }}</p>
                    <p class="card-text fst-italic">{{ $article->price }} €</p>
                    <p class="card-text"><span class="fst-italic">{{ __('ui.' . $article->category->name) }}</span></p>
                    <form action="{{ route('revisor.destroy', compact('article')) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="btn btn-danger py-2 px-3 me-2 rounded-pill">{{ __('ui.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
