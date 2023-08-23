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
        <form method="POST" action="{{ route('admin.login') }}" class="mt-4 mb-3">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label visually-hidden">Usuario</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Usuario" required>
            </div>
            <div class="mb-3" data-component="passwords">
                <label for="password" class="form-label visually-hidden">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Contraseña" required>
                <img src="{{ asset('images/admin/eye-icon.svg') }}" class="hide-icon" alt>
            </div>
            <div class="d-grid col-12 col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary text-white">INGRESAR</button>
            </div>
        </form>
        <div class="d-grid col-12 col-md-6 mx-auto">
            <a href="{{ route('admin.password.request') }}" role="button" class="btn btn-dark btn-sm">
                Recuperar contraseña
            </a>
        </div>
    </x-auth.wrapper>
</x-layouts.guest>
