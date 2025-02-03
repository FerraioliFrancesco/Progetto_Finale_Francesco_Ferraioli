<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h1 class="display-4">
                    Modifica articolo: <span class="fst-italic">{{$article->title}}</span>
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3 mb-5">
        <div class="row justify-content-center ">
            <div class="col-11 col-md-6">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="form-custom p-4" method="POST" action="{{ route('article.update', compact('article')) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo: </label>
                            <input type="text" class="form-control rounded-5 @error('title') is-invalid @enderror" id="title"
                                name='title' value="{{$article->title}}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="desciption" class="form-label ">Descrizione: </label>
                            <textarea id="description" cols="20" rows="5"
                                class="form-control rounded-5 @error('description') is-invalid @enderror" name='description'>{{$article->description}}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Prezzo: </label>
                            <input type="number" class="form-control rounded-5 @error('price') is-invalid @enderror" id="price"
                                name='price' value="{{$article->price}}">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria: </label>
                            <select id="category" class="form-select rounded-5" name='category'>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $article->category_id)
                                            selected
                                        @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="button-card py-1 px-3 rounded-5">Modifica</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>