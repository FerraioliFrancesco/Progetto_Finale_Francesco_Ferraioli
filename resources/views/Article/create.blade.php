<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h1 class="display-4">
                    {{__('ui.headerCreate')}}
                </h1>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3 mb-5">
        <div class="row justify-content-center ">
            <div class="col-11 col-md-6">
                <livewire:create-article-form />
            </div>
        </div>
    </div>
</x-layout>
