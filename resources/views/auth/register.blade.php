<x-layout>

    <div class="container-fluid mt-5">

        <div class="row justify-content-center">
        
            <div class="col-12 d-flex justify-content-center">

                <h1 class="display-4 text-center">Registrazione</h1>

            </div>
        
            <div class="col-12 col-md-2 d-flex justify-content-center rounded border border-dark my-3 p-4">

                <form method="POST" action="{{route("register")}}">
                    
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username: </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Indirizzo email: </label>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password: </label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Conferma password: </label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-secondary">Registrati</button>

                  </form>

            </div>

        </div>
    
    </div>

</x-layout>