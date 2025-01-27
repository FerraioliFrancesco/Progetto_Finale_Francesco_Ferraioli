<div>
    <form class="shadow rounded p-4 border border-dark " wire:submit='store'>
        <div class="mb-3">
            <label for="title" class="form-label">Titolo: </label>
            <input type="text" class="form-control @error('title') is-invalid @enderror border border-dark" id="title" wire:model='title'>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desciption" class="form-label ">Descrizione: </label>
            <textarea id="description" cols="20" rows="5" class="form-control @error('description') is-invalid @enderror border border-dark" wire:model='description'></textarea>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo: </label>
            <input type="text" class="form-control  @error('price') is-invalid @enderror border border-dark" id="price" wire:model='price'>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <select id="category" class="form-control @error('category') is-invalid @enderror" wire:model='category'>
                <option label disabled>Seleziona una categoria </option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</div>
