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
                <h2 class="text-center mt-2 h2">Por Favor Regístrate</h2>
            </div>
            <div class="div3 mt-5">
                <!-- Comienza el Formulario -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Nombre -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}"
                            required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Correo -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email"
                            value="{{ old('email') }}" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Selección de Rol -->
                    <div class="mb-3">
                        <x-input-label for="role" :value="__('Role')" />
                        <select id="role" class="form-select" name="role" required>
                            <option value="" disabled selected>-- Seleccione un rol --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Enlace a login -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="{{ route('login') }}" class="font">¿Ya tienes cuenta? Inicia sesión</a>
                    </div>

                    <!-- Botón de registro -->
                    <button type="submit" class="btn btn-outline-light btn-lg mt-4 fs-5 container">Registrar</button>
                </form>
                <!-- Fin del Formulario -->
            </div>
        </div>
    </div>
</body>

</html>