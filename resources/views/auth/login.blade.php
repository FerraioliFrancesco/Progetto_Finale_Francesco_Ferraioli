<x-layout>

    <div class="container-fluid mt-5">

        <div class="row justify-content-center">
        
            <div class="col-12 d-flex justify-content-center">

                <h1 class="display-4 text-center">Accedi</h1>

            </div>
        
            <div class="col-12 col-md-2 d-flex justify-content-center rounded border border-dark my-3 p-4">

                <form method="POST" action="{{route("login")}}">
                    
                    @csrf

                    <div class="mb-3">
                      <label class="form-label">Indirizzo email: </label>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password: </label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-secondary">Accedi</button>

                  </form>

            </div>

        </div>
    
    </div>

</x-layout>