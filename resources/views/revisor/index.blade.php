<x-layout>
    <div class="container-fluid mt-5">
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
                    <div class="col-6 col-md-4 mb-4 text-center">
                        <img src="{{ Storage::url($image->path) }}"
                            alt="Immagini {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}}"
                            class="img-fluid rounded shadow">
                    </div>
                @endforeach
            @else
                <div class="row justify-content-center pt-5">
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/400/400" alt="Immagini segnaposto"
                                        class="img-fluid rounded shadow">
                                </div>
                            @endfor
                        </div>
                    </div>
            @endif
            <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                <div class="text-center">
                    <p class="h1 mb-3">Titolo: <br> {{ $article_to_check->title }}</p>
                    <h3 class=" mb-3">Autore: {{ $article_to_check->user->name }}</h3>
                    <h4 class=" mb-3">Prezzo: {{ $article_to_check->price }}€</h4>
                    <h4 class="fst-italic text-muted">Categoria: {{ $article_to_check->category->name }}</h4>
                    <p class="fw-bold">Descrizione: <br> {{ $article_to_check->description }}</p>
                    @if ($article_to_check->created_at == $article_to_check->updated_at)
                        <p class="fw-bold text-muted">Data di pubblicazione: <br>
                            {{ $article_to_check->created_at->format('d/m/Y H:i') }}</p>
                    @else
                        <p class="fw-bold text-muted">Data di pubblicazione: <br>
                            {{ $article_to_check->created_at->format('d/m/Y H:i') }}</p>
                        <p class="fw-bold text-muted">Data di modifica: <br>
                            {{ $article_to_check->updated_at->format('d/m/Y H:i') }}</p>
                    @endif
                </div>

                {{-- inizio logica modal buttom reject --}}

                <div class="d-flex pb-4 justify-content-around">
                    <button type="button" class="btn btn-danger rounded-pill mb-3 fw-bold" data-bs-toggle="modal"
                        data-bs-target="#modalReject">
                        Rifiuta
                    </button>
                    <!-- Modal reject -->
                    <div class="modal fade " id="modalReject" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Conferma rifiuto
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body fw-bold">
                                    Sei sicuro di voler rifiutare l'annuncio? <br>
                                    Se confermi, l'azione non potrà essere annullata.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill mb-3 fw-bold"
                                        data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('reject', ['article' => $article_to_check]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger rounded-pill mb-3 fw-bold">Conferma</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- fine logica modal buttom reject --}}


                    {{-- inizio logica modal buttom accept --}}
                    <button type="button" class="btn btn-success rounded-pill mb-3 fw-bold" data-bs-toggle="modal"
                        data-bs-target="#modalAccept">
                        Accetta
                    </button>

                    <!-- Modal accept -->
                    <div class="modal fade " id="modalAccept" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Conferma e pubblica
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body fw-bold">
                                    Sei sicuro di voler accettare l'annuncio? <br>
                                    Se confermi, l'annuncio verrà pubblicato e sarà visibile a tutti gli utenti.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-pill mb-3 fw-bold"
                                        data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('accept', ['article' => $article_to_check]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-success rounded-pill mb-3 fw-bold">Conferma</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- fine logica modal accept --}}

                </div>
            </div>
    </div>
@else
    <div class="row justify-content-center align-items-center text-center">
        <div class="col-12">
            <p class="h1 display-4 fst-italic">Nessun articolo da revisionare</p>
            <a class="mt-5 button-card px-4 py-2 rounded-pill" href="{{ route('home') }}">Torna
                all'homepage</a>
        </div>
    </div>
    @endif
    </div>
</x-layout>
