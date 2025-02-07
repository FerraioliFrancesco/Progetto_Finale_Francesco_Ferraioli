<x-layout>

    <div class="container-fluid mt-5">

        <div class="row justify-content-center">

            <div class="col-12 d-flex flex-column align-items-center">

                <h1 class="display-4 text-center">{{ __('ui.login') }}</h1>
                <h6 class="fw-bold text-center mt-2 text-muted">{{ __('ui.authInfo') }}</h3>

            </div>

            <div class="col-11 col-md-6 d-flex justify-content-center my-3 p-4">

                <form class="form-custom p-5" method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.email') }} </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="button-card py-2 px-3 rounded-5">{{ __('ui.login') }}</button>
                    </div>
                </form>

            </div>

            <div class="col-7 text-center mt-3">
                <p class="text-muted fw-bold">{{ __('ui.dontHaveAccount') }}</p>
                <a href="{{ route('register') }}"
                    class="button-card py-2 px-3 rounded-5">{{ __('ui.registerHere') }}</a>
            </div>

        </div>

    </div>

</x-layout>
