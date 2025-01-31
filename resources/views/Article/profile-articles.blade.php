<x-layout>
    
    
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">I tuoi articoli</h1>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            @if (session('message'))
                <div class="alert alert-success col-12 m-0">{{ session('message') }}</div>
            @endif
            @foreach ($articles as $article)
            @if (Auth::id()==$article->user_id)
            <div class="col-12 col-md-3 my-5 mx-3">
                <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                    <img src="https://picsum.photos/400/400" class="img-fluid rounded-5 " />
                    <a href="{{route("article.show",compact("article"))}}">
                        <div class="mask"></div>
                    </a>
                </div>
                @if ($article->is_accepted===null)
                    <p class="mt-3 fw-bold fst-italic text-muted">In Revisione</p>
                @else  
                    @if ($article->is_accepted==true)
                        <p class="mt-3 fw-bold fst-italic text-success">Pubblicato</p>
                    @else
                        <p class=" mt-3 fw-bold fst-italic text-danger">Rifiutato </p>
                    @endif
                @endif
                <div class="card-body mt-3">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text fst-italic">{{ $article->price }} €</p>
                    <p class="card-text fst-italic">{{ $article->category->name }}</p>
                    <p class="card-text text-muted"> Modificato il:     {{ $article->updated_at->format('d/m/Y') }}</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{route("article.show",compact("article"))}}" class="btn btn-info py-2 px-4 me-2 rounded-pill" data-mdb-ripple-init>Info</a>
                        @if ($article->is_accepted!==null)
                            <a href="{{route('article.edit',compact('article'))}}" class="btn btn-warning py-2 px-3 me-2 rounded-pill" data-mdb-ripple-init>Modifica</a>
                        <form action="{{route("article.destroy",compact("article"))}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger py-2 px-3 me-2 rounded-pill">Elimina</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    
</x-layout>