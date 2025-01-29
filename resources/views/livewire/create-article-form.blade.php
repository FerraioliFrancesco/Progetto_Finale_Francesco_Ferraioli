<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form class="form-custom p-4" wire:submit='save'>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo: </label>
            <input type="text" class="form-control rounded-5 @error('title') is-invalid @enderror" id="title"
                wire:model.blur='title'>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desciption" class="form-label ">Descrizione: </label>
            <textarea id="description" cols="20" rows="5"
                class="form-control rounded-5 @error('description') is-invalid @enderror" wire:model.blur='description'></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo: </label>
            <input type="number" class="form-control rounded-5 @error('price') is-invalid @enderror" id="price"
                wire:model.blur='price'>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria: </label>
            <select id="category" class="form-select rounded-5" wire:model='category'>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="button-card py-1 px-3 rounded-5">Crea</button>
        </div>
    </form>
</div>
