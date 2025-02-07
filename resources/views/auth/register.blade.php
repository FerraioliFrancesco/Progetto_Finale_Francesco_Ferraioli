<x-layout>

    <div class="container-fluid mt-5">

        <div class="row justify-content-center">

            <div class="col-12 d-flex flex-column align-items-center">

                <h1 class="display-4 text-center">{{__('ui.registration')}}</h1>
                <h6 class="fw-bold text-center mt-2 text-muted">{{ __('ui.authInfo') }}</h3>

            </div>

            <div class="col-11 col-md-6 d-flex justify-content-center my-3 p-4">

                <form class="form-custom p-5" method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username: </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')  
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.email')}} </label>
                        <input type="email" class="form-control @error('name') is-invalid @enderror" name="email">
                        @error('email')  
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password: </label>
                        <input type="password" class="form-control @error('name') is-invalid @enderror" name="password">
                        @error('password')  
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('ui.confirm')}} password: </label>
                        <input type="password" class="form-control @error('name') is-invalid @enderror" name="password_confirmation">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="button-card py-2 px-3 rounded-5">{{__('ui.register')}}</button>
                    </div>
                </form>

            </div>

            <div class="col-7 text-center my-4">
                <p class="text-muted fw-bold">{{__('ui.haveAccount')}}</p>
                <a href="{{route('login')}}" class="button-card py-2 px-3 rounded-5">{{__('ui.login')}}</a>
            </div> 

        </div>

    </div>

</x-layout>
