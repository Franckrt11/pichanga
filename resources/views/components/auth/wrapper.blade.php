<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4 col-xxl-3">
            <div class="auth-wrapper">
                <img src="{{ asset('images/admin/logo.svg') }}" class="mb-3" alt="Te Juego una Pichanga">
                <h1>Te Juego una Pichanga</h1>
                <h2>Panel administrativo</h2>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
