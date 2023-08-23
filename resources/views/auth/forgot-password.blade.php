<x-layouts.guest>
    <x-auth.wrapper>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible p-1 fade show mt-3" role="alert">
                {{ $error }}
                <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.password.email') }}" class="mt-4 mb-5">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label visually-hidden">Correo electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Correo electrónico" required>
            </div>
            <div class="d-grid col-12 col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary text-white">ENVIAR SOLICITUD</button>
            </div>
        </form>
        <div class="d-grid col-12 col-md-6 mx-auto">
            <a href="{{ route('login') }}" role="button" class="btn btn-dark btn-sm">
                Regresar
            </a>
        </div>
    </x-auth.wrapper>
</x-layouts.guest>
