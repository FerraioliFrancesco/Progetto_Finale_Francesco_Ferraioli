<x-layout>

    <div class="container-fluid mt-5">

        <div class="row justify-content-center">

            <div class="col-12 d-flex justify-content-center">

                <h1 class="display-4 text-center">{{__('ui.registration')}}</h1>

            </div>

            <div class="col-11 col-md-6 d-flex justify-content-center my-3 p-4">

                <form class="form-custom p-5" method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username: </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.email')}} </label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.confirm')}} password: </label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="button-card py-2 px-3 rounded-5">{{__('ui.register')}}</button>
                    </div>
                </form>

            </div>

        </div>

    </div>

</x-layout>
