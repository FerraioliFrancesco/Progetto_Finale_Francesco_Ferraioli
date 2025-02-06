<x-layout>
    <div class="container mt-5">
        @if (session()->has('messageAccepted'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">{{ session('messageAccepted') }}</div>
            </div>
        @endif
        @if (session()->has('messageRejected'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-danger text-center shadow rounded">{{ session('messageRejected') }}</div>
            </div>
        @endif
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">Revisor dashboard</h1>
            </div>
        </div>
        @if ($article_to_check)
            @if ($article_to_check->images->count())
                @foreach ($article_to_check->images as $key => $image)
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4 mb-4 text-center">
                                    <img src="{{ $image->getUrl(300, 300) }}"
                                        alt="Immagini {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}"
                                        class="img-fluid rounded shadow">
                                </div>
                                <div class="col-md-4  mt-5">
                                    <div class="card-body">
                                        <h5 class="card-title text-center mb-3">
                                            {{ __('ui.labels') }}
                                        </h5>
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                #{{ $label }}
                                            @endforeach
                                        @else
                                            <p class="fs-italic">{{ __('ui.nolabels') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 mt-5">
                                    <div class="card-body">
                                        <h5 class="card-title text-center mb-3">{{ __('ui.ratings') }}</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center  {{ $image->adult }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.adult') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center  {{ $image->violence }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.violence') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center  {{ $image->spoof }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.spoof') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center  {{ $image->racy }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.racy') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center  {{ $image->medical }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.medical') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 d-flex flex-wrap ">
                        <div class="col-6 col-md-12 mb-4 text-center mx-auto p-2">
                            <img src="/img/noFoto.jpg" alt="Immagini segnaposto"
                                class="img-fluid rounded shadow">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-md-5 d-flex flex-column justify-content-between">
            <div class="text-center">
                <p class="h1 mb-3">{{ __('ui.titleRevisor') }} <br> {{ $article_to_check->title }}</p>
                <h3 class=" mb-3">{{ __('ui.authorRevisor') }} {{ $article_to_check->user->name }}</h3>
                <h4 class=" mb-3">{{ __('ui.price') }} {{ $article_to_check->price }}€</h4>
                <h4 class="fst-italic text-muted">{{ __('ui.category') }}
                    {{ __('ui.' . $article_to_check->category->name) }}</h4>
                <p class="fw-bold text-center">{{ __('ui.description') }} <br> {{ $article_to_check->description }}
                </p>
                @if ($article_to_check->created_at == $article_to_check->updated_at)
                    <p class="fw-bold text-muted">{{ __('ui.createdRevisor') }} <br>
                        {{ $article_to_check->created_at->format('d/m/Y H:i') }}</p>
                @else
                    <p class="fw-bold text-muted">{{ __('ui.createdRevisor') }} <br>
                        {{ $article_to_check->created_at->format('d/m/Y H:i') }}</p>
                    <p class="fw-bold text-muted">{{ __('ui.updatedRevisor') }} <br>
                        {{ $article_to_check->updated_at->format('d/m/Y H:i') }}</p>
                @endif
            </div>

            {{-- inizio logica modal buttom reject --}}

            <div class="d-flex pb-4 justify-content-around">
                <button type="button" class="btn btn-danger rounded-pill mb-3 fw-bold" data-bs-toggle="modal"
                    data-bs-target="#modalReject">
                    {{ __('ui.reject') }}
                </button>
                <!-- Modal reject -->
                <div class="modal fade " id="modalReject" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                                    {{ __('ui.confirmReject') }}
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body fw-bold">
                                {{ __('ui.sureReject') }} <br>
                                {{ __('ui.notNullable') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill mb-3 fw-bold"
                                    data-bs-dismiss="modal">{{ __('ui.cancel') }}</button>
                                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="btn btn-danger rounded-pill mb-3 fw-bold">{{ __('ui.conferm') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- fine logica modal buttom reject --}}


                {{-- inizio logica modal buttom accept --}}
                <button type="button" class="btn btn-success rounded-pill mb-3 fw-bold" data-bs-toggle="modal"
                    data-bs-target="#modalAccept">
                    {{ __('ui.accept') }}
                </button>

                <!-- Modal accept -->
                <div class="modal fade " id="modalAccept" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">
                                    {{ __('ui.confirmAccept') }}
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body fw-bold">
                                {{ __('ui.sureAccept') }} <br>
                                {{ __('ui.publish') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill mb-3 fw-bold"
                                    data-bs-dismiss="modal">{{ __('ui.cancel') }}</button>
                                <form action="{{ route('accept', ['article' => $article_to_check]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="btn btn-success rounded-pill mb-3 fw-bold">{{ __('ui.conferm') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- fine logica modal accept --}}

            </div>
        </div>
    </div>
    </div>
    </div>
@else
    <div class="row justify-content-center align-items-center text-center">
        <div class="col-12">
            <p class="h1 display-4 fst-italic mb-5">{{ __('ui.noneAd') }}</p>
            <a class="button-card px-4 py-2 rounded-pill" href="{{ route('home') }}">{{ __('ui.returnHome') }}</a>
        </div>
    </div>
    @endif
    </div>
</x-layout>
