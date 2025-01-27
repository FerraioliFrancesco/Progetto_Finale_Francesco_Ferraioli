<x-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center text-center min-vh-100">
            <div class="col-12">
                <h1 class="display-4">
                    @guest
                    Presto.it
                    @else    
                    Benvenuto {{Auth::user()->name}} su Presto.it!
                    @endguest
                </h1>
            </div>
        </div>
    </div>
</x-layout>