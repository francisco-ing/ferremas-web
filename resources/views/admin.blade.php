<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<header class="bg-gray-300 fixed w-full top-0 z-50 h-16">
        <div class="container mx-auto px-6 py-3 h-full"> 
            <div class="flex items-center justify-center h-full">
                <div>
                    <a class="font-bold text-xl text-gray-800" href="#">
                        Dashboard Administrador
                    </a>
                </div>

                <div class="md:flex items-center ml-auto"> <!-- Mover este contenido hacia la derecha -->
                  @if (Auth::check())
                    <form class="text-white mr-4" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none" type="submit">Cerrar sesión</button>
                    </form>
                 @endif
                </div>
            </div>
        </div>
</header>

<div class="container mx-auto mt-20"> <!-- Agrega margen superior -->
    <div class="flex justify-between items-center mb-5">
        <h1 class="text-2xl font-bold">Listado de Usuarios</h1>
        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="openForm('createUserForm')">Nuevo Usuario</button>
    </div>

    <div class="bg-white shadow-md rounded my-6">
    <table class="min-w-full bg-white">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Nombre</th>
            <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
            <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Rol</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Acciones</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
    @foreach($users as $user)
    @if($user->rol_usuario !== null && $user->rol_usuario !== 'NULL')
            <tr>
                <td class="w-1/4 text-left py-3 px-4">{{ $user->name }}</td>
                <td class="w-1/4 text-left py-3 px-4">{{ $user->email }}</td>
                <td class="w-1/4 text-left py-3 px-4">{{ $user->rol_usuario }}</td>
                <td class="text-left py-3 px-4">
                    <button class="text-blue-500 hover:underline" onclick="openEditForm('{{ $user->id }}')">Editar</button>
                    <button class="text-red-500 hover:underline ml-2" onclick="deleteUser('{{ $user->id }}')">Eliminar</button>
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>

    </div>
</div>

    <!-- Formulario Crear/Editar Usuario -->
    <div id="createUserForm" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Crear Usuario</h3>
                <div class="mt-2 px-7 py-3">
                    <form id="createUser" class="space-y-4">
                        <div>
                            <label for="name" class="block text-left text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="email" class="block text-left text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="rol" class="block text-left text-sm font-medium text-gray-700">Rol</label>
                            <input type="rol" name="rol" id="rol" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="password" class="block text-left text-sm font-medium text-gray-700">Contraseña</label>
                            <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="closeForm('createUserForm')">Cancelar</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="editUserForm" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Editar Usuario</h3>
                <div class="mt-2 px-7 py-3">
                    <form id="editUser" class="space-y-4">
                        <div>
                            <label for="editName" class="block text-left text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" name="editName" id="editName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="editEmail" class="block text-left text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="editEmail" id="editEmail" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="rol" class="block text-left text-sm font-medium text-gray-700">Rol</label>
                            <input type="rol" name="rol" id="rol" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="editPassword" class="block text-left text-sm font-medium text-gray-700">Contraseña</label>
                            <input type="password" name="editPassword" id="editPassword" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="closeForm('editUserForm')">Cancelar</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openForm(formId) {
            document.getElementById(formId).classList.remove('hidden');
        }

        function closeForm(formId) {
            document.getElementById(formId).classList.add('hidden');
        }

        function deleteUser() {
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                // Lógica para eliminar usuario
            }
        }
    </script>
</body>
</html>
