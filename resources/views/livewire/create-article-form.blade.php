<div>
    <form class="shadow rounded">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo: </label>
            <input type="text" class="form-control" id="title" wire:model='title'>
        </div>
        <div class="mb-3">
            <label for="desciption" class="form-label">Descrizione: </label>
            <textarea id="description" cols="30" rows="10" class="form-control" wire:model='description'></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo: </label>
            <input type="text" class="form-control" id="price" wire:model='price'>
        </div>
        <div class="mb-3">
            <select id="category" class="form-control" wire:model='category'>
                <option label disabled>Seleziona una categoria </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</div>
