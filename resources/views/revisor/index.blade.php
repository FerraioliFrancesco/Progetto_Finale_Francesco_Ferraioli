<x-layout>
    <div class="container-fluid mt-5">
        @if (session()->has('messageAccepted'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">{{session('messageAccepted')}}</div>
            </div>
        @endif
        @if (session()->has('messageRejected'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-danger text-center shadow rounded">{{session('messageRejected')}}</div>
            </div>
        @endif
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">Revisor dashboard</h1>
            </div>
        </div>
        @if ($article_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img src="https://picsum.photos/300" alt="che vedi?" class="img-fluid rounded shadow">
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div >
                        <p class="h1 display-1">{{$article_to_check->title}}</p>
                        <h3>Autore: {{$article_to_check->user->name}}</h3>
                        <h4>{{$article_to_check->price}}€</h4>
                        <h4 class="fst-italic text-muted">{{$article_to_check->category->name}}</h4>
                        <p class="h6">{{$article_to_check->description}}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{route('reject', ['article' => $article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="button-card py-2 px-5 fw-bold">Rifiuta</button>
                        </form>
                        <form action="{{route('accept', ['article' => $article_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="button-card py-2 px-5 fw-bold">Accetta</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12">
                    <p class="h1 display-4 fst-italic">Nessun articolo da revisionare</p>
                    <a class="mt-5 button-card px-4 py-2 rounded-pill" href="{{route('home')}}">Torna all'homepage</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>