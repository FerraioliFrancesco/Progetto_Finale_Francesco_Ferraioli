<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form class="form-custom p-4" wire:submit='save'>
        <div class="mb-3">
            <label for="title" class="form-label">{{__('ui.titleLivewire')}} </label>
            <input type="text" class="form-control rounded-5 @error('title') is-invalid @enderror" id="title"
                wire:model.blur='title'>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desciption" class="form-label ">{{__('ui.description')}} </label>
            <textarea id="description" cols="20" rows="5"
                class="form-control rounded-5 @error('description') is-invalid @enderror" wire:model.blur='description'></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{__('ui.price')}} </label>
            <input type="number" class="form-control rounded-5 @error('price') is-invalid @enderror" id="price"
                wire:model.blur='price'>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">{{__('ui.categories')}} </label>
            <select id="category" class="form-select rounded-5" wire:model='category'>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">{{__('ui.imageLivewire')}} </label>
            <input type="file" wire:model.live="temporary_images" multiple class="form-control rounded-5 @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
        @error('temporary_images.*')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('temporary_images')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>{{__('ui.previewLivewire')}}</p>
                    <div class="row mb-5 border border-4 border-success rounded-5 py-4">
                        @foreach ($images as $key => $image)
                            <div class="d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto rounded-5" wire:key="{{$key}}" style="background-image: url('{{$image->temporaryUrl()}}')">
                                </div>
                                <button type="button" class="btn mt-1 btn-danger rounded-pill" wire:click="removeImage({{$key}})">X</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            <button type="submit" class="button-card py-1 px-3 rounded-5">{{__('ui.createLivewire')}}</button>
        </div>
    </form>
</div>