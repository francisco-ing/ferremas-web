<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <title>Inicio</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f3f4f6; /* Fondo gris */
        }

        form {
            max-width: 400px; /* Ancho máximo del formulario */
            width: 90%; /* Ancho del formulario */
            padding: 20px;
            border-radius: 8px;
            background-color: white; /* Fondo blanco del formulario */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
        }
    </style>
</head>
<body>

  <!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto mt-4">
    @csrf

    <!-- Email Address -->
    <div class="mb-4">
        <x-input-label for="email" :value="__('Correo Electronico')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mb-4">
        <x-input-label for="password" :value="__('Contraseña')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="mb-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-between">
        <div>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
            {{ __('Iniciar Sesion') }}
        </button>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900">Registrate!!!</a>
    </div>
</form>


</body>
</html>
