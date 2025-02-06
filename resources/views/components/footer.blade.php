<footer class="bg-terziario text-center mt-5 px-0 mx-0">
    <!-- Grid container -->
    <div class="container-fluid py-4 pb-0 mx-0">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Aulab -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ffcb00;"
                href="https://aulab.it/" target="blank" role="button"><img class="logo-costum" src="/img/logoaulab.png"
                    alt=""></a>

            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
                href="https://www.instagram.com/aulab_it?igsh=a3Z2NjB2N2dpdWN3" target="blank" role="button"><i
                    class="fab fa-instagram"></i></a>

            <!-- Github -->
            <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;"
                href="https://github.com/hackademy-157/presto_ferraioli_lozano_macri_gallo_araujo/commits/main/"
                target="blank" role="button"><i class="fab fa-github"></i></a>


        </section>
        <!-- Section: Social media -->
    </div>
    @auth
    @if (Auth::user()->is_revisor == 0)
    <div class="row justify-content-center m-0 p-0">
        <div class="col-8 col-md-2 navbar-nav">
            <a href="{{ route('become.revisor') }}" class="button-card py-2 mb-2"> {{__('ui.becomeRevisor')}} </a>
        </div>
    </div>
    @endif
    @endauth
    <!-- Grid container -->
    <div class="row p-0 m-0">
        <div class="col-12 d-flex justify-content-center mt-3">
            <x-_locale lang="it" />
            <x-_locale lang="en" />
            <x-_locale lang="es" />
        </div>

    </div>
    <!-- Copyright -->
    <div class="text-center p-3 bg-terziario">
        © 2025 Copyright:
        <a class="text-body" href="https://mdbootstrap.com/">Presto.it</a>
    </div>
    <!-- Copyright -->
</footer>
