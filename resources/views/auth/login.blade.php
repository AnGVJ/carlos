<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>
    <div class="div1">
        <div class="div2">
            <img class="logo" src="{{ asset('images/logoseinco.png') }}" alt="Descripción de la imagen">
            <div>
                <h1 class="text-center h1 mt-5">BIENVENIDO A SEINCO!</h1>
                <h2 class="text-center mt-2 h2">Por Favor Inicie Sesión</h2>
            </div>
            <div class="div3 mt-5">
                <!-- Comienza el Formulario de Login -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Recordar Contraseña -->
                    <div class="mb-3">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <!-- Enlace a Olvidé mi Contraseña -->
                    @if (Route::has('password.request'))
                        <div class="mb-3">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif

                    <!-- Botón de Login -->
                    <div class="d-flex justify-content-center mt-4">
                        <x-primary-button class="btn btn-outline-light btn-lg">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
                <!-- Fin del Formulario de Login -->
            </div>
        </div>
    </div>
</body>

</html>