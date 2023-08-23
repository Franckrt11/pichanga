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
        <form method="POST" action="{{ route('panel.password.update') }}" class="mt-4 mb-5">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-3">
                <label for="email" class="form-label visually-hidden">Correo electrónico</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Correo electrónico" value="{{ $request->email }}" required>
            </div>
            <div class="mb-3" data-component="passwords">
                <label for="password" class="form-label visually-hidden">Nueva contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Nueva contraseña" required>
                <img src="{{ asset('images/eye-icon.svg') }}" class="hide-icon" alt>
            </div>
            <div class="mb-3" data-component="passwords">
                <label for="password_confirmation" class="form-label visually-hidden">Repetir nueva contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Repetir nueva contraseña" required>
                <img src="{{ asset('images/eye-icon.svg') }}" class="hide-icon" alt>
            </div>
            <div class="d-grid col-12 col-md-6 mx-auto">
                <button type="submit" class="btn btn-primary text-white">GUARDAR</button>
            </div>
        </form>
    </x-auth.wrapper>
</x-layouts.guest>
